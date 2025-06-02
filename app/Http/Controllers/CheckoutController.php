<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PaystackService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    protected $paystack;
    private $amount = 2000;

    public function __construct(PaystackService $paystack)
    {
        $this->paystack = $paystack;
    }

    /**
     * Handle the checkout form submission:
     *  - Validate inputs
     *  - Create a provisional User record (with a unique reference)
     *  - Initialize a Paystack one‐time payment
     *  - Redirect the user to Paystack’s payment page
     */
    public function process(Request $request)
    {
        // 1. Validate incoming data
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255'],
            'whatsapp'  => ['required', 'string', 'max:20'],
            'city'      => ['required', 'string', 'max:100'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        // 2. Generate a unique payment reference
        //    Using a random UUID prefixed with "BRN" for clarity
        $reference = 'BRN-' . Str::uuid();

        // 3. Create (or update) a User record with status = unpaid (0)
        //    We assume the User model has fields: name, email, whatsapp, city, reference, payment_status
        $user = User::updateOrCreate(
            ['email' => $data['email']], // if email exists, update; otherwise create
            [
                'name'           => $data['full_name'],
                'whatsapp'       => $data['whatsapp'],
                'city'           => $data['city'],
                'reference'      => $reference,
                'payment_status' => 0, // unpaid
            ]
        );

        // 4. Initialize Paystack one‐time transaction
        $amount      = $this->amount; // ₦2,000
        $currency    = 'NGN';
        $callbackUrl = route('checkout.callback'); // e.g. you define a GET route named 'checkout.callback'

        $response = $this->paystack->onetimePayment(
            $user->email,
            $amount,
            $reference,
            $currency,
            $callbackUrl
        );

        // 5. Handle response from Paystack
        if ($response->successful() && isset($response['data']['authorization_url'])) {
            // Redirect the user to Paystack’s hosted payment page
            return redirect()->away($response['data']['authorization_url']);
        }

        // 6. If initialization failed, log the error and show a friendly message
        Log::error('Paystack initialization failed', [
            'response_body' => $response->body(),
        ]);

        return redirect()
            ->back()
            ->with('error', 'Unable to initialize payment. Please try again.');
    }

    /**
     * Paystack callback URL handler.
     *
     * After the user completes (or cancels) payment on Paystack’s page,
     * Paystack redirects here as a GET request with ?reference=XYZ.
     * We verify the transaction status and update the user’s payment_status.
     */
    public function callback(Request $request)
    {
        $reference = $request->query('reference');

        if (! $reference) {
            return redirect()
                ->route('checkout.form')
                ->with('error', 'Invalid payment reference.');
        }

        // 1. Verify transaction via PaystackService
        $response = $this->paystack->handleCallback($request);

        if (! $response->successful()) {
            Log::error('Paystack verification request failed', [
                'reference' => $reference,
                'response'  => $response->body(),
            ]);

            return redirect()
                ->route('checkout.form')
                ->with('error', 'Unable to verify payment. Please contact support.');
        }

        $verifyData = $response->json();

        // 2. Check if Paystack returned a successful transaction
        if (
            isset($verifyData['data']['status']) &&
            $verifyData['data']['status'] === 'success'
        ) {
            // 3. Mark the corresponding user’s payment_status = 1
            $user = User::where('reference', $reference)->first();

            if ($user) {
                $user->payment_status = 1;
                $user->amount_paid = $this->amount;
                $user->save();

                // Optionally, log or email the user here
                return redirect()
                    ->route('checkout.success')
                    ->with('success', 'Payment successful! You now have access to the BrianREELS Challenge.');
            }

            Log::warning('User not found for successful payment', [
                'reference' => $reference,
            ]);

            return redirect()
                ->route('checkout.form')
                ->with('error', 'Payment verified but user record not found.');
        }

        // 4. If status is not "success"
        Log::info('Paystack reported non-success status', [
            'reference' => $reference,
            'status'    => $verifyData['data']['status'] ?? 'unknown',
        ]);

        return redirect()
            ->route('checkout.form')
            ->with('error', 'Payment was not successful or was canceled.');
    }
}

<?php
namespace App\Services;


use App\Mail\DownloadInstructions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaystackService
{
    protected $secretKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->secretKey = env('PAYSTACK_SECRET_KEY');
        $this->baseUrl = env('PAYSTACK_PAYMENT_URL');
    }

    //one-time payment
    public function onetimePayment($email, $amount, $reference, $currency, $callbackUrl){
        $data = [
            'email' => $email,
            'amount' => $amount * 100, // Convert to kobo
            'reference' => $reference,
            'currency' => $currency,
            'callback_url' => $callbackUrl
        ];
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->secretKey,
            'Content-Type' => 'application/json',
        ])->post("{$this->baseUrl}/transaction/initialize", $data);

        return $response;
    }

    public function handleCallback(Request $request)
    {
        $reference = $request->query('reference');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->secretKey,
            'Content-Type' => 'application/json',
        ])->get("{$this->baseUrl}/transaction/verify/{$reference}");

        return $response;
    }

    public function handleWebhook(Request $request){
        //Log::debug('Webhook fired');
        // Check if it's a POST request with Paystack signature header
        if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST' ) || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER) ) {
            exit();
        }

        // Retrieve the payload from the request
        $payload = $request->getContent();

        // Retrieve the Paystack signature from the request headers
        $paystackSignature = $request->header('X-Paystack-Signature');

        // Calculate your own HMAC signature
        $generatedSignature = hash_hmac('sha512', $payload, env('PAYSTACK_SECRET_KEY'));
        
        // Verify if the Paystack signature matches the generated one
        if ($paystackSignature === $generatedSignature) {
            //Log::debug('Signature okay!');
            $payload = $request->all();//array
            $event = $payload['event'];
           
            switch ($event) {
                case 'subscription.create':
                    $this->handleSubscriptionCreate($payload);
                    return response('Webhook Processed', 200);
                case 'invoice.update':
                    $this->handleInvoiceUpdate($payload);
                    return response('Webhook Processed', 200);
                case 'subscription.disable':
                    $this->handleSubscriptionComplete($payload);
                    return response('Webhook Processed', 200);
                case 'charge.success':
                    $this->handleOnetimePayment($payload);
                    return response('Webhook Processed',200);
                default:
                    # code...
                    break;
            }
        }
        
    }

    private function handleOnetimePayment($payload){
        $user = User::where('reference',$payload['data']['reference'])->first();
        if($user){
            $user->payment_status = 1;
            $user->amount_paid = $payload['data']['amount'] / 100; // Convert from kobo to naira
            $user->save();    
        }
    }

   
}

<?php

use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    $amount = 3000; // Set the amount to be passed to the view
    return view('welcome',compact('amount')); // Pass the amount to the view
})->name('home');

Route::get('/checkout', function () {
    return view('checkout');           // The Blade form you already created
})->name('checkout.form');

Route::post('/checkout', [CheckoutController::class, 'process'])
     ->name('checkout.process');

Route::get('/checkout/callback', [CheckoutController::class, 'callback'])
     ->name('checkout.callback');

Route::get('/checkout/success', function () {
    // Show a simple thank‐you or “access granted” page
    return view('checkout-success');
})->name('checkout.success');

Route::post('/webhook',[CheckoutController::class,'handleWebhook'])->name('webhook');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

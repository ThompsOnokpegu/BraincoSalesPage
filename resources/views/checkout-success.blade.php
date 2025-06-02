<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Checkout</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    </head>
    <body class="bg-gray-1 antialiased" style="
    background-image:
      linear-gradient(to bottom,rgba(232,6,19,0.8),rgba(0,0,0,0.8)),
      url('/img/background2.png');
    background-size: cover;repeat: no-repeat;
    background-position: center;
  ">

        <div class="min-h-screen flex items-center justify-center px-4">
          <div class="bg-white max-w-md w-full rounded-lg shadow-md p-8 text-center">
            {{-- Success Icon --}}
            <div class="flex justify-center mb-6">
                <img
                  src="{{ asset('img/success.png') }}" {{-- Replace with your image path --}}
                  alt="Facilitator"
                  class="w-24 h-24"
                />
            </div>
      
            {{-- Thank You Message --}}
            <h2 class="text-2xl font-bold mb-2">Thank You!</h2>
            <p class="text-gray-700 mb-6">
              Your payment was successful. You now have instant access to the <span class="font-semibold">BrainREELS Masterclass</span>.
            </p>
      
            {{-- Facilitator Image --}}
            <div class="flex justify-center mb-6">
              <img
                src="{{ asset('img/blessing.jpg') }}" {{-- Replace with your image path --}}
                alt="Facilitator"
                class="w-24 h-24 rounded-full object-cover border-4 border-red-600"
              />
            </div>
      
            {{-- WhatsApp Button --}}
            <a
              href="https://wa.me/2349011543260?text=I%20just%20completed%20my%20payment%20and%20would%20like%20to%20join%20the%20BrianREELS%20Masterclass%20WhatsApp%20group."
              target="_blank"
              class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded transition"
            >
              Join WhatsApp Group
            </a>
          </div>
        </div>
      
      </body>
    </html>
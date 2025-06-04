{{-- resources/views/checkout.blade.php --}}
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
    <body class="bg-gray-100 antialiased" style="
    background-image:
      linear-gradient(to bottom,rgba(232,6,19,0.8),rgba(0,0,0,0.8)),
      url('/img/blessing.jpg');
    background-size: cover;repeat: no-repeat;
    background-position: center;
  ">

        <div class="min-h-screen flex items-center justify-center px-4">
          <div class="bg-white max-w-md w-full rounded-lg shadow-md p-8">
            {{-- Course Title --}}
            <h2 class="text-3xl font-bold text-center mb-6">BrainREELS Masterclass</h2>
      
            {{-- Facilitator Image --}}
            <div class="flex justify-center mb-4">
              <img
                src="{{ asset('img/blessing.jpg') }}" {{-- Replace with your image path --}}
                alt="Facilitator"
                class="w-32 h-32 rounded-full object-cover border-4 border-red-600"
              />
            </div>
      
            {{-- Instant Access Message --}}
            <p class="text-center text-gray-700 mb-6">
              You’ll get <span class="font-bold text-red-600">INSTANT ACCESS</span> to join the class immediately after payment.
            </p>
      
             {{-- Checkout Form --}}
            <form 
            action="{{ route('checkout.process') }}" 
            method="POST" 
            class="space-y-4"
            >
            @csrf

            {{-- Full Name --}}
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">
                Full Name
                </label>
                <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-600"
                placeholder="Ruth Frank"
                />
                @error('full_name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email Address --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                Email Address
                </label>
                <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-600"
                placeholder="youremail@example.com"
                />
                @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- WhatsApp Number --}}
            <div>
                <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-1">
                WhatsApp Number
                </label>
                <input
                type="tel"
                id="whatsapp"
                name="whatsapp"
                value="{{ old('whatsapp') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-600"
                placeholder="+2348012345678"
                />
                @error('whatsapp')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- City --}}
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">
                City
                </label>
                <input
                type="text"
                id="city"
                name="city"
                value="{{ old('city') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-600"
                placeholder="Lagos"
                />
                @error('city')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Pay Now Button --}}
            <button 
              type="submit" 
              class="w-full bg-red-600 flex hover:bg-red-700 text-white font-semibold py-3 rounded transition cursor-pointer"
            >
              <span class="text-start pl-6" style="width: 74%">Proceed to Payment</span>
              <span style="width: 26%">₦3000</span> 
            </button>

            </form>
          </div>
        </div>
    
      </body>

</html>

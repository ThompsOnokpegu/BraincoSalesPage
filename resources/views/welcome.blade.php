{{-- resources/views/landing.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
      <!-- Favicon -->
      <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}" />
      <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}" />
      <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}" />
      <!-- (Optional) Apple touch icon -->
      <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}" />
  
  <title>BrianREELS Landing Page</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
</head>
<body class="antialiased text-gray-900 bg-white">

    {{-- HERO / PROGRESS BAR --}}
    <section class="w-full bg-white px-4 py-12">
      <div class="max-w-screen-xl mx-auto">
        <div class="flex items-center mb-6">
          <span class="bg-red-600 text-white font-bold text-sm px-2 py-1 rounded" style="width: 74%">
            <span>Step 1: Unlock Early Access</span>
          </span>
          <div class="bg-yellow-200 text-white text-sm px-2 py-1 rounded-r" style="width: 26%"><span class="mx-[-4rem]">74%</span></div>
        </div>
        <p class="text-center text-lg font-semibold">Turn Your Videos Into <em>Sales Machine</em></p>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-center text-black uppercase leading-tight mb-4">
            Become A Powerful <mark class="bg-yellow-200">Content Creator</mark> And Edit Those Videos <mark class="bg-yellow-200">Like A Pro</mark></h1>
       
    
          <div class="flex justify-center mb-4">
            {{-- Placeholder for your main icon/logo --}}
            <div class="w-24 h-24 bg-red-600 rounded-full flex items-center justify-center">
              <div class="bg-white rounded-full p-4">
                <img src="{{ asset("/img/logo.webp") }}" alt="Content Ideation" class="w-12 h-12" />
              </div>
            </div>
          </div>
    
          <p class="text-center text-lg text-red-600 font-semibold mb-6">
            …And Even Overcome Camera Shyness All From The Comfort Of Your Home.
          </p>
        </div>
      </section>
    
    
      {{-- WHAT YOU'LL LEARN (gradient!) --}}
      <section class="w-full bg-gradient-to-b from-[#E80613] to-black text-white py-14 px-4" style="
      background-image:
        linear-gradient(to bottom,rgba(232,6,19,0.8),rgba(0,0,0,0.8)),
        url('/img/background3.png');
    ">
        <div class="max-w-screen-xl mx-auto">
          <h2 class="text-4xl font-extrabold text-center mb-8">WHAT YOU’LL LEARN</h2>
    
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 max-w-5xl mx-auto">
            {{-- Card 1: Content Ideation --}}
            <div class="flex flex-col items-center text-center">
              <div class="bg-white rounded-2xl p-4 mb-4">
                <img src="{{ asset("/img/idea.png") }}" alt="Content Ideation" class="w-8 h-8" />
              </div>
              <h3 class="font-extrabold mb-2">CONTENT IDEATION</h3>
              <p class="text-lg">
                How to come up with content ideas for business: we’ll brainstom with you content ideas, specifically for your brand and how you can come up with content ideas on your own too.
              </p>
            </div>
            {{-- Card 2: Video Mastery --}}
            <div class="flex flex-col items-center text-center">
              <div class="bg-white rounded-2xl p-4 mb-4">
                <img src="{{ asset("/img/play-button.png") }}" alt="Video Mastery" class="w-8 h-8" />
              </div>
              <h3 class="font-extrabold mb-2">VIDEO MASTERY</h3>
              <p class="text-lg">
                How to shoot high quality videos; Get ready to learn step by step detailed techniques to make engaging videos for your brand.
              </p>
            </div>
            {{-- Card 3: Mobile Editing --}}
            <div class="flex flex-col items-center text-center">
              <div class="bg-white rounded-2xl p-4 mb-4">
                <img src="{{ asset("/img/iphone2.png") }}" alt="Mobile Editing" class="w-8 h-8" />
              </div>
              <h3 class="font-extrabold mb-2">MOBILE EDITING</h3>
              <p class="text-lg">
                How to edit your videos; You will learn the best editing skills that will make your content stand out all while using just your phone.
              </p>
            </div>
            {{-- Card 4: Camera Confidence --}}
            <div class="flex flex-col items-center text-center">
              <div class="bg-white rounded-2xl p-4 mb-4">
                <img src="{{ asset("/img/camera.png") }}" alt="Camera Confidence" class="w-8 h-8" />
              </div>
              <h3 class="font-extrabold mb-2">CAMERA CONFIDENCE</h3>
              <p class="text-lg">
                Overcome Camera Shyness; We’d work you through from start to finish, how you can still make content like a pro even if you are camera shy.
              </p>
            </div>
          </div>
    
          <div class="text-center mt-10">
            <a href="{{ route('checkout.form') }}" class="inline-block bg-yellow-200 text-black font-bold px-6 py-5 rounded-full">
              CLICK HERE TO JOIN FOR JUST ₦{{ $amount }} →
            </a>
        </div>
        {{-- BONUS OFFER --}}
     
        <div class="max-w-screen-xl mx-auto mt-24">
          <h2 class="text-4xl font-extrabold text-center mb-8">BONUS OFFER</h2>
    
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            {{-- Bonus 1: Video Review --}}
            
            <div class="flex flex-col items-center text-center">
              <div class="bg-white rounded-2xl p-4 mb-4">
                <img src="{{ asset("/img/review.png") }}" alt="Mobile Editing" class="w-8 h-8" />
              </div>
              <h3 class="font-extrabold mb-2">VIDEO REVIEW</h3>
              <p class="text-lg">
                A Dedicated Instructor That Will Review Your Videos, Point Out Errors<br/>
                And Help You Solve Them.
              </p>
            </div>
            {{-- Bonus 2: Business Network --}}
            <div class="flex flex-col items-center text-center">
              <div class="bg-white rounded-2xl p-4 mb-4">
                <img src="{{ asset("/img/network.png") }}" alt="Mobile Editing" class="w-8 h-8" />
              </div>
              <h3 class="font-extrabold mb-2">BUSINESS NETWORK</h3>
              <p class="text-lg">
                Our Online Community Of Professionals And Other Business Owners<br/>
                Where You Can Ask Questions.
              </p>
            </div>
          </div>
        </div>
      </section>
    
      {{-- STATS + TESTIMONIALS --}}
      <section class="w-full bg-yellow-200 py-12 px-4">
        <div class="max-w-screen-xl mx-auto">
          <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-8 text-center mb-8">
            <div>
              <span class="block font-bold text-2xl">27</span>
              <span class="text-lg text-black">Classes Previously Done</span>
            </div>
            <div>
              <span class="block font-bold text-2xl">5,684</span>
              <span class="text-lg text-black">Others Have Joined</span>
            </div>
          </div>
    
          <h2 class="text-4xl font-extrabold text-center text-black mb-6">Testimonials From BrainREELS</h2>
    
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-4xl mx-auto">
            {{-- Testimonial placeholders (e.g. 300×200 each) --}}
            <img src="{{ asset('/img/testimonial1.jpg') }}" alt="Testimonial 1" class="rounded shadow" />
            <img src="{{ asset('/img/testimonial2.jpg') }}" alt="Testimonial 2" class="rounded shadow" />
            <img src="{{ asset('/img/testimonial3.jpg') }}" alt="Testimonial 3" class="rounded shadow" />
            <img src="{{ asset('/img/testimonial4.jpg') }}" alt="Testimonial 4" class="rounded shadow" />
          </div>
    
          <div class="text-center mt-8">
            <a href="{{ route('checkout.form') }}" class="inline-block bg-red-600 text-white font-bold px-6 py-5 rounded-full">
              CLICK HERE TO JOIN FOR JUST ₦{{ $amount }} →
            </a>
          </div>
        </div>
      </section>
    
    
      {{-- URGENCY / REASON SECTION (gradient!) --}}
      <section class="w-full bg-gradient-to-b from-[#E80613] to-black text-white py-12 px-4" style="
      background-image:
        linear-gradient(to bottom,rgba(232,6,19,0.8),rgba(0,0,0,0.8)),
        url('/img/blessing.jpg');
    ">
        <div class="max-w-screen-xl mx-auto">
          <h2 class="text-4xl font-extrabold text-center mb-4">ONLY REASON WHY YOU CAN MISS THIS CLASS</h2>
          <div class="max-w-3xl mx-auto space-y-4 text-lg uppercase text-center leading-relaxed">
            <p>
              In our 15th edition of BrianREELS Challenge we’re only taking business owners who have been struggling 
              with consistently making content for their brand.
            </p>
            <p>
              We’re going to guide you from being a beginner with no content creation knowledge to being a pro that 
              posts new content every day.
            </p>
            <p>
              So if you’re okay with having no content ideas and an empty social media page with no content to post, 
              then you can by all means miss our BrianREELS Challenge starting out this Friday.
            </p>
            <p class="font-semibold mt-4 text-yellow-200 text-2xl" style="text-transform: none;">Registration Ends In 24 Hours</p>
            <p>
              And the next class isn’t until September, 2025. I wonder how much you will have missed out on before then 
              because you don’t know how to create content for your business.
            </p>
          </div>
    
          <div class="text-center mt-8">
            <a href="{{ route('checkout.form') }}" class="inline-block bg-yellow-200 text-black font-bold px-6 py-5 rounded-full">
              CLICK HERE TO JOIN FOR JUST ₦{{ $amount }} →
            </a>
          </div>
        </div>
        {{-- FAQ SECTION (gradient!) --}}
        <div class="max-w-screen-xl mx-auto pt-24">
          <h2 class="text-4xl font-extrabold text-center mb-8 py-6 border-t-1 border-b-1">FAQ</h2>
          <div class="max-w-2xl mx-auto space-y-6 text-lg">
            {{-- FAQ Item 1 --}}
            <div>
              <h3 class="font-bold mb-2 text-2xl">Will I Be Learning Video Editing Only?</h3>
              <p>
                No—it’s not just video editing. It’s all you need to consistently create content for your brand, 
                coming up with video ideas, shooting quality videos and editing them to be engaging to your audience.
              </p>
            </div>
    
            {{-- FAQ Item 2 --}}
            <div>
              <h3 class="font-semibold mb-2 text-2xl">Can I Learn How To Edit Pictures Too?</h3>
              <p>
                The knowledge you gain from learning how to edit your videos could be applicable to editing your pictures. 
                However, the classes focus on the video aspect of editing and not picture editing.
              </p>
            </div>
    
            {{-- FAQ Item 3 --}}
            <div>
              <h3 class="font-semibold mb-2 text-2xl">Can I Edit With My Phone?</h3>
              <p>
                Yes. Your phone is what you need to edit engaging videos for your business.
              </p>
            </div>
    
            {{-- FAQ Item 4 --}}
            <div>
              <h3 class="font-semibold mb-2 text-2xl">I Hope I Won’t Be Charged Extra?</h3>
              <p>
                No. It’s just a one-time fee of ₦2,000 to become a master content creator for your brand.
              </p>
            </div>
    
            {{-- FAQ Item 5 --}}
            <div>
              <h3 class="font-semibold mb-2 text-2xl">Where Will The Training Take Place?</h3>
              <p>
                It will take place on WhatsApp. However, we have created a backup of all the trainings on Telegram 
                in case anything happens to your WhatsApp.
              </p>
            </div>
    
            {{-- FAQ Item 6 --}}
            <div>
              <h3 class="font-semibold mb-2 text-2xl">Will I Become A Professional Video Editor After The Training?</h3>
              <p>
                You will learn from this class all that you need to know about editing videos for your brand.
              </p>
            </div>
          </div>
        </div>
      </section>    
    </body>
</html>

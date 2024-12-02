<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Container -->
    <div class="w-3/4 mx-auto my-8 bg-white shadow-lg rounded-lg p-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <!-- Go Back Button -->
            <a href="{{ url()->previous() }}" class="flex items-center text-bg_blue hover:text-blue-600 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1.707-11.707a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 001.414 1.414L12 10.414a1 1 0 000-1.414l-1.293-1.293z" clip-rule="evenodd" />
                </svg>
                Go Back
            </a>
        </div>

        <!-- Logo and Description -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/Logo.png') }}" alt="BreatheBetter Logo" class="h-16 mx-auto brightness-25 mb-2">
            <h2 class="text-2xl font-semibold text-bg_blue mb-4">Breathe Better</h2>
            <p class="text-gray-600 font-medium">Empowering you to breathe better and live better every day.</p>
            <p class="text-gray-600">Learn more about who we are and what we stand for.</p>
        </div>

        <!-- Carousel -->
        <div id="default-carousel" class="relative w-full mb-8" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/gerd.jpg" class="absolute block w-full h-full object-cover" style="object-position: 50% 90%;" alt="Gerd">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/franco.jpg" class="absolute block w-full h-full object-cover" style="object-position: center 20%;" alt="Franco">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/israel.jpg" class="absolute block w-full h-full object-cover" alt="Israel">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/jeilo.jpg" class="absolute block w-full h-full object-cover" style="object-position: center 40%;" alt="Jeilo">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/merc.jpg" class="absolute block w-full h-full object-cover" alt="Merc">
                </div>
                <!-- Item 6 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/raily.jpg" class="absolute block w-full h-full object-cover" style="object-position: center 30%;" alt="Raily">
                </div>
            </div>
            
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6" data-carousel-slide-to="5"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>


        <!-- Mission Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Mission</h2>
            <p class="text-gray-600">
                At BreatheBetter, our mission is to empower individuals to enhance their mental well-being through the power of breath. 
                We believe that with the right tools and guidance, anyone can cultivate calmness and resilience in their daily lives.
            </p>
        </section>

        <!-- Our Story Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Story</h2>
            <p class="text-gray-600">
                BreatheBetter was founded in 2024 out of a passion for mental health and a desire to provide accessible solutions for stress and anxiety. 
                Recognizing the profound impact of mindful breathing, we developed a system that blends science and mindfulness to help users reclaim their peace of mind.
            </p>
        </section>

        <!-- What We Do Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">What We Do</h2>
            <p class="text-gray-600">
                BreatheBetter offers a comprehensive system designed to help users calm their minds and boost their mental health. 
                Our user-friendly platform provides guided breathing exercises, meditation techniques, and personalized wellness plans, 
                making it easy for anyone to integrate mindfulness into their routine.
            </p>
        </section>

        <!-- Our Team Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Team</h2>
            <p class="text-gray-600">
                Our dedicated team consists of passionate college students and technology enthusiasts, all committed to making mental wellness accessible to everyone. 
                We bring together diverse expertise to ensure that BreatheBetter is both effective and engaging.
            </p>
        </section>

        <!-- Join Us Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Join Us</h2>
            <p class="text-gray-600">
                We invite you to explore the transformative potential of mindful breathing with BreatheBetter. Whether you’re looking to reduce stress, 
                enhance focus, or simply find moments of calm, we’re here to support you every step of the way.
            </p>
        </section>

        <!-- Contact Us Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contact Us</h2>
            <p class="text-gray-600">
                Have questions or want to learn more about our system? Reach out to us at <strong>+63 912 2341 142</strong>. We’d love to hear from you!
            </p>
        </section>
    </div>

</body>
</html>

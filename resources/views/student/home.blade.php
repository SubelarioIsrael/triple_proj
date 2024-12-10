<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white text-bg_blue font-sans">

    <x-header :notifications="$notifications" />

    <!-- Main Content -->
    <main class="container mx-auto bg-white py-8 px-4">
        <!-- Section: Not Feeling Well -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold">Not Feeling Well?</h2>
                <p class="text-base mt-1">Seek help from a trusted professional</p>
            </div>
            <a name="hotlinesBtn" href="{{ route('student.hotlines') }}" class="text-red-500 text-lg font-semibold hover:underline">See all</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Crisis Hotline 1 -->
            <a href="tel:+632889377603" class="block p-6 bg-white border border-bg_blue rounded-lg text-center shadow-lg hover:bg-gray-100 transition">
                <p class="text-bg_blue font-semibold text-xl">In Touch: Crisis Line</p>
                <p class="text-bg_blue mt-2 text-lg">+63 2 8893 77603</p>
            </a>

            <!-- Crisis Hotline 2 -->
            <a href="tel:+63966469626" class="block p-6 bg-white border border-bg_blue rounded-lg text-center shadow-lg hover:bg-gray-100 transition">
                <p class="text-bg_blue font-semibold text-xl">Tawag Paglaum</p>
                <p class="text-bg_blue mt-2 text-lg">+63 966-46-9626</p>
            </a>
        </div>

        <!-- Section: Features -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Track Your Mood -->
            <div class="p-6 bg-white border border-bg_blue rounded-lg shadow-lg text-center hover:bg-gray-100 transition">
                <div class="flex justify-center mb-4">
                    <!-- Icon (Example: Emoji or SVG) -->
                    <img src="{{ URL('images/heart.png')}}" alt="Mood Icon" class="w-12 h-12 scale-150">
                </div>
                <h3 class="text-xl font-bold text-bg_blue mb-2">Track Your Mood</h3>
                <p class="text-gray-600 mb-4">Record how you're feeling and track patterns.</p>
                <a href="{{ route('student.track-your-mood') }}" class="w-full block py-2 bg-red-500 text-white font-semibold rounded hover:bg-white hover:text-red-500 border border-red-500 text-center transition">
                    Start Now
                </a>
            </div>

            <!-- Breathing Exercises -->
            <div class="p-6 bg-white border border-bg_blue rounded-lg shadow-lg text-center hover:bg-gray-100 transition">
                <div class="flex justify-center mb-4">
                    <img src="{{ URL('images/air.png') }}" alt="Breathing Icon" class="w-12 h-12 scale-150">
                </div>
                <h3 class="text-xl font-bold text-bg_blue mb-2">Breathing Exercises</h3>
                <p class="text-gray-600 mb-4">Calm yourself with guided breathing.</p>
                <a href="{{ route('student.exercises') }}" class="w-full block py-2 bg-red-500 text-white font-semibold rounded hover:bg-white hover:text-red-500 border border-red-500 text-center transition">
                    Breathe Better Now
                </a>
            </div>

            <!-- Chat with Nysa -->
            <div class="p-6 bg-white border border-bg_blue rounded-lg shadow-lg text-center hover:bg-gray-100 transition">
                <div class="flex justify-center mb-4">
                    <img src="{{ URL('images/Nysa.png') }}" alt="Chat Icon" class="w-12 h-12 brightness-25 scale-150">
                </div>
                <h3 class="text-xl font-bold text-bg_blue mb-2">Chat with Nysa</h3>
                <p class="text-gray-600 mb-4">Talk to our AI chatbot for support.</p>
                <a href="{{ route('student.chat') }}" class="w-full block py-2 bg-red-500 text-white font-semibold rounded hover:bg-white hover:text-red-500 border border-red-500 text-center transition">
                    Chat Now
                </a>
            </div>

            <!-- Read Up Resources -->
            <div class="p-6 bg-white border border-bg_blue rounded-lg shadow-lg text-center hover:bg-gray-100 transition">
                <div class="flex justify-center mb-4">
                    <img src="{{ URL('images/article.png')}}" alt="Resources Icon" class="w-12 h-12 scale-150">
                </div>
                <h3 class="text-xl font-bold text-bg_blue mb-2">Read Up Resources</h3>
                <p class="text-gray-600 mb-4">Explore helpful articles and tips.</p>
                <a id="resourcesBtn" href="{{ route('student.online-resources') }}" class="w-full block py-2 bg-red-500 text-white font-semibold rounded hover:bg-white hover:text-red-500 border border-red-500 text-center transition">
                    Read Now
                </a>
            </div>
        </div>

    </main>

    <!-- JavaScript -->
    <script src="{{ Vite::asset('resources/js/sidebar.js') }}"></script>
</body>
</html>

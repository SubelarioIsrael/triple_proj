<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Microphone Input</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-bg_blue text-white font-[sans-serif]">
    <div class="min-h-screen flex flex-col justify-between py-16 px-6">
        <div class="w-full max-w-lg mx-auto">
            <!-- Back Button -->
            <div class="flex items-center space-x-4 mb-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <a href="{{ url()->previous() }}" class="text-lg font-semibold hover:underline">BACK</a>
            </div>

            <!-- Greeting and Instructions -->
            <div class="text-center mb-16">
                <p class="text-2xl font-semibold">Hi <span class="text-blue-400">{{$user->username}}</span>! Please speak into the microphone</p>
            </div>

            <!-- User Avatar -->
            <div class="mb-16">
                <img src="{{ URL('images/Nysa.png') }}" alt="Nysa Logo" class="scale-150 w-28 h-28 mx-auto rounded-full">
            </div>

            <!-- Name and Waveform -->
            <div class="text-center mb-16">
                <div class="h-10 w-full via-gray-700 to-gray-500 rounded-lg flex items-center justify-center">
                    <!-- Static SVG waveform -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20" class="w-3/4 h-6 text-white">
                        <rect width="2" height="8" x="5" y="6" fill="white" />
                        <rect width="2" height="14" x="15" y="3" fill="white" />
                        <rect width="2" height="12" x="25" y="4" fill="white" />
                        <rect width="2" height="18" x="35" y="1" fill="white" />
                        <rect width="2" height="10" x="45" y="5" fill="white" />
                        <rect width="2" height="16" x="55" y="2" fill="white" />
                        <rect width="2" height="12" x="65" y="4" fill="white" />
                        <rect width="2" height="14" x="75" y="3" fill="white" />
                        <rect width="2" height="8" x="85" y="6" fill="white" />
                    </svg>
                </div>
            </div>

            <!-- Microphone Button -->
            <div class="flex flex-col items-center">
                <button id="start-voice-recognition" type="submit" class="w-20 h-20 bg-bg_blue rounded-full flex items-center justify-center hover:bg-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-400" onclick="window.location.href='{{ route('authentication.welcome-back') }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" class="w-10 h-10">
                        <path d="M12 14a4 4 0 004-4V5a4 4 0 10-8 0v5a4 4 0 004 4z"></path>
                        <path d="M19 10a1 1 0 00-2 0 5 5 0 01-10 0 1 1 0 00-2 0 7 7 0 007 7v3H8a1 1 0 000 2h8a1 1 0 000-2h-4v-3a7 7 0 007-7z"></path>
                    </svg>
                </button>
                <p class="mt-8 text-lg">Speak as you press the microphone button</p>
            </div>
        </div>
    </div>
</body>
</html>

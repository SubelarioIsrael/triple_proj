<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $exercise['name'] }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <x-header></x-header>

    <!-- Exercise Container -->
    <div class="flex flex-col items-center justify-start min-h-[calc(100vh-5rem)] mt-12 px-4 space-y-12">
        <!-- Exercise Details -->
        <div class="flex flex-col items-center text-center space-y-4">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-4">{{ $exercise['name'] }}</h2>
            <p class="text-lg text-gray-600">{{ $exercise['instructions'] }}</p>
        </div>
    
        <!-- Breathing Circle -->
        <div class="relative flex flex-col items-center justify-center space-y-8">
            <div id="circle" class="w-32 h-32 rounded-full bg-teal-500 transition-transform"></div>
            <div id="countdown" class="absolute text-white text-2xl font-semibold"></div>
        </div>
    
        <!-- Start Button -->
        <button id="startBtn" class="mt-8 bg-green-600 text-white px-8 py-3 rounded-lg shadow hover:bg-green-700">
            Start
        </button>
    </div>

    <!-- JavaScript -->
    <!-- JavaScript -->
    <script src="{{ Vite::asset('resources/js/sidebar.js') }}"></script>
    <script>
        document.getElementById('startBtn').addEventListener('click', () => {
            const inhaleTime = {{ $exercise['inhale_time'] }};
            const holdTime = {{ $exercise['hold_time'] }};
            const exhaleTime = {{ $exercise['exhale_time'] }};
            const totalCycleTime = inhaleTime + holdTime + exhaleTime;

            const circle = document.getElementById('circle');
            const countdown = document.getElementById('countdown');

            function updateCountdown(time) {
                countdown.textContent = time > 0 ? time : '';
            }

            function startBreathingCycle() {
                // Inhale Phase
                let currentPhase = inhaleTime;
                circle.style.transition = `transform ${inhaleTime}s ease-in-out`;
                circle.style.transform = 'scale(1.5)';
                updateCountdown(currentPhase);

                const inhaleInterval = setInterval(() => {
                    currentPhase--;
                    updateCountdown(currentPhase);

                    if (currentPhase <= 0) {
                        clearInterval(inhaleInterval);

                        // Hold Phase
                        currentPhase = holdTime;
                        updateCountdown(currentPhase);

                        const holdInterval = setInterval(() => {
                            currentPhase--;
                            updateCountdown(currentPhase);

                            if (currentPhase <= 0) {
                                clearInterval(holdInterval);

                                // Exhale Phase
                                currentPhase = exhaleTime;
                                circle.style.transition = `transform ${exhaleTime}s ease-in-out`;
                                circle.style.transform = 'scale(1)';
                                updateCountdown(currentPhase);

                                const exhaleInterval = setInterval(() => {
                                    currentPhase--;
                                    updateCountdown(currentPhase);

                                    if (currentPhase <= 0) {
                                        clearInterval(exhaleInterval);
                                    }
                                }, 1000);
                            }
                        }, 1000);
                    }
                }, 1000);
            }

            // Start breathing cycle and repeat
            startBreathingCycle();
            setInterval(startBreathingCycle, totalCycleTime * 1000);
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercises</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-header></x-header>

    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6 mt-8">
        Breathing Exercises
    </h2>
    <p class="text-center text-gray-700 mb-6">Please select an exercise you would like to perform.</p>

    <div class="grid grid-cols-2 gap-6 p-4">
        @foreach ($exercises as $index => $exercise)
            <a href="{{ route('student.exercise.show', ['name' => urlencode($exercise['name'])]) }}" 
               class="subject-box flex flex-col items-center text-center p-4 rounded-lg bg-gray-50 shadow hover:bg-gray-100">
                <img src="{{ asset('images/exercises/' . ['self-improvement.png', 'check_box_outline.png', 'balance.png', 'bolt.png'][$index]) }}" 
                     alt="{{ $exercise['name'] }} Icon" 
                     class="w-16 h-16 mb-2">
                <span class="text-lg font-semibold">{{ $exercise['name'] }}</span>
            </a>
        @endforeach
    </div>

    <!-- JavaScript -->
    <script src="{{ Vite::asset('resources/js/sidebar.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercises</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <x-admin-sidebar></x-admin-sidebar>

        <div class="flex-1 p-6 overflow-auto">
            <div class="flex justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Exercises</h1>
                <a href="{{ route('admin.exercises.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Add New Exercise</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($exercises as $exercise)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $exercise->name }}</h2>
                        <p class="text-sm text-gray-600 mb-1"><strong>Inhale Time:</strong> {{ $exercise->inhale_time }} seconds</p>
                        <p class="text-sm text-gray-600 mb-1"><strong>Hold Time:</strong> {{ $exercise->hold_time }} seconds</p>
                        <p class="text-sm text-gray-600 mb-1"><strong>Exhale Time:</strong> {{ $exercise->exhale_time }} seconds</p>
                        <p class="text-sm text-gray-600"><strong>Instructions:</strong> {{ $exercise->instructions }}</p>

                        <!-- Edit Button -->
                        <a href="{{ route('admin.exercises.edit', $exercise->id) }}" class="mt-4 inline-block bg-yellow-500 text-black px-4 py-2 rounded-md border-2">Edit</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>

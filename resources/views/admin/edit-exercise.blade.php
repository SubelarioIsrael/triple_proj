<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Exercise</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <x-admin-sidebar></x-admin-sidebar>

        <div class="flex-1 p-6 overflow-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Exercise</h1>

            <form action="{{ route('admin.exercises.update', $exercise->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700">Exercise Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $exercise->name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div>
                        <label for="inhale_time" class="block text-sm font-semibold text-gray-700">Inhale Time (seconds)</label>
                        <input type="number" name="inhale_time" id="inhale_time" value="{{ old('inhale_time', $exercise->inhale_time) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div>
                        <label for="hold_time" class="block text-sm font-semibold text-gray-700">Hold Time (seconds)</label>
                        <input type="number" name="hold_time" id="hold_time" value="{{ old('hold_time', $exercise->hold_time) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div>
                        <label for="exhale_time" class="block text-sm font-semibold text-gray-700">Exhale Time (seconds)</label>
                        <input type="number" name="exhale_time" id="exhale_time" value="{{ old('exhale_time', $exercise->exhale_time) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div>
                        <label for="instructions" class="block text-sm font-semibold text-gray-700">Instructions</label>
                        <textarea name="instructions" id="instructions" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('instructions', $exercise->instructions) }}</textarea>
                    </div>

                    <button id="editExerciseBtn" type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md">Update Exercise</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

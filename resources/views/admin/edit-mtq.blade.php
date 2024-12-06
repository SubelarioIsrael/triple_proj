    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Question</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex">

    <!-- Sidebar -->
    <x-admin-sidebar></x-admin-sidebar>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-semibold mb-4">Edit Mood Track Question</h1>

        <!-- Form to Edit Question -->
        <form action="{{ route('admin.mtq.update', $question->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="q_item" class="block text-lg">Question</label>
                <input type="text" name="q_item" id="q_item" value="{{ old('q_item', $question->q_item) }}" class="mt-2 p-2 border border-gray-300 rounded w-full" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Save Changes</button>
        </form>

        <!-- Back to Questions List -->
        <div class="mt-4">
            <a href="{{ route('admin.mtq') }}" class="text-blue-500 hover:text-blue-700">Back to Questions List</a>
        </div>

    </div>

</body>
</html>

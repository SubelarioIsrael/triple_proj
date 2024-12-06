<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Resource</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex">
    <!-- Sidebar -->
    <x-admin-sidebar></x-admin-sidebar>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-semibold mb-4">Edit Resource</h1>

        <!-- Form to Edit Resource -->
        <form action="{{ route('resources.update', $resource->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="url" class="block text-lg">URL</label>
                <input type="text" name="url" id="url" value="{{ old('url', $resource->url) }}" class="mt-2 p-2 border border-gray-300 rounded w-full" required>
            </div>

            <div class="mb-4">
                <label for="thumbnail" class="block text-lg">Thumbnail URL</label>
                <input type="text" name="thumbnail" id="thumbnail" value="{{ old('thumbnail', $resource->thumbnail) }}" class="mt-2 p-2 border border-gray-300 rounded w-full" required>
            </div>

            <div class="mb-4">
                <label for="title" class="block text-lg">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $resource->title) }}" class="mt-2 p-2 border border-gray-300 rounded w-full" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Save Changes</button>
        </form>

        <!-- Back to Resources List -->
        <div class="mt-4">
            <a href="{{ route('resources.index') }}" class="text-blue-500 hover:text-blue-700">Back to Resources</a>
        </div>
    </div>
</body>
</html>

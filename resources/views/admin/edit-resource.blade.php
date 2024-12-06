<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Resource</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto py-6">
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Resource</h2>
        <form method="POST" action="{{ route('admin-resources.update-resource', $resource->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="url" class="block font-semibold">URL</label>
                <input type="text" name="url" id="url" value="{{ $resource->url }}" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label for="thumbnail" class="block font-semibold">Thumbnail</label>
                <input type="text" name="thumbnail" id="thumbnail" value="{{ $resource->thumbnail }}" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label for="title" class="block font-semibold">Title</label>
                <input type="text" name="title" id="title" value="{{ $resource->title }}" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Save
            </button>
        </form>
    </div>
</body>
</html>

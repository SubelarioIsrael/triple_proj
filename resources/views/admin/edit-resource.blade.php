<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resource</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex h-screen">
        <x-admin-sidebar></x-admin-sidebar>
        <div class="container mx-auto py-6">
            <h2 class="text-2xl font-bold mb-4">Edit Resource</h2>
    
            <!-- Display success or error messages -->
            @if (session('success'))
                <div class="bg-green-100 text-green-700 border border-green-400 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @elseif ($errors->any())
                <div class="bg-red-100 text-red-700 border border-red-400 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <form method="POST" action="{{ route('admin-resources.update-resource', $resource->id) }}">
                @csrf
                @method('PUT') <!-- Use PUT for updates -->
    
                <div class="mb-4">
                    <label for="url" class="block font-semibold">Resource URL</label>
                    <input type="text" name="url" id="url" class="border p-2 rounded w-full" value="{{ $resource->url }}" required>
                </div>
    
                <div class="mb-4">
                    <label for="thumbnail" class="block font-semibold">Thumbnail URL</label>
                    <input type="text" name="thumbnail" id="thumbnail" class="border p-2 rounded w-full" value="{{ $resource->thumbnail }}" required>
                </div>
    
                <div class="mb-4">
                    <label for="title" class="block font-semibold">Title</label>
                    <input type="text" name="title" id="title" class="border p-2 rounded w-full" value="{{ $resource->title }}" required>
                </div>
    
                <button id="saveChangeBtn" type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Save Changes
                </button>
            </form>
    
            <a href="{{ route('admin-resources.index') }}" class="inline-block mt-4 text-blue-500 hover:underline">
                Back to Resources
            </a>
        </div>
    </div>
    
</body>
</html>

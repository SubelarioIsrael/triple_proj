<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Resources</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-admin-sidebar></x-admin-sidebar>

        <!-- Main Content -->
        <div class="container mx-auto py-6">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="bg-green-100 text-green-700 border border-green-400 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Helpful Links Section -->
            <h2 class="text-2xl font-bold mb-6 text-center">Helpful Links</h2>
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 border border-red-400 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('admin-resources.store-resource') }}" class="mb-12">
                @csrf
                <div class="grid grid-cols-3 gap-4">
                    <input type="text" name="url" placeholder="Resource URL" value="{{ old('url') }}" class="border p-2 rounded" required>
                    <input type="text" name="thumbnail" placeholder="Thumbnail URL" value="{{ old('thumbnail') }}" class="border p-2 rounded" required>
                    <input type="text" name="title" placeholder="Resource Title" value="{{ old('title') }}" class="border p-2 rounded" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
                    Add Resource
                </button>
            </form>
            <div class="grid grid-cols-3 gap-6">
                @foreach ($resources as $resource)
                    <div class="border rounded-lg shadow-lg overflow-hidden relative p-4">
                        <a href="{{ $resource->url }}" target="_blank" class="block">
                            <img src="{{ asset($resource->thumbnail) }}" alt="{{ $resource->title }}" class="w-full h-40 object-cover">
                            <div class="p-4 text-center">
                                <h3 class="text-md font-semibold mb-8">{{ $resource->title }}</h3>
                            </div>
                        </a>
                        <a href="{{ route('admin-resources.edit-resource', $resource->id) }}" 
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded absolute bottom-0 inset-x-0 m-4">
                            Edit
                        </a>
                    </div>
                @endforeach
                @if ($resources->isEmpty())
                    <p class="text-center text-gray-600">No resources available.</p>
                @endif

                @if ($articles->isEmpty())
                    <p class="text-center text-gray-600">No articles available.</p>
                @endif
            </div>

            <div class="my-12"></div>

            <!-- Articles Section -->
            <h2 class="text-2xl font-bold mb-6 text-center">Articles</h2>
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 border border-red-400 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('admin-resources.store-article') }}" class="mb-12">
                @csrf
                <div class="grid grid-cols-3 gap-4">
                    <input type="text" name="title" placeholder="Article Title" value="{{ old('title') }}" class="border p-2 rounded" required>
                    <input type="text" name="excerpt" placeholder="Article Excerpt" value="{{ old('excerpt') }}" class="border p-2 rounded" required>
                    <input type="text" name="url" placeholder="Article URL" value="{{ old('url') }}" class="border p-2 rounded" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">
                    Add Article
                </button>
            </form>

            <div class="grid grid-cols-3 gap-6">
                @foreach ($articles as $article)
                    <div class="border rounded-lg shadow-lg p-4 relative">
                        <a href="{{ $article->url }}" target="_blank" class="block">
                            <h3 class="text-md font-semibold">{{ $article->title }}</h3>
                            <p class="text-sm text-gray-600 mt-2 mb-14">{{ $article->excerpt }}</p>
                        </a>
                        <a href="{{ route('admin-resources.edit-article', $article->id) }}" 
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded absolute bottom-0 inset-x-0 m-4">
                            Edit
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>

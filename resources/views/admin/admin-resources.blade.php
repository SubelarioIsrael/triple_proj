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
            <!-- Helpful Links Section -->
            <h2 class="text-2xl font-bold mb-6 text-center">Helpful Links</h2>
            <a href="{{ route('admin.resources.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4">
                Add Resource
            </a>
            <div class="grid grid-cols-3 gap-6">
                @foreach ($resources as $resource)
                    <div class="border rounded-lg shadow-lg overflow-hidden relative p-4">
                        <a href="{{ $resource->url }}" target="_blank" class="block">
                            <img src="{{ $resource->thumbnail }}" alt="{{ $resource->title }}" class="w-full h-40 object-cover">
                            <div class="p-4 text-center">
                                <h3 class="text-md font-semibold mb-8">{{ $resource->title }}</h3>
                            </div>
                        </a>
                        <a href="{{ route('resources.edit', $resource->id) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded absolute bottom-0 inset-x-0 m-4 mt-8 text-center">
                            Edit
                        </a>
                    </div>
                @endforeach
            </div>
        
            <div class="my-12"></div>
        
            <!-- Articles Section -->
            <h2 class="text-2xl font-bold mb-6 text-center">Articles</h2>
            <a href="{{ route('admin.articles.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4">
                Add Article
            </a>
            <div class="grid grid-cols-3 gap-6">
                @foreach ($articles as $article)
                    <div class="border rounded-lg shadow-lg p-4 relative">
                        <a href="{{ $article->url }}" target="_blank" class="block">
                            <h3 class="text-md font-semibold">{{ $article->title }}</h3>
                            <p class="text-sm text-gray-600 mt-2 mb-14">{{ $article->excerpt }}</p>
                        </a>
                        <a href="{{ route('articles.edit', $article->id) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded absolute bottom-0 inset-x-0 m-4 text-center">
                            Edit
                        </a>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
</body>
</html>

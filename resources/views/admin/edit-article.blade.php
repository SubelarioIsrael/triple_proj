<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Article</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex h-screen">
        <x-admin-sidebar></x-admin-sidebar>
        <div class="container mx-auto py-6">
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Article</h2>
    
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 border border-red-400 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <!-- Edit Form -->
            <form method="POST" action="{{ route('admin-resources.update-article', $article->id) }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-4">
                    <input type="text" name="title" placeholder="Article Title" value="{{ old('title', $article->title) }}" class="border p-2 rounded" required>
                    <input type="text" name="excerpt" placeholder="Article Excerpt" value="{{ old('excerpt', $article->excerpt) }}" class="border p-2 rounded" required>
                    <input type="text" name="url" placeholder="Article URL" value="{{ old('url', $article->url) }}" class="border p-2 rounded" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">
                    Update Article
                </button>
            </form>
    
            <a href="{{ route('admin-resources.index') }}" class="text-blue-500 hover:underline mt-4 block text-center">Back to Resources</a>
        </div>
    </div> 
</body>
</html>

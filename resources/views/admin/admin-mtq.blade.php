<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex">

    <!-- Sidebar -->
    <x-admin-sidebar></x-admin-sidebar>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-semibold mb-4">Mood Track Questions</h1>

        @foreach($questions as $question)
            <div class="mb-4 p-4 bg-gray-100 rounded-lg shadow">
                <p class="text-lg"><strong>ID:</strong> {{ $question->id }}</p>
                <p class="text-lg"><strong>Question:</strong> {{ $question->q_item }}</p>
                <!-- Edit Button -->
                <a href="{{ route('admin.mtq.edit', $question->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
            </div>
        @endforeach
    </div>

</body>
</html>

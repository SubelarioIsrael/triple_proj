<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <x-admin-sidebar></x-admin-sidebar>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Feedback</h1>

            

            <!-- Feedback List -->
            <div class="space-y-6">
                @forelse($feedbacks as $feedback)
                    <div class="border bg-white rounded-lg shadow p-4">
                        <!-- Feedback Subject -->
                        <div class="flex items-center mb-2">
                            <div class="w-5 h-5 mr-2">
                                @switch(strtolower($feedback->subject))
                                    @case('bug') 🐞 @break
                                    @case('suggestion') 💡 @break
                                    @case('content') 📄 @break
                                    @case('compliment') 🎉 @break
                                    @default 🔍
                                @endswitch
                            </div>
                            <span class="font-semibold text-gray-700">{{ ucfirst($feedback->subject) }}</span>
                        </div>

                        <!-- Feedback Content -->
                        <p class="italic text-gray-600 mb-2">"{{ $feedback->feedback }}"</p>

                        <!-- Feedback Metadata -->
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Rating: {{ $feedback->rating }}/5</span>
                            <span>{{ $feedback->created_at->format('m/d/y') }}</span>
                        </div>

                        <!-- Delete Feedback -->
                        <form action="{{ route('admin.feedback.delete', $feedback->id) }}" method="POST" class="mt-2" onsubmit="return confirmDelete('this feedback')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-500">No feedback found.</p>
                @endforelse
            </div>
            <!-- Delete All Feedback -->
            <form action="{{ route('admin.feedback.deleteAll') }}" method="POST" class="my-6" onsubmit="return confirmDelete('all feedback')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Delete All Feedback
                </button>
            </form>
        </div>
    </div>

    <!-- Confirmation Dialog Script -->
    <script>
        function confirmDelete(item) {
            return confirm(`Are you sure you want to delete ${item}? This action cannot be undone.`);
        }
    </script>
</body>
</html>

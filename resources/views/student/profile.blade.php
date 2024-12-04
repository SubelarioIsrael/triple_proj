<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-header></x-header>

    <div class="w-3/4 mx-auto my-8 bg-white shadow-lg rounded-lg p-8">
        <!-- Profile Section -->
        <section class="mb-8 text-center">
            <!-- Profile Picture -->
            <div class="w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden border border-gray-300">
                <!-- Display profile picture or fallback SVG -->
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="Profile Picture" class="w-full h-full object-cover">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100" height="100">
                        <circle cx="50" cy="50" r="48" stroke="gray" stroke-width="2" fill="#d1d5db" />
                        <text x="50%" y="50%" font-size="30" font-weight="bold" fill="#ffffff" text-anchor="middle" alignment-baseline="middle">U</text>
                    </svg>
                @endif
            </div>

            <!-- Profile Info -->
            <h1 class="text-2xl font-semibold text-gray-800 mb-4">Profile</h1>
            <div class="space-y-4">
                <p><strong>Username:</strong> {{ $user->username }}</p>
                <p><strong>Password:</strong> ********</p>
                <p><strong>Phone Number:</strong> {{ $user->contact_number }}</p>
            </div>
        </section>

        <!-- Mood History Section -->
        <section>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Mood History</h2>
            <div class="space-y-4">
                @foreach ($moodHistoryWithBreathing as $history)
                    <a href="{{ route('student.results.show', ['timestamp' => $history->timestamp]) }}" class="block bg-gray-50 p-4 shadow rounded-lg flex items-center hover:bg-gray-100 transition">
                        <div class="flex-grow">
                            <p><strong>Date Taken:</strong> {{ \Carbon\Carbon::parse($history->timestamp)->format('Y-m-d H:i:s') }}</p>
                            <p><strong>Total Score:</strong> {{ $history->total_score }}</p>
                            
                            <!-- Breathing Exercise Recommendation -->
                            <p><strong>Recommended Breathing Exercise:</strong> {{ $history->breathing_exercise }}</p>
                        </div>
                        <img src="images/nav_next.png" alt="Next" class="w-6 h-6 ml-4">
                    </a>
                @endforeach
            </div>
        </section>
        
    </div>

    <!-- JavaScript -->
    <script src="{{ Vite::asset('resources/js/sidebar.js') }}"></script>
</body>
</html>

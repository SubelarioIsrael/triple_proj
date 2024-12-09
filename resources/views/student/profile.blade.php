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
    <x-header :notifications="$notifications" />

    <div class="w-3/4 mx-auto my-8 bg-white shadow-lg rounded-lg p-8">
        <!-- Profile Section -->
        <section class="mb-8 text-center">
            <!-- Profile Picture -->
            <div class="w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden border border-gray-300">
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="Profile Picture" class="w-full h-full object-cover">
                @else
                    <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}?d=mp&f=y" alt="Profile" class="w-full h-full object-cover">
                @endif
            </div>
    
            <!-- Profile Info -->
            <h1 class="text-2xl font-semibold text-gray-800 mb-4">Profile</h1>
            <div class="space-y-4">
                <p id="profile_username"><strong>Username:</strong> {{ $user->username }}</p>
                <p id="profile_email"><strong>Email:</strong> {{ $user->email }}</p>
                <p id="profile_contact_number"><strong>Phone Number:</strong> {{ $user->contact_number }}</p>

            </div>
            <!-- Edit Profile Button -->
            <button id="editProfileBtn" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Edit Profile</button>
        </section>
    
        <!-- Edit Profile Modal -->
        <div id="editProfileModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Profile</h2>
                <form action="{{ route('student.profile.update') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <!-- Username -->
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" id="username" name="username" value="{{ $user->username }}" required class="w-full mt-1 px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
    
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" required class="w-full mt-1 px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
    
                        <!-- Contact Number -->
                        <div>
                            <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                            <input type="text" id="contact_number" name="contact_number" value="{{ $user->contact_number }}" required class="w-full mt-1 px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
    
                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" placeholder="Leave blank to keep current password" class="w-full mt-1 px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
    
                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Leave blank to keep current password" class="w-full mt-1 px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
    
                    <div class="mt-6 flex justify-end space-x-4">
                        <button type="button" id="cancelEditProfileBtn" class="px-4 py-2 bg-gray-300 rounded-lg shadow hover:bg-gray-400">Cancel</button>
                        <button name="saveBtn" type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
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
    
    
    <script>
        // Show and hide the edit profile modal
        document.getElementById('editProfileBtn').addEventListener('click', () => {
            document.getElementById('editProfileModal').classList.remove('hidden');
        });
        document.getElementById('cancelEditProfileBtn').addEventListener('click', () => {
            document.getElementById('editProfileModal').classList.add('hidden');
        });
    </script>
    <!-- JavaScript -->
    <script src="{{ Vite::asset('resources/js/sidebar.js') }}"></script>
</body>
</html>

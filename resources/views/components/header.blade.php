<!-- Sidebar Section -->
<!-- Sidebar Section -->
<div id="sidebar" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 hidden">
    <div id="sidebarContent" class="w-64 bg-white h-full shadow-lg p-6 transform -translate-x-full transition-transform duration-300">
        <!-- Close Button -->
        <button id="closeSidebar" class="text-gray-600 hover:text-gray-800 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <!-- Sidebar Content -->
        <nav>
            <ul class="space-y-4 divide-solid">
                <li><a href="{{ route('student.home') }}" class="mt-4 block text-gray-700 hover:text-blue-600 font-semibold">Home</a></li>
                <li><a id="profileBtn" href="{{ route('student.profile') }}" class="mt-4 block text-gray-700 hover:text-blue-600 font-semibold">Profile</a></li>
                <li><a href="{{ route('student.about-us') }}" class="mt-4 block text-gray-700 hover:text-blue-600 font-semibold">About Us</a></li>
                <li><a id="feedbackBtn" href="{{ route('student.feedback') }}" class="mt-4 block text-gray-700 hover:text-blue-600 font-semibold">Give Feedback</a></li>
                
                <!-- Sign Out Button Section -->
                <li class="mt-8">
                    <!-- Sign Out Button -->
                    <button id="signOutButton" class="mt-4 block text-gray-700 hover:text-blue-600 font-semibold">Sign Out</button>
                                
                    <!-- Sign Out Prompt (Initially hidden) -->
                    <div id="signOutPrompt" class="hidden mt-4">
                        <p class="text-sm font-semibold">Continue?</p>
                        <div class="flex items-center space-x-4 mt-2">
                            <!-- No (X) Button -->
                            <button id="noButton" class="flex items-center text-red-500 hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span>No</span>
                            </button>
                            <!-- Yes (Check) Button -->
                            <form id="signOutForm" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button id="yesButton" type="submit" class="flex items-center text-green-500 hover:text-green-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Yes</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const signOutButton = document.getElementById('signOutButton');
        const signOutPrompt = document.getElementById('signOutPrompt');
        const yesButton = document.getElementById('yesButton');
        const noButton = document.getElementById('noButton');

        // Toggle the "Sign out?" prompt when the "Sign Out" button is clicked
        signOutButton.addEventListener('click', () => {
            signOutPrompt.classList.toggle('hidden');
        });

        // Hide the "Sign out?" prompt when the "No" button (X) is clicked
        noButton.addEventListener('click', () => {
            signOutPrompt.classList.add('hidden');
        });

        // Perform the sign-out action when the "Yes" button (Check) is clicked
        yesButton.addEventListener('click', () => {
            // You can handle the sign-out logic here, such as redirecting to a logout route
            window.location.href = "{{ route('logout') }}";
        });
    });
</script>


<!-- Header Section -->
<header class="bg-bg_blue text-white py-6 px-8 drop-shadow-lg flex items-center relative">
    <div class="absolute left-6 flex items-center space-x-6">
        <!-- Menu Button -->
        <button id="sidebarButton" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
        <!-- Greeting -->
        <div>
            <p class="text-lg font-semibold">Hey {{ Auth::user()->username }}!</p>
            <p class="text-sm">What do you want to do?</p>
        </div>
    </div>
    <!-- Logo (Centered) -->
    <div class="flex-grow flex justify-center">
        <img src="{{ URL('images/Logo.png') }}" alt="Logo" class="h-14 scale-125">
    </div>
    <!-- Notification and Profile Buttons -->
    <div class="absolute right-6 flex items-center space-x-6">
        <!-- Notification Button with Counter -->
        <div class="relative">
            <button name="notif-button" id="notificationButton" class="relative">
                <img src="{{ URL('images/notification.png') }}" alt="Notification" class="w-8 h-8">
                <!-- Notification Counter -->
                @if($notifications->count() > 0)
                    <span id="notificationCount" class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">{{ $notifications->count() }}</span>
                @endif
            </button>

            <!-- Dropdown -->
            <div id="notificationDropdown" class="hidden opacity-0 transform scale-95 absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-lg transition-all duration-300">
                <!-- Empty State -->
                <div id="emptyState" class="p-4 text-gray-500 text-center">
                    No notifications at the moment
                </div>
                <!-- Notification List -->
                <h2 name="notif-dropdown"class="text-xl font-semibold text-gray-800 py-2 px-4 border-gray-200">
                    Notifications
                </h2>
                <ul id="notificationList" class="divide-y divide-gray-200 hidden">
                    @foreach($notifications as $notification)
                        <li class="p-4 hover:bg-gray-50">
                            <p class="text-sm font-semibold text-gray-800">{{ $notification->title }}</p>
                            <p class="text-xs text-gray-600">{{ $notification->description }}</p>
                            <!-- Display start_time -->
                            <p class="text-xs text-gray-400">
                                {{ \Carbon\Carbon::createFromTimestamp($notification->start_time)->format('Y-m-d H:i') }}
                            </p>                                                                                 
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <!-- Profile Button -->
        <a href="{{ route('student.profile') }}">
            <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim('email@example.com'))) }}?d=mp&f=y" alt="Profile" class="w-8 h-8 rounded-full">
        </a>

    </div>
</header>

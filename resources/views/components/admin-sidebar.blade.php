<!-- Sidebar -->
<div id="sidebarContent" class="w-64 bg-white shadow-lg min-h-screen p-6">

    <h2 class="text-xl font-bold text-gray-800 mb-6">Admin Dashboard</h2>
    <nav>
        <ul class="space-y-4 divide-y">
            <li class="py-2">
                <a href="{{ route('admin.home') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">
                    Home
                </a>
            </li>
            <li class="py-2">
                <a href="{{ route('admin.feedback') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">
                    Feedback
                </a>
            </li>
            <li class="py-2">
                <a href="{{ route('admin.accounts') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">
                    Accounts
                </a>
            </li>
            <li class="py-2">
                <a href="{{ route('admin-resources.index') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">
                    Resources
                </a>
            </li>
            <li class="py-2">
                <a href="{{ route('admin.notifications') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">
                    Notifications
                </a>
            </li>
            <li class="py-2">
                <a href="{{ route('admin.mtq') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">
                    MTQ
                </a>
            </li>
            <li class="py-2">
                <a href="{{ route('admin.exercises') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">
                    Exercises
                </a>
            </li>
            <!-- Sign Out Section -->
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

<script>
    // JavaScript to show/hide the confirmation prompt
    document.getElementById('signOutButton').addEventListener('click', function() {
        document.getElementById('signOutPrompt').classList.remove('hidden');
    });

    document.getElementById('noButton').addEventListener('click', function() {
        document.getElementById('signOutPrompt').classList.add('hidden');
    });
</script>
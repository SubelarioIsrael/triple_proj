<!-- Sidebar -->
<div id="sidebarContent" class="w-64 bg-white shadow-lg h-full p-6">
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
                <a href="#" class="block text-gray-700 hover:text-blue-600 font-semibold">
                    Resources
                </a>
            </li>
            <li class="py-2">
                <a href="#" class="block text-gray-700 hover:text-blue-600 font-semibold">
                    Notifications
                </a>
            </li>
            <li class="py-2">
                <a href="#" class="block text-gray-700 hover:text-blue-600 font-semibold">
                    MTQ
                </a>
            </li>
        </ul>
    </nav>
</div>
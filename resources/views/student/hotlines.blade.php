<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
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
                <ul class="space-y-4 mt-10 divide-y divide-solid">
                    <li><a href="{{ route('student.home') }}" class="mt-4 block text-gray-700 hover:text-blue-600 font-semibold">Home</a></li>
                    <li><a href="{{ route('student.profile') }}" class="mt-4 block text-gray-700 hover:text-blue-600 font-semibold">Profile</a></li>
                    <li><a href="{{ route('student.about-us') }}" class="mt-4 block text-gray-700 hover:text-blue-600 font-semibold">About Us</a></li>
                    <li><a href="{{ route('student.feedback') }}" class="mt-4 block text-gray-700 hover:text-blue-600 font-semibold">Give Feedback</a></li>
                    <!-- Sign Out Button -->
                    <li>
                        <a href="#" id="signOutButton" class="mt-4 block text-gray-700 hover:text-blue-600 font-semibold">Sign Out</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
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
                <p class="text-lg font-semibold">Hey Merc!</p>
                <p class="text-sm">What do you want to do?</p>
            </div>
        </div>
        <!-- Logo (Centered) -->
        <div class="flex-grow flex justify-center">
            <img src="{{ URL('images/Full_logo.png') }}" alt="Logo" class="h-14">
        </div>
        <!-- Notification and Profile Buttons -->
        <div class="absolute right-6 flex items-center space-x-6">
            <!-- Notification Button -->
            <button class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.5V11a6 6 0 00-5-5.917V4a1 1 0 10-2 0v1.083A6 6 0 006 11v3.5c0 .28-.11.53-.295.705L4 17h5m6 0a3 3 0 11-6 0h6z" />
                </svg>
            </button>
            <!-- Profile Button -->
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.969 9.969 0 0112 15c2.25 0 4.31.744 5.879 2.004M15 11a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </button>
        </div>
    </header>

    <h1 class="ml-10 mt-6 text-3xl font-semibold text-bg_blue mb-2">Professional Hotlines</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
        @foreach ($hotlines as $hotline)
            <x-hotline-card 
                title="{{ $hotline['title'] }}"
                availability="{{ $hotline['availability'] }}"
                audience="{{ $hotline['audience'] }}"
                description="{{ $hotline['description'] }}"
                status="{{ $hotline['status'] }}"
                phone="{{ $hotline['phone'] }}"
                link="{{ $hotline['link'] }}"
            />
        @endforeach
    </div> 

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>
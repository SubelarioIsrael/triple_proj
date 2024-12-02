<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Chatbot Container -->
    <div class="w-auto h-screen mb-4 mx-auto bg-white shadow-lg rounded-lg flex flex-col">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 bg-bg_blue border-b">
            <!-- Go Back Button -->
            <a href="{{ url()->previous() }}" class="flex items-center text-white hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1.707-11.707a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 001.414 1.414L12 10.414a1 1 0 000-1.414l-1.293-1.293z" clip-rule="evenodd" />
                </svg>
                <span>Go back</span>
            </a>
        </div>

        <!-- Chat Content -->
        <div class="flex-1 p-6 overflow-y-auto">
            <!-- Chatbot Name Centered -->
            <div class="flex flex-col items-center mb-4">
                <img src="{{ asset('images/Nysa.png') }}" alt="Nysa" class="h-16 w-16 rounded-full filter brightness-25">
                <span class="mt-3 font-semibold text-gray-700 text-lg">Nysa</span>
            </div>
            <div class="text-center">
                <p class="text-gray-600 text-lg font-medium">Hello!</p>
                <p class="text-gray-500">How can I help you?</p>
            </div>
        </div>

        <!-- Message Input -->
        <div class="p-4 border-t bg-gray-200">
            <div class="relative">
                <input type="text" placeholder="Enter your message..." class="w-full py-3 px-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button class="absolute right-3 top-2.5 text-white p-2 rounded-full hover:bg-blue-400 transition">
                    <img src="{{ URL('images/send.png')}}" alt="Send" class="w-5 h-5 object-contain">
                </button>
            </div>
        </div>

        <!-- Footer -->
        <div class="flex justify-center py-4 bg-bg_blue border-t">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-10">
        </div>
    </div>

</body>
</html>
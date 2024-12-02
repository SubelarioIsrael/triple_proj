<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-bg_blue text-white font-[sans-serif]">
    <div class="min-h-screen flex flex-col justify-between py-16 px-6">
        <div class="w-full max-w-lg mx-auto">
            <!-- Back Button -->
            <div class="flex items-center space-x-4 mb-16">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <a href="{{ url()->previous() }}" class="text-lg font-semibold hover:underline">BACK</a>
            </div>

            <!-- Welcome Message -->
            <div class="text-center mb-16">
                <p class="text-2xl font-semibold">Welcome back!</p>
            </div>

            <!-- User Avatar -->
            <div class="mb-16">
                <img src="{{ URL('images/Nysa.png') }}" alt="Nysa Logo" class="scale-150 w-28 h-28 mx-auto rounded-full">
            </div>

            <!-- Enter Button -->
            <div class="mt-8 flex flex-col items-center">
                <form action="{{ route('student.home') }}" method="GET">
                    <button 
                        type="submit" 
                        id="enter-button" 
                        class="w-32 h-12 bg-white text-bg_blue font-bold rounded-full flex items-center justify-center hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-blue-400">
                        ENTER
                    </button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>

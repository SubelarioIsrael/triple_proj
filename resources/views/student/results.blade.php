<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mental State Check Results</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    <div class="max-w-xl mx-auto my-10 bg-white p-6 rounded-lg shadow-md">
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brightness-25 mx-auto h-16 mb-4">
            <h2 class="text-xl font-bold text-gray-800">Your Mental State Check Results</h2>
            <p class="text-gray-600 mt-2">Thank you for completing the questionnaire! Here's a summary of your responses and scores.</p>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-bold text-gray-700">Your Breakdown:</h3>
            @if ($results && $results->count())
                <ul class="mt-4 space-y-4">
                    @foreach ($results as $index => $result)
                        <li class="border-b pb-4">
                            <p class="font-semibold text-gray-800">{{ $index + 1 }}. {{ $result->question }}</p>
                            <p class="text-gray-600">Score: <span class="font-medium">{{ $result->score }}</span></p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600">No responses available for this entry.</p>
            @endif
        </div>
        

        <div class="mt-6">
            <h3 class="text-lg font-bold text-gray-700">Your Total Score: {{ $totalScore }}/50</h3>
            <p class="text-gray-600 mt-2">
                Overall Mental State: {{ $summaryMessage }}
            </p>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-bold text-gray-700">Need Someone to Talk To?</h3>
            <p class="text-gray-600 mt-2">
                If you'd like to discuss your results, consider reaching out to a mental health professional. They can help with strategies to feel more balanced and supported.
            </p>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('student.home') }}" class="px-6 py-3 bg-gray-800 text-white font-semibold rounded-md hover:bg-gray-900 transition">
                Go Back
            </a>
        </div>
    </div>

</body>
</html>

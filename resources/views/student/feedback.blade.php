<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Give Feedback</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        /* Style for green active state */
        input[type="radio"]:checked + label {
            background-color: #4ade80; /* Bright green */
            color: white;
        }
        label.icon {
            font-size: 2rem;
            padding: 10px;
            border-radius: 50%;
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }
        .subject-box {
            padding: 8px 16px;
            border: 2px solid #e5e7eb; /* Tailwind gray-200 */
            border-radius: 8px;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
            cursor: pointer;
        }
        input[type="radio"]:checked + .subject-box {
            background-color: #4ade80; /* Bright green */
            color: white;
        }
    </style>
</head>
<body class="bg-white">

    <x-header :notifications="$notifications" />

    <!-- Container with Centered Feedback Form -->
    <div class="container mx-auto px-6 py-8">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Give Feedback</h1>

        <!-- Feedback Form -->
        <form action="{{ route('student.feedback.store') }}" method="POST">
            @csrf
            <!-- Rating Section -->
            <section class="mb-10 mt-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Rate your experience with our app:</h2>
                <div class="flex justify-between max-w-lg mx-auto">
                    <!-- Radio buttons for rating -->
                    <input type="radio" id="very-dissatisfied" name="rating" value="1" class="hidden" required>
                    <label for="very-dissatisfied" class="icon">😠</label>

                    <input type="radio" id="dissatisfied" name="rating" value="2" class="hidden" required>
                    <label for="dissatisfied" class="icon">☹️</label>

                    <input type="radio" id="neutral" name="rating" value="3" class="hidden" required>
                    <label for="neutral" class="icon">😐</label>

                    <input type="radio" id="satisfied" name="rating" value="4" class="hidden" required>
                    <label for="satisfied" class="icon">🙂</label>

                    <input type="radio" id="very-satisfied" name="rating" value="5" class="hidden" required>
                    <label for="very-satisfied" class="icon">😊</label>
                </div>
            </section>        

            <!-- Feedback Subject -->
            <section class="mb-10 mt-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Pick a subject and provide your feedback</h2>
                <div class="grid grid-cols-5 sm:grid-cols-3 gap-4 max-w-md mx-auto">
                    <!-- Radio buttons for subjects -->
                    <input type="radio" id="bug" name="subject" value="Bug" class="hidden" required>
                    <label for="bug" class="subject-box flex flex-col items-center text-center p-4 rounded-lg bg-gray-50 shadow hover:bg-gray-100">
                        <span class="text-2xl">🐞</span>
                        <span class="mt-2">Bug</span>
                    </label>

                    <input type="radio" id="suggestion" name="subject" value="Suggestion" class="hidden" required>
                    <label for="suggestion" class="subject-box flex flex-col items-center text-center p-4 rounded-lg bg-gray-50 shadow hover:bg-gray-100">
                        <span class="text-2xl">💡</span>
                        <span class="mt-2">Suggestion</span>
                    </label>

                    <input type="radio" id="content" name="subject" value="Content" class="hidden" required>
                    <label for="content" class="subject-box flex flex-col items-center text-center p-4 rounded-lg bg-gray-50 shadow hover:bg-gray-100">
                        <span class="text-2xl">📄</span>
                        <span class="mt-2">Content</span>
                    </label>

                    <input type="radio" id="compliment" name="subject" value="Compliment" class="hidden" required>
                    <label for="compliment" class="subject-box flex flex-col items-center text-center p-4 rounded-lg bg-gray-50 shadow hover:bg-gray-100">
                        <span class="text-2xl">🎉</span>
                        <span class="mt-2">Compliment</span>
                    </label>

                    <input type="radio" id="other" name="subject" value="Other" class="hidden" required>
                    <label for="other" class="subject-box flex flex-col items-center text-center p-4 rounded-lg bg-gray-50 shadow hover:bg-gray-100">
                        <span class="text-2xl">🔍</span>
                        <span class="mt-2">Other</span>
                    </label>
                </div>
            </section>

            <!-- Feedback Input -->
            <section class="mb-6 mt-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Your feedback:</h2>
                <textarea name="feedback" required placeholder="Write your feedback here..." 
                    class="w-full h-40 p-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    style="resize: none;"></textarea>
            </section>

            <!-- Submit Button -->
            <section class="text-center align">
                <button type="submit" class="bg-bg_blue text-white py-3 px-6 rounded-lg hover:bg-blue-700">Submit Feedback</button>
            </section>
        </form>
    </div>

    <!-- JavaScript -->
    <script src="{{ Vite::asset('resources/js/sidebar.js') }}"></script>
</body>
</html>

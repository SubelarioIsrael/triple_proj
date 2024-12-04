<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        .radio-input:checked + span {
            background-color: var(--border-color);
        }

        .radio-input:hover + span {
            background-color: var(--border-color);
        }

        .radio-input + span {
            --border-color: transparent;
            border-color: var(--border-color);
            background-color: transparent;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .radio-input[value="5"] + span {
            --border-color: #22c55e;
        }

        .radio-input[value="4"] + span {
            --border-color: #86efac;
        }

        .radio-input[value="3"] + span {
            --border-color: #9ca3af;
        }

        .radio-input[value="2"] + span {
            --border-color: #fca5a5;
        }

        .radio-input[value="1"] + span {
            --border-color: #ef4444;
        }
    </style>
</head>
<body>
    <x-header></x-header>
    <div class="max-w-2xl mx-auto my-8 mt-10 text-center">
        <h2 class="text-2xl font-bold">Mood Tracking Questionnaire</h2>
    
        <form action="{{ route('student.store-mood') }}" method="POST" class="space-y-8">
            @csrf
        
            
        
            @foreach ($questions as $index => $question)
                <div class="space-y-4">
                    <p class="text-lg font-medium text-gray-800">{{ $question }}</p>
                    <div class="flex justify-center space-x-6">
                        @for ($value = 1; $value <= 5; $value++)
                            <label class="flex flex-col items-center">
                                <input type="radio" name="question{{ $index }}" value="{{ $value }}" class="hidden radio-input" required>
                                <span class="block w-10 h-10 border-2 rounded-full transition duration-300"></span>
                                <span class="text-sm">{{ $value === 1 ? 'Agree' : ($value === 5 ? 'Disagree' : 'Neutral') }}</span>
                            </label>
                        @endfor
                    </div>
                </div>
            @endforeach
            
            <!-- Display error message if validation fails -->
            @if ($errors->has('error'))
                <div class="text-red-500 font-semibold">
                    <p>{{ $errors->first('error') }}</p>
                </div>
            @endif
        
            <div class="text-center">
                <button type="submit" 
                        class="px-6 py-3 bg-bg_blue text-white font-semibold rounded-md hover:bg-blue-800 transition">
                    Continue
                </button>
            </div>
        </form>
    </div>

    <script src="{{ Vite::asset('resources/js/mtq.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/sidebar.js') }}"></script>
</body>
</html>
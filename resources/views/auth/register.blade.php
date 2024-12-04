<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="bg-bg_blue font-[sans-serif]">
        <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
            <div class="bg-white border rounded-md max-w-md w-full">
                <img src="{{ URL('images/Full_Logo.png')}}" alt="logo" class='brightness-25 w-40 mt-8 mb-8 scale-150 mx-auto block' />

                <div class="p-8 rounded-2xl bg-white shadow">
                    <h2 class="text-gray-800 text-center text-2xl font-bold">Register</h2>
                    <form action="{{ route('authentication.register.validate') }}" method="POST" class="mt-8 space-y-4">
                        @csrf <!-- Include CSRF token for security -->
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">User name</label>
                            <input name="username" type="text" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter your username" />
                        </div>
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Contact Number</label>
                            <input name="contact_number" type="text" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter your contact number" />
                        </div>
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Email</label>
                            <input name="email" type="email" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter your email" />
                        </div>
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Password</label>
                            <input name="password" type="password" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter your password" />
                        </div>
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Confirm Password</label>
                            <input name="password_confirmation" type="password" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Confirm your password" />
                        </div>
                        <div class="flex items-center mt-4">
                            <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 shrink-0 text-bg_ focus:ring-blue-500 border-gray-300 rounded" />
                            <label for="terms" class="ml-3 text-sm text-gray-800">
                                I agree to the <a href="#" class="text-bg_blue hover:underline font-semibold">Terms and Conditions</a>
                            </label>
                        </div>
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="!mt-8">
                            <button type="submit" class="border text-white w-full py-3 px-4 text-sm tracking-wide rounded-lg bg-bg_blue hover:bg-gray-100 hover:text-bg_blue transition ease-in duration-200 focus:outline-none text-center">
                                Sign Up
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="bg-bg_blue font-[sans-serif]">
        <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
            <div class="bg-white border rounded-md max-w-md w-full">
                <img src="{{ URL('images/Full_Logo.png') }}" alt="logo" class='brightness-25 w-40 mt-8 mb-8 scale-150 mx-auto block' />
                <div class="p-8 rounded-2xl bg-white shadow">
                    <form class="mt-6 space-y-4" method="POST" action="{{ route('authentication.sign-in.authenticate') }}">
                        @csrf
                        <!-- Username Field -->
                        <div>
                            <label class="text-bg_blue text-sm mb-2 block">User name</label>
                            <div class="relative flex items-center">
                                <input id="username" name="username" type="text"  class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter user name" />
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label class="text-bg_blue text-sm mb-2 block">Password</label>
                            <div class="relative flex items-center">
                                <input id="password" name="password" type="password"  class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter password" />
                            </div>
                        </div>

                        {{-- <!-- Remember Me -->
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div class="text-sm">
                                <a href="javascript:void(0);" class="text-blue-600 hover:underline font-semibold">
                                    Forgot your password?
                                </a>
                            </div>
                        </div> --}}

                        <!-- Error Message -->
                        @if ($errors->any())
                            <div class="error-message text-red-500 text-sm mt-4 text-center">
                                @if ($errors->has('username'))
                                    <p>{{ $errors->first('username') }}</p>
                                @endif
                                @if ($errors->has('password'))
                                    <p>{{ $errors->first('password') }}</p>
                                @endif
                                @if ($errors->has('role'))
                                    <p>{{ $errors->first('role') }}</p>
                                @endif
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <div class="!mt-8">
                            <button id="sign-in-btn" type="submit" class="border text-white w-full py-3 px-4 text-sm tracking-wide rounded-lg bg-bg_blue hover:bg-gray-100 hover:text-bg_blue transition ease-in duration-200 focus:outline-none text-center block">
                                Sign in
                            </button>
                        </div>

                        <!-- Register Link -->
                        <p class="text-gray-800 text-sm !mt-8 text-center">Don't have an account? <a href="{{ route('authentication.register') }}" class="text-blue-600 hover:underline ml-1 whitespace-nowrap font-semibold">Create one!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

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
    <x-header :notifications="$notifications"/>

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

    <script src="{{ Vite::asset('resources/js/sidebar.js') }}"></script>
</body>
</html>
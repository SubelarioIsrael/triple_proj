@props(['title', 'availability', 'audience', 'description', 'status', 'phone', 'link'])

<div class="rounded-lg shadow-lg border border-gray-200 p-6 bg-white w-full">
    <h2 class="text-2xl font-bold mb-2 text-gray-900">{{ $title }}</h2>
    
    <span class="inline-block bg-gray-100 text-gray-700 text-xs font-semibold px-2 py-1 rounded-full mb-4">
        {{ $audience }}
    </span>
    
    <p class="text-gray-600 text-sm mb-4">
        {{ $description }}
    </p>

    <div class="flex items-center mb-2">
        <span class="text-green-600 font-semibold">{{ $status }}</span>
        <span class="ml-2 bg-blue-100 text-blue-600 text-xs font-semibold px-2 py-1 rounded-full">{{ $availability }}</span>
    </div>

    <div class="flex items-center text-gray-700 mb-2">
        📞 <span class="text-green-600 font-semibold ml-2">{{ $phone }}</span>
    </div>

    <div class="flex items-center text-gray-700 mb-4">
        🌐 
        <a href="{{ $link }}" target="_blank" class="text-green-600 font-semibold underline ml-2">
            {{ parse_url($link, PHP_URL_HOST) }}
        </a>
    </div>

    <div class="flex justify-center">
        <a href="tel:{{ $phone }}" class="bg-bg_blue text-white rounded-full px-6 py-2 hover:bg-green-600 focus:outline-none">
            📞 CALL
        </a>
    </div>
</div>

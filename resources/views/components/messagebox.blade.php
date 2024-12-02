@props(['message'])

<!-- Overlay (Hidden by default) -->
<div id="messageBoxModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <!-- Modal Container -->
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
        <!-- Modal Content -->
        <p class="text-xl font-semibold text-center text-gray-800 mb-6">{{ $message }}</p>
        
        <!-- Buttons -->
        <div class="flex justify-between items-center">
            <button id="yesButton" class="px-6 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300">
                Yes
            </button>
            <button id="noButton" class="px-6 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-300">
                No
            </button>
        </div>
    </div>
</div>
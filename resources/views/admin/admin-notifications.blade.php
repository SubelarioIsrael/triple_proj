<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-admin-sidebar></x-admin-sidebar>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Notifications</h1>

            <!-- Active Notifications Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Active Notifications</h2>
                
                <!-- List of Notifications -->
                @foreach($notifications as $notification)
                    <div class="border bg-white rounded-lg shadow p-4 mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-semibold text-gray-700">{{ $notification->title }}</span>
                            <!-- Delete Button -->
                            <button 
                                class="text-red-500 hover:text-red-700"
                                onclick="showDeleteConfirmation({{ $notification->id }})">
                                Delete
                            </button>
                        </div>
                        <p class="text-gray-600">{{ $notification->description }}</p>
                        <div class="text-sm text-gray-500 mt-2">
                            <span>Added by: {{ $notification->user->username ?? 'Unknown' }}</span> |
                            <span>{{ $notification->created_at->format('m/d/Y') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Delete All Notifications Button -->
            <div class="mb-6">
                <form action="{{ route('admin.notifications.destroyAll') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all notifications? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                        Delete All Notifications
                    </button>
                </form>
            </div>
            <!-- Add Notification Section -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Add Notification</h2>
                <form action="{{ route('admin.notifications.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-semibold text-gray-700">Title</label>
                        <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-semibold text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                    <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteConfirmationModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
            <p class="text-gray-600 mb-4">Are you sure you want to delete this notification?</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelButton" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                <form id="deleteForm" method="POST" action="" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Show delete confirmation modal
        function showDeleteConfirmation(notificationId) {
            const modal = document.getElementById('deleteConfirmationModal');
            const deleteForm = document.getElementById('deleteForm');
            
            // Set the action of the delete form to the correct URL
            deleteForm.action = '/admin/notifications/' + notificationId;
            
            // Show the modal
            modal.classList.remove('hidden');
        }

        // Close the modal when clicking cancel
        document.getElementById('cancelButton').addEventListener('click', function() {
            const modal = document.getElementById('deleteConfirmationModal');
            modal.classList.add('hidden');
        });
    </script>
</body>
</html>

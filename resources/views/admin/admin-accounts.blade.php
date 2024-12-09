<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        // JavaScript function for confirmation
        function confirmDelete(event) {
            if (!confirm('Are you sure you want to remove this user?')) {
                event.preventDefault(); // Cancel form submission if not confirmed
            }
        }

        function confirmDeleteAll(event) {
            if (!confirm('Are you sure you want to delete all student accounts? This action cannot be undone.')) {
                event.preventDefault(); // Cancel form submission if not confirmed
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <x-admin-sidebar></x-admin-sidebar>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Accounts</h1>

            <!-- Students Section -->
            <div class="mb-8">
                <h2 class="text-lg font-bold text-gray-700 mb-4">Students</h2>
                <div class="space-y-4">
                    @forelse($students as $student)
                        <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow">
                            <!-- Student Details -->
                            <div>
                                <p class="font-semibold text-gray-800">{{ $student->username }}</p>
                                <p class="text-sm text-gray-500">📞 {{ $student->contact_number }}</p>
                                <p class="text-sm text-gray-500">📧 {{ $student->email }}</p>
                            </div>
                            <!-- Remove Button -->
                            <form action="{{ route('admin.users.destroy', $student->id) }}" method="POST" onsubmit="confirmDelete(event);">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-600">
                                    Remove
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-gray-500">No students found.</p>
                    @endforelse
                </div>   
            </div>
            <!-- Delete All Students Button -->
            <div class="mb-6">
                <form action="{{ route('admin.users.destroyAllStudents') }}" method="POST" onsubmit="confirmDeleteAll(event);">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-600">
                        Delete All Students
                    </button>
                </form>
            </div>

            <!-- Admins Section -->
            <div>
                <h2 class="text-lg font-bold text-gray-700 mb-4">Admins</h2>
                <div class="space-y-4">
                    @forelse($admins as $admin)
                        <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow">
                            <!-- Admin Details -->
                            <div>
                                <p class="font-semibold text-gray-800">{{ $admin->username }}</p>
                                <p class="text-sm text-gray-500">📞 {{ $admin->contact_number }}</p>
                                <p class="text-sm text-gray-500">📧 {{ $admin->email }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No admins found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</body>
</html>

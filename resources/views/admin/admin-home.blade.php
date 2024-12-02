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
        <div id="sidebarContent" class="w-64 bg-white shadow-lg h-full p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Admin Dashboard</h2>
            <nav>
                <ul class="space-y-4 divide-y">
                    <li class="py-2">
                        <a href="#" class="block text-gray-700 hover:text-blue-600 font-semibold">
                            Feedback
                        </a>
                    </li>
                    <li class="py-2">
                        <a href="#" class="block text-gray-700 hover:text-blue-600 font-semibold">
                            Accounts
                        </a>
                    </li>
                    <li class="py-2">
                        <a href="#" class="block text-gray-700 hover:text-blue-600 font-semibold">
                            Resources
                        </a>
                    </li>
                    <li class="py-2">
                        <a href="#" class="block text-gray-700 hover:text-blue-600 font-semibold">
                            Notifications
                        </a>
                    </li>
                    <li class="py-2">
                        <a href="#" class="block text-gray-700 hover:text-blue-600 font-semibold">
                            MTQ
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Welcome, Admin!</h1>
            
            <!-- Data Analytics Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Analytics Card: Total Users -->
                <div class="bg-white p-6 shadow rounded-lg">
                    <h2 class="text-lg font-bold text-gray-700">Total Users</h2>
                    <p class="text-3xl font-semibold text-blue-600 mt-2">{{ $userCount }}</p>
                </div>

                <!-- Analytics Card: Total Feedback -->
                <div class="bg-white p-6 shadow rounded-lg">
                    <h2 class="text-lg font-bold text-gray-700">Total Feedback</h2>
                    <p class="text-3xl font-semibold text-blue-600 mt-2">{{ $feedbackCount }}</p>
                </div>

                <!-- Analytics Card 3 -->
                <div class="bg-white p-6 shadow rounded-lg">
                    <h2 class="text-lg font-bold text-gray-700">Pending Requests</h2>
                    <p class="text-3xl font-semibold text-red-500 mt-2">9</p>
                </div>
            </div>
            <div class="mt-8 bg-white p-6 shadow rounded-lg">
                <h2 class="text-lg font-bold text-gray-700 mb-4">User Growth (2023–2025)</h2>
                <canvas id="userChart" class="w-full h-64"></canvas>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($years), // ['2023', '2024', '2025']
                datasets: [{
                    label: 'Number of Users',
                    data: @json($userData), // [user counts for each year]
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    tension: 0.3, // Smooth lines
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Users'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>

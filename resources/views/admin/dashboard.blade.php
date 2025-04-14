<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIT HUB Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 md:ml-64">
            <header class="bg-white shadow-sm">
                <div class="p-4">
                    <h2 class="text-xl font-bold">Dashboard</h2>
                </div>
            </header>

            <main class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 shadow rounded-lg">
        <h3 class="text-lg font-bold text-gray-700">Total Members</h3>
        <p class="text-3xl font-bold text-blue-500">1</p>
    </div>

    <div class="bg-white p-6 shadow rounded-lg">
        <h3 class="text-lg font-bold text-gray-700">Active Classes</h3>
        <p class="text-3xl font-bold text-green-500">8</p>
    </div>

    <div class="bg-white p-6 shadow rounded-lg">
        <h3 class="text-lg font-bold text-gray-700">Pending Payments</h3>
        <p class="text-3xl font-bold text-red-500">5</p>
    </div>
</div>

            </main>
        </div>
    </div>
</body>
</html>

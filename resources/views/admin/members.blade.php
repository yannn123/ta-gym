<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members List - FIT HUB Admin</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 md:ml-64">
            <header class="bg-white shadow-sm">
                <div class="p-4">
                    <h2 class="text-xl font-bold">Members List</h2>
                </div>
            </header>

            <main class="p-6">
                <div class="bg-white p-6 shadow-md rounded-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">List of Registered Members</h2>
                    
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="py-3 px-4 border text-left">Member ID</th>
                                    <th class="py-3 px-4 border text-left">Name</th>
                                    <th class="py-3 px-4 border text-left">Email</th>
                                    <th class="py-3 px-4 border text-left">Status</th>
                                    <th class="py-3 px-4 border text-left">Joined Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-gray-100">
                                    <td class="py-3 px-4 border">#M001</td>
                                    <td class="py-3 px-4 border">John Doe</td>
                                    <td class="py-3 px-4 border">johndoe@example.com</td>
                                    <td class="py-3 px-4 border text-green-600 font-semibold">Active</td>
                                    <td class="py-3 px-4 border">2025-02-15</td>
                                </tr>
                                <tr class="hover:bg-gray-100">
                                    <td class="py-3 px-4 border">#M002</td>
                                    <td class="py-3 px-4 border">Jane Smith</td>
                                    <td class="py-3 px-4 border">janesmith@example.com</td>
                                    <td class="py-3 px-4 border text-red-600 font-semibold">Inactive</td>
                                    <td class="py-3 px-4 border">2025-01-20</td>
                                </tr>
                                <tr class="hover:bg-gray-100">
                                    <td class="py-3 px-4 border">#M003</td>
                                    <td class="py-3 px-4 border">Alice Johnson</td>
                                    <td class="py-3 px-4 border">alice@example.com</td>
                                    <td class="py-3 px-4 border text-green-600 font-semibold">Active</td>
                                    <td class="py-3 px-4 border">2025-02-10</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Transactions - FIT HUB Admin</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 md:ml-64">
            <header class="bg-white shadow-sm">
                <div class="p-4">
                    <h2 class="text-xl font-bold">Payment Transactions</h2>
                </div>
            </header>

            <main class="p-6">
                <!-- Cards Summary -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-5 shadow-md rounded-lg border">
                        <h2 class="text-gray-600">Total Payments</h2>
                        <p class="text-2xl font-bold text-blue-600"></p>
                    </div>
                    <div class="bg-white p-5 shadow-md rounded-lg border">
                        <h2 class="text-gray-600">Successful Transactions</h2>
                        <p class="text-2xl font-bold text-green-600"></p>
                    </div>
                    <div class="bg-white p-5 shadow-md rounded-lg border">
                        <h2 class="text-gray-600">Pending Transactions</h2>
                        <p class="text-2xl font-bold text-red-600"></p>
                    </div>
                </div>

                <!-- Transactions Table -->
                <div class="bg-white p-6 shadow-md rounded-lg border">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Transactions</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                <tr class="bg-gray-200">
                    <th class="py-3 px-4 border text-left">Transaction ID</th>
                    <th class="py-3 px-4 border text-left">User</th>
                    <th class="py-3 px-4 border text-left">Amount</th>
                    <th class="py-3 px-4 border text-left">Payment Method</th>
                    <th class="py-3 px-4 border text-left">Status</th>
                    <th class="py-3 px-4 border text-left">Date</th>
                    <th class="py-3 px-4 border text-center">Actions</th>
                    <tr class="hover:bg-gray-100">
                    <td class="py-3 px-4 border">#TXN003</td>
                    <td class="py-3 px-4 border">Alice Johnson</td>
                    <td class="py-3 px-4 border">$30</td>
                    <td class="py-3 px-4 border">Bank Transfer</td>
                    <td class="py-3 px-4 border text-green-600 font-semibold">Completed</td>
                    <td class="py-3 px-4 border">2025-02-18</td>
                    <td class="py-3 px-4 border text-center">
                        <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                            Terima
                        </button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                            Hapus
                        </button>
                </tr>
            </thead>
                
                    </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>

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
        <div class="flex-1 md:ml-72">
            @include('admin.partials.navbar', ['title' => 'Payments'])

            <main class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-5 shadow-md rounded-lg border">
                        <h2 class="text-gray-600">Total Payments</h2>
                        <p class="text-2xl font-bold text-blue-600">{{ $totalTransaksi }}</p>
                    </div>
                    <div class="bg-white p-5 shadow-md rounded-lg border">
                        <h2 class="text-gray-600">Successful Transactions</h2>
                        <p class="text-2xl font-bold text-green-600">{{ $successTransaksi }}</p>
                    </div>
                    <div class="bg-white p-5 shadow-md rounded-lg border">
                        <h2 class="text-gray-600">Pending Transactions</h2>
                        <p class="text-2xl font-bold text-red-600">{{ $pendingTransaksi }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 shadow-md rounded-lg border">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Transactions</h2>
                    
                    <!-- Filter Tabs -->
                    <div class="mb-4 border-b border-gray-200">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="filterTabs">
                            <li class="mr-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 border-blue-600 rounded-t-lg active" id="all-tab" data-status="all">All Transactions</button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:border-gray-300" id="completed-tab" data-status="completed">Completed</button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:border-gray-300" id="pending-tab" data-status="pending">Pending</button>
                            </li>
                            <li role="presentation">
                                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:border-gray-300" id="failed-tab" data-status="failed">Failed</button>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="py-3 px-4 border text-left">No</th>
                                    <th class="py-3 px-4 border text-left">User</th>
                                    <th class="py-3 px-4 border text-left">Layanan</th>
                                    <th class="py-3 px-4 border text-left">Amount</th>
                                    <th class="py-3 px-4 border text-left">Payment Method</th>
                                    <th class="py-3 px-4 border text-left">Status</th>
                                    <th class="py-3 px-4 border text-left">Date</th>
                                    <th class="py-3 px-4 border text-left">Expired Date</th>
                                    <th class="py-3 px-4 border text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="transactionTable">
                                @foreach($transaksis as $index => $transaksi)
                                <tr class="hover:bg-gray-100 transaction-row" data-status="{{ $transaksi->status }}">
                                    <td class="py-3 px-4 border">{{ $index + 1 }}</td>
                                    <td class="py-3 px-4 border">{{ $transaksi->user->name }}</td>
                                    <td class="py-3 px-4 border">{{ $transaksi->layanan->nama_layanan }}</td>
                                    <td class="py-3 px-4 border">Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
                                    <td class="py-3 px-4 border">{{ $transaksi->metode_pembayaran }}</td>
                                    <td class="py-3 px-4 border">
                                        @if($transaksi->status == 'completed')
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full">Completed</span>
                                        @elseif($transaksi->status == 'pending')
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
                                        @else
                                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full">Failed</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 border">{{ date('d M Y', strtotime($transaksi->tanggal_transaksi)) }}</td>
                                    <td class="py-3 px-4 border">{{ date('d M Y', strtotime($transaksi->expired_date)) }}</td>
                                    <td class="py-3 px-4 border text-center">
                                        @if($transaksi->status == 'pending')
                                            <form action="{{ route('admin.payment.update', $transaksi->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="completed">
                                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                                    Terima
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.payment.update', $transaksi->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="failed">
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                    Tolak
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-400">No actions available</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get filter tabs
            const tabs = document.querySelectorAll('#filterTabs button');
            
            // Add click event listeners
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    tabs.forEach(t => {
                        t.classList.remove('active', 'border-blue-600');
                        t.classList.add('border-transparent');
                    });
                    
                    // Add active class to clicked tab
                    this.classList.add('active', 'border-blue-600');
                    this.classList.remove('border-transparent');
                    
                    // Get status filter
                    const status = this.getAttribute('data-status');
                    
                    // Filter table rows
                    filterTransactions(status);
                });
            });
            
            function filterTransactions(status) {
                const rows = document.querySelectorAll('.transaction-row');
                
                rows.forEach(row => {
                    const rowStatus = row.getAttribute('data-status');
                    
                    if (status === 'all' || rowStatus === status) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>
</html>
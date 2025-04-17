<!-- resources/views/riwayat.blade.php -->

@extends('layouts.app')

@section('content')
    <section class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold mb-2">Riwayat Pembayaran</h1>
            <p class="text-gray-400 mb-8">Lihat semua transaksi pembayaran Anda</p>

            @if (Auth::check())
                @if (count($transaksis) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @php
                            // Check if user has any active or pending subscription
                            $hasActiveOrPending = $transaksis->contains(function ($transaksi) {
                                return $transaksi->status == 'completed' || $transaksi->status == 'pending';
                            });
                            
                            // Get the latest failed transaction
                            $latestFailedTransaction = null;
                            if (!$hasActiveOrPending) {
                                $failedTransactions = $transaksis->where('status', 'failed')->sortByDesc('created_at');
                                if ($failedTransactions->count() > 0) {
                                    $latestFailedTransaction = $failedTransactions->first();
                                }
                            }
                        @endphp
                        
                        @foreach ($transaksis as $transaksi)
                            <div
                                class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:transform hover:scale-105">
                                <div class="p-5">
                                    <div class="flex justify-between items-center mb-4">
                                        <span
                                            class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y H:i') }}</span>
                                        @php
                                            $statusClass = '';
                                            $statusBg = '';

                                            switch ($transaksi->status) {
                                                case 'completed':
                                                    $statusClass = 'text-green-300';
                                                    $statusBg = 'bg-green-900';
                                                    break;
                                                case 'pending':
                                                    $statusClass = 'text-yellow-300';
                                                    $statusBg = 'bg-yellow-900';
                                                    break;
                                                case 'failed':
                                                    $statusClass = 'text-red-300';
                                                    $statusBg = 'bg-red-900';
                                                    break;
                                                default:
                                                    $statusClass = 'text-blue-300';
                                                    $statusBg = 'bg-blue-900';
                                                    break;
                                            }
                                        @endphp
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusClass }} {{ $statusBg }}">
                                            {{ ucfirst($transaksi->status) }}
                                        </span>
                                    </div>

                                    <h2 class="text-xl font-bold mb-3">{{ $transaksi->layanan->nama_layanan }}</h2>

                                    <div class="space-y-2 mb-4">
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-400">Nominal</span>
                                            <span class="font-bold">Rp
                                                {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-400">Durasi</span>
                                            <span>{{ $transaksi->layanan->durasi_layanan }} Bulan</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-400">Metode Pembayaran</span>
                                            <span>{{ ucfirst($transaksi->metode_pembayaran) }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-400">Berakhir pada</span>
                                            <span>{{ \Carbon\Carbon::parse($transaksi->expired_date)->format('d M Y') }}</span>
                                        </div>
                                    </div>

                                    @if (!$hasActiveOrPending && $latestFailedTransaction && $transaksi->id == $latestFailedTransaction->id)
                                    <div class="mb-4 p-3 rounded-md bg-red-900 bg-opacity-50 border border-red-700">
                                        <div class="flex items-start space-x-2">
                                            <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <div>
                                                <p class="text-red-300 text-sm">Pembayaran gagal diproses. Silahkan coba berlangganan kembali.</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 text-center">
                                            <a href="{{ route('daftar-member') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-2 px-4 rounded transition duration-300">
                                                Berlangganan Lagi
                                            </a>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($transaksi->status == 'pending')
                                        <div class="mb-4 p-3 rounded-md bg-yellow-700 bg-opacity-50 border border-yellow-700">
                                            <div class="flex items-start space-x-2">
                                                <svg class="w-5 h-5 text-yellow-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <div>
                                                    <p class="text-red-300 text-sm">Menunggu konfirmasi pembayaran.</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($transaksi->status == 'completed')
                                        <div class="mb-4 p-3 rounded-md bg-green-700 bg-opacity-50 border border-green-700">
                                            <div class="flex items-start space-x-2">
                                                <svg class="w-5 h-5 text-green-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <div>
                                                    <p class="text-green-300 text-sm">Pembayaran Berhasil.</p>
                                                </div>
                                            </div>
                                            <div class="mt-3 text-center">
                                                <a href="{{ route('dashboard') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded transition duration-300">
                                                    Lihat Kartu Member
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="pt-3 border-t border-gray-700">
                                        <div class="flex items-center space-x-2">
                                            <div
                                                class="h-8 w-8 rounded-full bg-indigo-600 flex items-center justify-center">
                                                <span
                                                    class="text-white font-bold">{{ substr($transaksi->user->name, 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <p class="font-medium">{{ $transaksi->user->name }}</p>
                                                <p class="text-xs text-gray-400">{{ $transaksi->user->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-gray-800 rounded-lg shadow-xl p-8 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-700 mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Belum Ada Transaksi</h3>
                        <p class="text-gray-400 mb-6">Anda belum memiliki riwayat pembayaran saat ini.</p>
                        <a href="{{ route('daftar-member') }}"
                            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg transition duration-300">
                            Lihat Paket Berlangganan
                        </a>
                    </div>
                @endif
            @else
                <div class="bg-gray-800 rounded-lg shadow-xl p-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-700 mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Silahkan Masuk Terlebih Dahulu</h3>
                    <p class="text-gray-400 mb-6">Untuk melihat riwayat pembayaran, Silahkan berlangganan terlebih dahulu.</p>
                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('daftar-member') }}"
                            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg transition duration-300">
                            Pilih paket
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
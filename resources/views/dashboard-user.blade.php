@extends('layouts.app')

@section('content')
<div class="bg-gray-900 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-10 text-white text-center">Keanggotaan Saya</h1>
        
        @if($transaksis && $transaksis->count() > 0)
            <div class="max-w-4xl mx-auto mb-8">
                <!-- Bagian Informasi Pengguna -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-8 mb-10 border-l-4 border-indigo-600">
                    <div class="flex items-center mb-4">
                        <div class="bg-indigo-700 rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="ml-5">
                            <h2 class="text-2xl font-bold text-white">{{ Auth::user()->name }}</h2>
                            <p class="text-indigo-300">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex items-center bg-gray-700 p-4 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-gray-200">{{ Auth::user()->no_hp ?: 'Belum ada nomor telepon' }}</span>
                        </div>
                        <div class="flex items-start bg-gray-700 p-4 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-indigo-400 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-200">{{ Auth::user()->alamat ?: 'Belum ada alamat' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Kartu Keanggotaan -->
                @foreach($transaksis as $transaksi)
                <div class="mb-12 transform hover:scale-105 transition-transform duration-300">
                    <div class="flex bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl overflow-hidden shadow-2xl relative h-auto">
                        <!-- Bagian Kiri - Logo & Brand -->
                        <div class="bg-gradient-to-b from-gray-900 to-indigo-900 w-1/4 flex flex-col justify-between items-center p-8 border-r border-gray-700">
                            <!-- Logo Gym -->
                            <div class="mb-6">
                                <div class="w-24 h-24 bg-indigo-800 bg-opacity-50 rounded-full flex items-center justify-center border-2 border-indigo-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Nama Brand -->
                            <div class="text-center mb-8">
                                <h3 class="font-bold text-2xl text-white uppercase tracking-wider">FITNESS</h3>
                                <p class="text-sm text-indigo-200 uppercase tracking-widest">PREMIUM</p>
                                <p class="text-sm text-indigo-200 uppercase tracking-widest">CLUB</p>
                            </div>
                            
                            <!-- Status Badge -->
                            <div>
                                <span class="px-6 py-2 text-sm font-bold uppercase rounded-full {{ $transaksi->status_card == 'Aktif' ? 'bg-gradient-to-r from-green-400 to-green-600 text-white' : 'bg-gradient-to-r from-red-400 to-red-600 text-white' }}">
                                    {{ $transaksi->status_card == 'Aktif' ? 'AKTIF' : 'TIDAK AKTIF' }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Bagian Tengah - Info Anggota -->
                        <div class="w-2/4 p-8 flex flex-col justify-between bg-gray-800">
                            <!-- ID Anggota dan Keanggotaan -->
                            <div class="grid grid-cols-2 gap-8 mb-6">
                                <div>
                                    <p class="text-sm uppercase tracking-wider text-indigo-300 mb-1">ID ANGGOTA</p>
                                    <p class="text-xl font-bold text-white">#{{ str_pad($transaksi->id, 6, '0', STR_PAD_LEFT) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm uppercase tracking-wider text-indigo-300 mb-1">JENIS PAKET</p>
                                    <p class="text-xl font-bold text-white">{{ $transaksi->layanan->nama_layanan }}</p>
                                </div>
                            </div>
                            
                            <!-- Nama dan Telepon -->
                            <div class="grid grid-cols-2 gap-8 mb-6">
                                <div>
                                    <p class="text-sm uppercase tracking-wider text-indigo-300 mb-1">NAMA</p>
                                    <p class="text-lg font-medium text-white">{{ Auth::user()->name }}</p>
                                </div>
                                <div>
                                    <p class="text-sm uppercase tracking-wider text-indigo-300 mb-1">TELEPON</p>
                                    <p class="text-lg font-medium text-white">{{ Auth::user()->no_hp ?: '-' }}</p>
                                </div>
                            </div>
                            
                            <!-- Tanggal Pembelian dan Kadaluarsa -->
                            <div class="grid grid-cols-2 gap-8 mb-6">
                                <div>
                                    <p class="text-sm uppercase tracking-wider text-indigo-300 mb-1">TANGGAL BELI</p>
                                    <p class="text-lg font-medium text-white">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm uppercase tracking-wider text-indigo-300 mb-1">BERLAKU HINGGA</p>
                                    <p class="text-lg font-medium {{ $transaksi->status_card == 'Aktif' ? 'text-white' : 'text-red-400' }}">
                                        {{ \Carbon\Carbon::parse($transaksi->expired_date)->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Bagian Kanan - Detail Layanan -->
                        <div class="w-1/4 bg-gradient-to-br from-indigo-900 to-gray-800 p-8 flex flex-col justify-between">
                            <!-- Indikator Status -->
                            <div class="absolute top-0 right-0 w-3 h-full {{ $transaksi->status_card == 'Aktif' ? 'bg-gradient-to-b from-green-400 to-green-600' : 'bg-gradient-to-b from-red-400 to-red-600' }}"></div>
                            
                            <div>
                                <p class="text-sm uppercase tracking-wider text-indigo-300 mb-4">DETAIL LAYANAN</p>
                                <p class="text-white mb-8">{{ $transaksi->layanan->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                                
                                <p class="text-sm uppercase tracking-wider text-indigo-300 mb-2">DURASI</p>
                                <p class="text-white mb-8">{{ $transaksi->layanan->durasi_layanan }} Bulan</p>
                            </div>
                            
                            <div>
                                <p class="text-sm uppercase tracking-wider text-indigo-300 mb-2">PEMBAYARAN</p>
                                <p class="text-white">{{ $transaksi->metode_pembayaran ?: 'Tidak ditentukan' }}</p>
                                <p class="text-xl font-bold text-white">Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="max-w-md mx-auto bg-gray-800 rounded-xl shadow-lg p-8 text-center border-t-4 border-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-indigo-400 mx-auto mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-2xl font-semibold text-white mb-3">Belum Ada Keanggotaan Aktif</h3>
                <p class="text-gray-300 mb-8">Anda belum memiliki paket keanggotaan yang aktif saat ini.</p>
                <a href="daftar-member" class="inline-block bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white font-medium px-8 py-3 rounded-lg transition duration-200 shadow-lg">
                    Jelajahi Paket Keanggotaan
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
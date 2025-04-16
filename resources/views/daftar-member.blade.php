<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM BRIAN - Membership</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900">
    @include('layouts.navbar')
    <!-- Hero Section -->
    <div class="relative bg-gray-900 pt-24">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/20 to-gray-900/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="bg-gray-800/50 backdrop-blur-sm rounded-xl shadow-2xl p-8 max-w-4xl mx-auto border border-gray-700">
                <h1 class="text-4xl font-bold text-center mb-8 text-white">All You Can Fit with One Membership</h1>

                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-gray-300">Akses 110+ club di 31+ kota di Indonesia</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-gray-300">Ikuti 40+ jenis kelas tanpa biaya ekstra</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-gray-300">Alat gym premium dan beragam</p>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <img src="{{ asset('image/BenchPress.png') }}" alt="Bench Press">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="text-3xl font-bold text-center text-white mb-10">Pilih Paket Membership</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($layanan as $item)
                <div
                    class="bg-gray-800/50 backdrop-blur-sm rounded-xl shadow-2xl overflow-hidden border border-gray-700 hover:border-red-500 transition-all transform hover:-translate-y-1 duration-300 flex flex-col h-full {{ count($layanan) == 4 && $loop->iteration == 4 ? 'lg:col-start-2' : '' }}">
                    <div class="p-6 flex-1 flex flex-col">
                        <!-- Service name and badge -->
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-bold text-white">{{ $item->nama_layanan }}</h3>
                            <div class="bg-red-500 rounded-full px-4 py-1">
                                <span class="text-sm font-semibold text-white">{{ $item->durasi_layanan }} Bulan</span>
                            </div>
                        </div>

                        <!-- Price section -->
                        <div class="mb-6">
                            <div class="flex items-baseline">
                                <span
                                    class="text-3xl font-bold text-white">Rp{{ number_format($item->harga, 0, ',', '.') }}</span>
                                <span class="text-gray-400 text-sm ml-2">/ {{ $item->durasi_layanan }} Bulan</span>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-6">
                            <p class="text-gray-300">{{ $item->deskripsi }}</p>
                        </div>

                        <!-- Features list -->
                        <div class="space-y-3 mb-8 flex-grow">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <p class="text-gray-300">Akses 110+ club di 31+ kota</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <p class="text-gray-300">40+ jenis kelas gratis</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <p class="text-gray-300">Alat gym premium</p>
                            </div>
                        </div>

                        <!-- Registration button -->
                        <form action="{{ route('transaction') }}" method="GET">
                            <input type="hidden" name="id_layanan" value="{{ $item->id }}">
                            <input type="hidden" name="membership_type" value="{{ $item->nama_layanan }}">
                            <input type="hidden" name="duration" value="{{ $item->durasi_layanan }}">
                            <input type="hidden" name="price" value="{{ $item->harga }}">
                            <button type="submit"
                                class="w-full bg-red-500 text-white py-3 px-4 rounded-md hover:bg-red-600 transition-colors font-semibold flex items-center justify-center gap-2">
                                <span>Daftar Sekarang</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>

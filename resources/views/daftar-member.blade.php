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
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl shadow-2xl p-8 max-w-4xl mx-auto border border-gray-700">
                <h1 class="text-4xl font-bold text-center mb-8 text-white">All You Can Fit with One Membership</h1>
                
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-gray-300">Akses 110+ club di 31+ kota di Indonesia</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-gray-300">Ikuti 40+ jenis kelas tanpa biaya ekstra</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-gray-300">Alat gym premium dan beragam</p>
                        </div>
                        
                        <button class="mt-4 bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 transition-colors">
                            Lihat Benefit Membership
                        </button>
                    </div>
                    
                    <div class="hidden md:block">
                    <img src="{{ asset('image/BenchPress.png') }}" alt="Bench Press"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- 3 Bulan Package -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl shadow-2xl overflow-hidden border border-gray-700">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <div class="text-center bg-gray-700 rounded-full px-4 py-1">
                            <span class="text-lg font-semibold text-white">3</span>
                            <span class="text-sm text-gray-300">bulan</span>
                        </div>
                        <div class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-sm font-medium">
                            10%
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-gray-500 line-through text-sm">Rp1.443.750</p>
                        <div class="flex items-baseline">
                            <span class="text-2xl font-bold text-white">Rp385.000</span>
                            <span class="text-gray-400 text-sm ml-1">per bulan</span>
                        </div>
                        <p class="text-lg font-semibold text-gray-300">Rp1.155.000</p>
                    </div>
                    <br>
                    <button class="w-full bg-red-500 text-white py-3 rounded-md hover:bg-red-600 transition-colors">
                        Daftar
                    </button>
                </div>
            </div>

            <!-- 6 Bulan Package -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl shadow-2xl overflow-hidden border border-gray-700">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <div class="text-center bg-gray-700 rounded-full px-4 py-1">
                            <span class="text-lg font-semibold text-white">6</span>
                            <span class="text-sm text-gray-300">bulan</span>
                        </div>
                        <div class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-sm font-medium">
                            20%
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-gray-500 line-through text-sm">Rp2.437.500</p>
                        <div class="flex items-baseline">
                            <span class="text-2xl font-bold text-white">Rp325.000</span>
                            <span class="text-gray-400 text-sm ml-1">per bulan</span>
                        </div>
                        <p class="text-lg font-semibold text-gray-300">Rp1.950.000</p>
                    </div>

                    <div class="mb-4 text-sm text-gray-400">
                        <div class="flex items-center gap-2">
                            <span class="font-medium">Bonus 1 sesi</span>
                            <span>Personal Trainer gratis</span>    
                        </div>
                    </div>

                    <button class="w-full bg-red-500 text-white py-3 rounded-md hover:bg-red-600 transition-colors">
                        Daftar
                    </button>
                </div>
            </div>

            <!-- 12 Bulan Package -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl shadow-2xl overflow-hidden border border-gray-700 relative">
                <div class="absolute top-4 right-4">
                    <div class="flex gap-2">
                        <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-sm font-medium">
                            MOST POPULAR
                        </span>
                        <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-sm font-medium">
                            32%
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="text-center bg-gray-700 rounded-full px-4 py-1">
                            <span class="text-lg font-semibold text-white">12</span>
                            <span class="text-sm text-gray-300">bulan</span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-gray-500 line-through text-sm">Rp4.852.941</p>
                        <div class="flex items-baseline">
                            <span class="text-2xl font-bold text-white">Rp275.000</span>
                            <span class="text-gray-400 text-sm ml-1">per bulan</span>
                        </div>
                        <p class="text-lg font-semibold text-gray-300">Rp3.300.000</p>
                    </div>

                    <div class="mb-4 text-sm text-gray-400">
                        <div class="flex items-center gap-2">
                            <span class="font-medium">Bonus 2 sesi</span>
                            <span>Personal Trainer gratis</span>
                        </div>
                    </div>

                    <button class="w-full bg-red-500 text-white py-3 rounded-md hover:bg-red-600 transition-colors">
                        Daftar
                    </button>
                </div>
            </div>

            <!-- Remaining packages with similar dark theme styling... -->
            
        </div>
    </div>
</body>
</html>
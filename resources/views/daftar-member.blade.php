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
                    </div>
                    
                    <div class="hidden md:block">
                    <img src="{{ asset('image/BenchPress.png') }}" alt="Bench Press"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-8">
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl shadow-2xl overflow-hidden border border-gray-700">
                <div class="p-12">
                    <div class="flex justify-between items-center mb-4">
                        <div class="text-center bg-gray-700 rounded-full px-4 py-1">
                            <span class="text-lg font-semibold text-white">1</span>
                            <span class="text-sm text-gray-300">bulan</span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-baseline">
                            <span class="text-2xl font-bold text-white">Rp85.000</span>
                            <span class="text-gray-400 text-sm ml-1">per bulan</span>
                        </div>
                    </div>
                    <br>
                    <button class="w-full bg-red-500 text-white py-3 rounded-md hover:bg-red-600 transition-colors">
                        Daftar
                    </button>
                </div>
            </div>

            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl shadow-2xl overflow-hidden border border-gray-700">
                <div class="p-12">
                    <div class="flex justify-between items-center mb-4">
                        <div class="text-center bg-gray-700 rounded-full px-4 py-1">
                            <span class="text-lg font-semibold text-white">2</span>
                            <span class="text-sm text-gray-300">bulan</span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-baseline">
                            <span class="text-2xl font-bold text-white">Rp160.000</span>
                            <span class="text-gray-400 text-sm ml-1">per 2 bulan</span>
                        </div>
                    </div>
                    <br>
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
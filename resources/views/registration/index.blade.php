<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Member Gym</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <!-- Progress Steps -->
        <div class="flex justify-between mb-8">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center">1</div>
                <span class="ml-2 font-semibold">PROFIL</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center">2</div>
                <span class="ml-2">KEANGGOTAAN</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center">3</div>
                <span class="ml-2">PEMBAYARAN</span>
            </div>
        </div>

        <!-- Form Title -->
        <h1 class="text-3xl font-bold mb-8">SIAPKAN PROFIL ANDA</h1>

        <!-- Registration Form -->
        <form class="space-y-6">
            <!-- Nama Depan -->
            <div>
                <input type="text" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="Nama depan">
            </div>

            <!-- Nama Keluarga -->
            <div>
                <input type="text" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="Nama Keluarga">
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <input type="date" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="Tanggal lahir">
            </div>

            <!-- Email -->
            <div>
                <input type="email" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="Alamat email">
            </div>

            <!-- Phone Number -->
            <div class="flex">
                <div class="w-20 px-4 py-3 bg-gray-100 border border-gray-300 rounded-l-md text-gray-600">+62</div>
                <input type="tel" 
                       class="flex-1 px-4 py-3 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="Nomor handphone (eg: 08xxxxxxxxxx)">
            </div>

            <!-- Klub Pilihan -->
            <div>
                <div class="relative">
                    <select class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 appearance-none">
                        <option value="">Cibubur Junction</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Checkboxes -->
            <div class="space-y-4">
                <div class="flex items-start">
                    <input type="checkbox" class="mt-1 h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                    <label class="ml-2 text-sm text-gray-600">
                        Saya menyetujui Syarat dan Ketentuan Keanggotaan Kebijakan Privasi Peraturan Klub & Syarat penggunaan
                    </label>
                </div>
                <div class="flex items-start">
                    <input type="checkbox" class="mt-1 h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                    <label class="ml-2 text-sm text-gray-600">
                        Saya telah membaca dan menyetujui Pernyataan Kesehatan
                    </label>
                </div>
                <div class="flex items-start">
                    <input type="checkbox" class="mt-1 h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                    <label class="ml-2 text-sm text-gray-600">
                        Saya ingin menerima penawaran dari Evolution Wellness Indonesia dan partnernya
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="w-40 bg-red-600 text-white px-6 py-3 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Lanjutkan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
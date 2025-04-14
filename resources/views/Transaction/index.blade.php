@extends('layouts.app')

@section('content')
<div class="bg-[#0E1320] min-h-screen py-8 px-4">
    <div class="max-w-4xl mx-auto bg-[#1E2433] rounded-lg shadow-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-700">
            <h1 class="text-2xl font-bold text-white">Transaction Details</h1>
        </div>
        
        <div class="p-6">
            {{-- Registration Section --}}
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4 text-white">Daftar Akun</h2>
                <div class="bg-[#2C3343] p-6 rounded-lg">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-400 mb-2">Name</label>
                            <input type="text" class="w-full bg-[#1E2433] text-white rounded p-3 border border-[#3A4456]" placeholder="Enter your name">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-2">Email</label>
                            <input type="email" class="w-full bg-[#1E2433] text-white rounded p-3 border border-[#3A4456]" placeholder="Enter your email">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-2">Password</label>
                            <input type="password" class="w-full bg-[#1E2433] text-white rounded p-3 border border-[#3A4456]" placeholder="Create password">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-2">No. Telp</label>
                            <input type="tel" class="w-full bg-[#1E2433] text-white rounded p-3 border border-[#3A4456]" placeholder="Enter phone number">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Biodata Section --}}
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4 text-white">Biodata</h2>
                <div class="bg-[#2C3343] p-6 rounded-lg">
                    <diebv class="grid md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-gray-400 mb-2">Alamat</label>
                            <textarea class="w-full bg-[#1E2433] text-white rounded p-3 border border-[#3A4456]" rows="3" placeholder="Enter your address"></textarea>
                        </div>
                    </diebv>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                {{-- Membership Details --}}
                <div>
                    <h2 class="text-xl font-semibold mb-4 text-white">Membership Information</h2>
                    <div class="space-y-3">
                        <div class="bg-[#2C3343] p-4 rounded-lg">
                            <p class="font-medium text-gray-400">Membership Type</p>
                            <p class="text-lg font-bold text-white">All You Can Fit Membership</p>
                        </div>
                        <div class="bg-[#2C3343] p-4 rounded-lg">
                            <p class="font-medium text-gray-400">Duration</p>
                            <p class="text-lg font-bold text-white">3 Bulan</p>
                        </div>
                        <div class="bg-[#2C3343] p-4 rounded-lg">
                            <p class="font-medium text-gray-400">Price</p>
                            <p class="text-lg font-bold text-green-500">Rp 1.155.000</p>
                        </div>
                    </div>
                </div>

                {{-- Payment Method --}}
                <div>
                    <h2 class="text-xl font-semibold mb-4 text-white">Payment Method</h2>
                    <div class="space-y-4">
                        <div class="grid grid-cols-3 gap-3">
                            <button class="bg-[#2C3343] rounded-lg p-3 text-center hover:bg-[#3A4456] transition">
                                <div class="bg-white rounded-full p-2 mb-2 flex items-center justify-center h-12 w-12 mx-auto">
                                    <span class="text-sm font-bold text-black">BCA</span>
                                </div>
                                <span class="text-sm text-white">BCA</span>
                            </button>
                            <button class="bg-[#2C3343] rounded-lg p-3 text-center hover:bg-[#3A4456] transition">
                                <div class="bg-white rounded-full p-2 mb-2 flex items-center justify-center h-12 w-12 mx-auto">
                                    <span class="text-sm font-bold text-black">MDR</span>
                                </div>
                                <span class="text-sm text-white">Mandiri</span>
                            </button>
                            <button class="bg-[#2C3343] rounded-lg p-3 text-center hover:bg-[#3A4456] transition">
                                <div class="bg-white rounded-full p-2 mb-2 flex items-center justify-center h-12 w-12 mx-auto">
                                    <span class="text-sm font-bold text-black">GP</span>
                                </div>
                                <span class="text-sm text-white">GoPay</span>
                            </button>
                        </div>
                        
                        <div class="bg-[#2C3343] border-l-4 border-red-500 p-4 rounded">
                            <p class="text-gray-300">Pilih metode pembayaran untuk melanjutkan.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Transaction Summary --}}
            <div class="mt-8 bg-[#2C3343] p-6 rounded-lg">
                <div class="flex justify-between items-center">
                    <p class="text-lg font-medium text-white">Total Pembayaran</p>
                    <p class="text-2xl font-bold text-green-500">Rp 1.155.000</p>
                </div>
                <button class="w-full bg-red-500 text-white py-3 rounded-lg mt-4 hover:bg-red-600 transition">
                    Lanjutkan Pembayaran
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
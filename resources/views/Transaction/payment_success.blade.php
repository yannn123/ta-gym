@extends('layouts.app')

@section('content')
<div class="bg-[#0E1320] min-h-screen py-8 px-4">
    <div class="max-w-4xl mx-auto bg-[#1E2433] rounded-lg shadow-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-700">
            <h1 class="text-2xl font-bold text-white">Transaksi Berhasil</h1>
        </div>
        
        <div class="p-6">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            
            <div class="bg-[#2C3343] p-6 rounded-lg">
                <div class="flex items-center justify-center mb-6">
                    <div class="bg-green-500 rounded-full p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                
                <div class="text-center">
                    <h2 class="text-xl font-bold text-white mb-2">Terimakasih Telah Berlangganan!</h2>
                    <p class="text-gray-300 mb-6">Pembayaranmu telah diproses dengan sukses.</p>
                    {{-- {{ route('dashboard') }} --}}
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 transition">
                            Pergi ke Dashboard
                        </a>
                        <a href="#" class="bg-gray-600 text-white py-2 px-6 rounded-lg hover:bg-gray-700 transition">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
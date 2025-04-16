@extends('layouts.app')

@section('content')
<div class="bg-[#0E1320] min-h-screen py-8 px-4">
    <div class="max-w-4xl mx-auto bg-[#1E2433] rounded-lg shadow-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-700">
            <h1 class="text-2xl font-bold text-white">Transaction Details</h1>
        </div>
        
        <form id="transactionForm" action="{{ route('process-transaction') }}" method="POST">
            @csrf
            <input type="hidden" name="membership_type" value="{{ $idLayanan }}">
            <input type="hidden" name="membership_type_name" value="{{ $membershipType }}">
            <input type="hidden" name="duration" value="{{ $duration }}">
            <input type="hidden" name="price" value="{{ $price }}">
            
            <div class="p-6">
                {{-- Registration Section --}}
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4 text-white">Daftar Akun</h2>
                    <div class="bg-[#2C3343] p-6 rounded-lg">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-400 mb-2">Name</label>
                                <input type="text" name="name" id="name" class="w-full bg-[#1E2433] text-white rounded p-3 border border-[#3A4456]" placeholder="Enter your name" value="{{ old('name') }}">
                                <p id="nameError" class="text-red-500 text-sm mt-1 hidden"></p>
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-400 mb-2">Email</label>
                                <input type="email" name="email" id="email" class="w-full bg-[#1E2433] text-white rounded p-3 border border-[#3A4456]" placeholder="Enter your email" value="{{ old('email') }}">
                                <p id="emailError" class="text-red-500 text-sm mt-1 hidden"></p>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-400 mb-2">Password</label>
                                <input type="password" name="password" id="password" class="w-full bg-[#1E2433] text-white rounded p-3 border border-[#3A4456]" placeholder="Create password">
                                <p id="passwordError" class="text-red-500 text-sm mt-1 hidden"></p>
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-400 mb-2">No. Telp</label>
                                <input type="tel" name="phone" id="phone" class="w-full bg-[#1E2433] text-white rounded p-3 border border-[#3A4456]" placeholder="Enter phone number" value="{{ old('phone') }}">
                                <p id="phoneError" class="text-red-500 text-sm mt-1 hidden"></p>
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Biodata Section --}}
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4 text-white">Biodata</h2>
                    <div class="bg-[#2C3343] p-6 rounded-lg">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-gray-400 mb-2">Alamat</label>
                                <textarea name="address" id="address" class="w-full bg-[#1E2433] text-white rounded p-3 border border-[#3A4456]" rows="3" placeholder="Enter your address">{{ old('address') }}</textarea>
                                <p id="addressError" class="text-red-500 text-sm mt-1 hidden"></p>
                                @error('address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Membership Details --}}
                    <div>
                        <h2 class="text-xl font-semibold mb-4 text-white">Membership Information</h2>
                        <div class="space-y-3">
                            <div class="bg-[#2C3343] p-4 rounded-lg">
                                <p class="font-medium text-gray-400">Membership Type</p>
                                <p class="text-lg font-bold text-white">{{ $membershipType }}</p>
                            </div>
                            <div class="bg-[#2C3343] p-4 rounded-lg">
                                <p class="font-medium text-gray-400">Duration</p>
                                <p class="text-lg font-bold text-white">{{ $duration }} Bulan</p>
                            </div>
                            <div class="bg-[#2C3343] p-4 rounded-lg">
                                <p class="font-medium text-gray-400">Price</p>
                                <p class="text-lg font-bold text-green-500">Rp {{ $formattedPrice }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Method --}}
                    <div>
                        <h2 class="text-xl font-semibold mb-4 text-white">Payment Method</h2>
                        <div class="space-y-4">
                            <div class="grid grid-cols-3 gap-3">
                                <div class="payment-method-container bg-[#2C3343] flex flex-col items-center rounded-lg p-3 cursor-pointer active" data-payment="BCA">
                                    <div class="bg-white rounded-full p-2 mb-2 flex items-center justify-center h-12 w-12 mx-auto">
                                        <span class="text-sm font-bold text-black">BCA</span>
                                    </div>
                                    <span class="text-sm text-white">BCA</span>
                                    <input type="radio" name="payment_method" value="BCA" class="hidden" checked>
                                </div>
                                <div class="payment-method-container bg-[#2C3343] flex flex-col items-center rounded-lg p-3 cursor-pointer" data-payment="MANDIRI">
                                    <div class="bg-white rounded-full p-2 mb-2 flex items-center justify-center h-12 w-12 mx-auto">
                                        <span class="text-sm font-bold text-black">MDR</span>
                                    </div>
                                    <span class="text-sm text-white">Mandiri</span>
                                    <input type="radio" name="payment_method" value="MANDIRI" class="hidden">
                                </div>
                                <div class="payment-method-container bg-[#2C3343] flex flex-col items-center rounded-lg p-3 cursor-pointer" data-payment="GOPAY">
                                    <div class="bg-white rounded-full p-2 mb-2 flex items-center justify-center h-12 w-12 mx-auto">
                                        <span class="text-sm font-bold text-black">GP</span>
                                    </div>
                                    <span class="text-sm text-white">GoPay</span>
                                    <input type="radio" name="payment_method" value="GOPAY" class="hidden">
                                </div>
                            </div>
                            
                            <div class="bg-[#2C3343] border-l-4 border-red-500 p-4 rounded" id="paymentMethodInfo">
                                <p class="text-gray-300">Payment method selected: BCA</p>
                            </div>
                            <p id="paymentMethodError" class="text-red-500 text-sm mt-1 hidden"></p>
                            @error('payment_method')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Transaction Summary --}}
                <div class="mt-8 bg-[#2C3343] p-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <p class="text-lg font-medium text-white">Total Pembayaran</p>
                        <p class="text-2xl font-bold text-green-500">Rp {{ $formattedPrice }}</p>
                    </div>
                    <button type="submit" id="submitButton" class="w-full bg-red-500 text-white py-3 rounded-lg mt-4 hover:bg-red-600 transition">
                        Lanjutkan Pembayaran
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentContainers = document.querySelectorAll('.payment-method-container');
    const paymentInfo = document.getElementById('paymentMethodInfo');

    const defaultPaymentMethod = paymentContainers[0];
    defaultPaymentMethod.classList.add('active');
    defaultPaymentMethod.classList.remove('bg-[#2C3343]');
    defaultPaymentMethod.classList.add('bg-blue-600');

    paymentContainers.forEach(container => {
        container.addEventListener('click', function() {
            paymentContainers.forEach(item => {
                item.classList.remove('active');
                item.classList.remove('bg-blue-600');
                item.classList.add('bg-[#2C3343]');
            });
            
            this.classList.add('active');
            this.classList.remove('bg-[#2C3343]');
            this.classList.add('bg-blue-600');
            
            const radio = this.querySelector('input[type="radio"]');
            radio.checked = true;
            
            const paymentMethod = this.getAttribute('data-payment');
            paymentInfo.innerHTML = `<p class="text-gray-300">Payment method selected: ${paymentMethod}</p>`;
        });
    });
    
    const form = document.getElementById('transactionForm');
    const submitButton = document.getElementById('submitButton');
    
    form.addEventListener('submit', function(event) {
        let isValid = true;
        
        const name = document.getElementById('name');
        const nameError = document.getElementById('nameError');
        if (!name.value.trim()) {
            nameError.textContent = 'Name is required';
            nameError.classList.remove('hidden');
            isValid = false;
        } else {
            nameError.classList.add('hidden');
        }
        
        const email = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        if (!email.value.trim()) {
            emailError.textContent = 'Email is required';
            emailError.classList.remove('hidden');
            isValid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
            emailError.textContent = 'Please enter a valid email address';
            emailError.classList.remove('hidden');
            isValid = false;
        } else {
            emailError.classList.add('hidden');
        }
        
        const password = document.getElementById('password');
        const passwordError = document.getElementById('passwordError');
        if (!password.value.trim()) {
            passwordError.textContent = 'Password is required';
            passwordError.classList.remove('hidden');
            isValid = false;
        } else if (password.value.length < 6) {
            passwordError.textContent = 'Password must be at least 6 characters';
            passwordError.classList.remove('hidden');
            isValid = false;
        } else {
            passwordError.classList.add('hidden');
        }
        
        const phone = document.getElementById('phone');
        const phoneError = document.getElementById('phoneError');
        if (!phone.value.trim()) {
            phoneError.textContent = 'Phone number is required';
            phoneError.classList.remove('hidden');
            isValid = false;
        } else if (!/^[0-9+\-\s]{10,15}$/.test(phone.value.trim())) {
            phoneError.textContent = 'Please enter a valid phone number';
            phoneError.classList.remove('hidden');
            isValid = false;
        } else {
            phoneError.classList.add('hidden');
        }
        
        const address = document.getElementById('address');
        const addressError = document.getElementById('addressError');
        if (!address.value.trim()) {
            addressError.textContent = 'Address is required';
            addressError.classList.remove('hidden');
            isValid = false;
        } else {
            addressError.classList.add('hidden');
        }
        
        const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
        const paymentMethodError = document.getElementById('paymentMethodError');
        if (!paymentMethod) {
            paymentMethodError.textContent = 'Please select a payment method';
            paymentMethodError.classList.remove('hidden');
            isValid = false;
        } else {
            paymentMethodError.classList.add('hidden');
        }
        
        if (!isValid) {
            event.preventDefault();
        }
    });
    
    const inputFields = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"], input[type="tel"], textarea');
    
    inputFields.forEach(field => {
        field.addEventListener('input', function() {
            const errorElement = document.getElementById(`${field.id}Error`);
            if (errorElement && field.value.trim()) {
                errorElement.classList.add('hidden');
            }
        });
    });
});
</script>
@endsection
@extends('layouts.app')

@section('content')
    <section class="bg-gray-900 text-white py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12">Gym Merchandise & Suplemen</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Produk 1 -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('image/evowhey.png') }}" alt="Evolene Whey Protein" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Evolene Whey Protein</h3>
                        <p class="mt-2 text-gray-300">Whey protein berkualitas tinggi untuk meningkatkan massa otot. 💪</p>
                        <p class="text-green-400 font-semibold text-lg">Rp350.000</p>
                        <a href="#" class="mt-4 inline-block bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg">Add to Cart</a>
                    </div>
                </div>

                <!-- Produk 2 -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('image/l-men.png') }}" alt="L-Men Gain Mass" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">L-Men Gain Mass</h3>
                        <p class="mt-2 text-gray-300">Susu tinggi protein untuk membantu pembentukan otot. 🏋️</p>
                        <p class="text-green-400 font-semibold text-lg">Rp275.000</p>
                        <a href="#" class="mt-4 inline-block bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg">Add to Cart</a>
                    </div>
                </div>

                <!-- Produk 3 -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('images/muscle-first.jpg') }}" alt="Muscle First Isolate" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Muscle First Isolate</h3>
                        <p class="mt-2 text-gray-300">Isolate whey protein dengan kadar protein tinggi dan rendah lemak. 🔥</p>
                        <p class="text-green-400 font-semibold text-lg">Rp400.000</p>
                        <a href="#" class="mt-4 inline-block bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg">Add to Cart</a>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="#" class="bg-blue-500 hover:bg-blue-600 px-6 py-3 text-lg font-semibold rounded-lg">See All Products</a>
            </div>
        </div>
    </section>
@endsection

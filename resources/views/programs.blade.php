@extends('layouts.app')

@section('content')
    <section class="bg-gray-900 text-white py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12">Our Gym Programs</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Program 1 -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('image/BenchPress.png') }}" alt="Strength Training" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Push Day</h3>
                        <p class="mt-2 text-gray-300">Build a bigger, stronger chest, boost endurance, and maximize power with our expert chest day training program. 💪🔥</p>
                        <a href="{{ route('push-day') }}" class="mt-4 inline-block bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg">Learn More</a>
                    </div>
                </div>

                <!-- Program 2 -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('image/back.png') }}" alt="HIIT" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Pull Day </h3>
                        <p class="mt-2 text-gray-300">Build a powerful back, enhance endurance, and increase strength with our expert back day training program. 💪🔥</p>
                        <a href="{{ route('pull-day') }}" class="mt-4 inline-block bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg">Learn More</a>
                    </div>
                </div>

                <!-- Program 3 -->
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('image/leg.png') }}" alt="Yoga" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Leg Day </h3>
                        <p class="mt-2 text-gray-300">Build explosive leg strength, boost endurance, and enhance power with our expert leg day training program. 🦵🔥</p>
                        <a href="#" class="mt-4 inline-block bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="mt-12 text-center">
                <a href="#" class="bg-green-500 hover:bg-green-600 px-6 py-3 text-lg font-semibold rounded-lg">See All Programs</a>
            </div>
        </div>
    </section>
@endsection

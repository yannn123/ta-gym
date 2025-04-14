<!-- resources/views/chest-day.blade.php -->

@extends('layouts.app')

@section('content')
    <section class="bg-gray-900 text-white py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12">Back- Build Strong Chest Muscles</h2>
            

            <div class="flex gap-8 mt-8">
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden ">
                    <img src="{{ asset('image/latpulldown.png') }}" alt="Strength Training" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Lat-Pulldown</h3>
                        <p class="mt-2 text-gray-300">Build muscle, increase endurance, and get stronger with our professional strength training program.</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('image/seatedcablerow.png') }}" alt="Strength Training" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Seated-Cable-Row</h3>
                        <p class="mt-2 text-gray-300">Build muscle, increase endurance, and get stronger with our professional strength training program.</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('image/BenchPress1.png') }}" alt="Strength Training" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Bench-Press</h3>
                        <p class="mt-2 text-gray-300">Build muscle, increase endurance, and get stronger with our professional strength training program.</p>
                    </div>
                </div>
            </div>
            <br>
            <h2 class="text-4xl font-bold text-center mb-12">Shoulders - Build Strong Chest Muscles</h2>
            <div class="flex gap-8 mt-8">
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden ">
                    <img src="{{ asset('image/lateral2.png') }}" alt="Strength Training" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Lateral-Raise</h3>
                        <p class="mt-2 text-gray-300">Build muscle, increase endurance, and get stronger with our professional strength training program.</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('image/shoulderpress.png') }}" alt="Strength Training" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Shoulder-Press</h3>
                        <p class="mt-2 text-gray-300">Build muscle, increase endurance, and get stronger with our professional strength training program.</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('image/reardeltfly.png') }}" alt="Strength Training" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Dumbbell-Rear-Delt-Fly</h3>
                        <p class="mt-2 text-gray-300">Build muscle, increase endurance, and get stronger with our professional strength training program.</p>
                    </div>
                </div>
            </div>
            <br>
            <h2 class="text-4xl font-bold text-center mb-12">Triceps - Build Strong Chest Muscles</h2>
            <div class="flex gap-8 mt-8">
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden ">
                    <img src="{{ asset('image/triceppushdown.png') }}" alt="Strength Training" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Cable-Pushdown</h3>
                        <p class="mt-2 text-gray-300">Build muscle, increase endurance, and get stronger with our professional strength training program.</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('image/dumbbellOverhead.png') }}" alt="Strength Training" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Dumbbell-Overhead</h3>
                        <p class="mt-2 text-gray-300">Build muscle, increase endurance, and get stronger with our professional strength training program.</p>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('image/tricepdips.png') }}" alt="Strength Training" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold">Triceps Dips</h3>
                        <p class="mt-2 text-gray-300">Build muscle, increase endurance, and get stronger with our professional strength training program.</p>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('programs') }}" class="bg-green-500 hover:bg-green-600 px-6 py-3 text-lg font-semibold rounded-lg">Back to Programs</a>
            </div>
        </div>

        <br>

    </section>
@endsection

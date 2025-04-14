@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8 text-white">
    <h1 class="text-4xl font-bold text-center mb-6">Choose Your Membership Plan</h1>
    <p class="text-center text-gray-400 mb-10">Find the best plan that fits your fitness journey.</p>

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Basic Plan -->
        <div class="bg-gray-800 p-6 rounded-xl shadow-lg hover:scale-105 transition transform">
            <h2 class="text-2xl font-semibold text-center text-green-400">Basic Plan</h2>
            <p class="text-center text-gray-400 mt-2">For beginners who need gym access.</p>
            <p class="text-4xl font-bold text-center my-4">Rp250.000</p>
            <ul class="text-gray-300 space-y-2">
                <li>✔ 24/7 Gym Access</li>
                <li>✔ Basic Equipment</li>
                <li>✔ Locker & Shower</li>
            </ul>
            <button class="mt-6 bg-green-500 text-white px-6 py-2 rounded-lg w-full hover:bg-green-600">Join Now</button>
        </div>

        <!-- Standard Plan -->
        <div class="bg-gray-800 p-6 rounded-xl shadow-lg hover:scale-105 transition transform">
            <h2 class="text-2xl font-semibold text-center text-blue-400">Standard Plan</h2>
            <p class="text-center text-gray-400 mt-2">For fitness enthusiasts.</p>
            <p class="text-4xl font-bold text-center my-4">Rp500.000</p>
            <ul class="text-gray-300 space-y-2">
                <li>✔ All Basic Plan Benefits</li>
                <li>✔ Group Classes</li>
                <li>✔ Personal Trainer (2x/month)</li>
            </ul>
            <button class="mt-6 bg-blue-500 text-white px-6 py-2 rounded-lg w-full hover:bg-blue-600">Join Now</button>
        </div>

        <!-- Premium Plan -->
        <div class="bg-gray-700 p-6 rounded-xl shadow-lg hover:scale-105 transition transform">
            <h2 class="text-2xl font-semibold text-center text-yellow-400">Premium Plan</h2>
            <p class="text-center text-gray-400 mt-2">For serious fitness lovers.</p>
            <p class="text-4xl font-bold text-center my-4">Rp1.000.000</p>
            <ul class="text-gray-300 space-y-2">
                <li>✔ All Standard Plan Benefits</li>
                <li>✔ Unlimited Personal Training</li>
                <li>✔ Exclusive Workout Plans</li>
            </ul>
            <button class="mt-6 bg-yellow-500 text-white px-6 py-2 rounded-lg w-full hover:bg-yellow-600">Join Now</button>
        </div>
    </div>
</div>
@endsection

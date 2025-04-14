@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6 text-white">Health Calculator</h1>

    <!-- BMI Calculator -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
        <h2 class="text-2xl font-bold text-white">BMI Calculator</h2>
        <form action="{{ route('calculate.bmi') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label class="block text-white">Weight (kg):</label>
                <input type="number" name="weight" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label class="block text-white">Height (cm):</label>
                <input type="number" name="height" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Calculate BMI</button>
        </form>
        @if(session('bmi'))
            <p class="text-white mt-4">Your BMI: <strong>{{ session('bmi') }}</strong></p>
            <p class="text-white">Category: <strong>{{ session('category') }}</strong></p>
        @endif
    </div>

    <!-- Calorie Calculator -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-white">Daily Calorie Needs</h2>
        <form action="{{ route('calculate.calories') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label class="block text-white">Weight (kg):</label>
                <input type="number" name="weight" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label class="block text-white">Height (cm):</label>
                <input type="number" name="height" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label class="block text-white">Age:</label>
                <input type="number" name="age" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label class="block text-white">Gender:</label>
                <select name="gender" class="w-full p-2 rounded bg-gray-700 text-white">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-white">Activity Level:</label>
                <select name="activity" class="w-full p-2 rounded bg-gray-700 text-white">
                    <option value="1">Sedentary (little to no exercise)</option>
                    <option value="2">Light exercise (1-3 days per week)</option>
                    <option value="3">Moderate exercise (3-5 days per week)</option>
                    <option value="4">Heavy exercise (6-7 days per week)</option>
                    <option value="5">Athlete (very intense training)</option>
                </select>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Calculate Calories</button>
        </form>
        @if(session('calories'))
            <p class="text-white mt-4">Your Daily Calorie Needs: <strong>{{ session('calories') }} kcal</strong></p>
        @endif
    </div>
</div>
@endsection

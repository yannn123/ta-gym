<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthCalculatorController extends Controller
{
    public function index()
{
    return view('health-calculator');
}

    // Kalkulasi BMI
    public function calculateBMI(Request $request)
    {
        $weight = floatval($request->weight);
        $height = floatval($request->height) / 100; // Konversi cm ke meter

        if ($height > 0) {
            $bmi = $weight / ($height * $height);
            $category = $this->getBMICategory($bmi);
        } else {
            return redirect()->back()->with('error', 'Height must be greater than 0');
        }

        return redirect()->back()->with([
            'bmi' => round($bmi, 2),
            'category' => $category
        ]);
    }

    // Kalkulasi Kalori (BMR)
    public function calculateCalories(Request $request)
    {
        $weight = floatval($request->weight);
        $height = floatval($request->height);
        $age = intval($request->age);
        $gender = $request->gender;
        $activity = intval($request->activity);

        // Menghitung BMR berdasarkan gender
        if ($gender == 'male') {
            $bmr = 88.36 + (13.4 * $weight) + (4.8 * $height) - (5.7 * $age);
        } else {
            $bmr = 447.6 + (9.2 * $weight) + (3.1 * $height) - (4.3 * $age);
        }

        // Faktor Aktivitas
        $activityFactor = [
            1 => 1.2,   // Sedentary (little to no exercise)
            2 => 1.375, // Light exercise (1-3 days per week)
            3 => 1.55,  // Moderate exercise (3-5 days per week)
            4 => 1.725, // Heavy exercise (6-7 days per week)
            5 => 1.9    // Athlete (very intense training)
        ];

        // Menghitung kebutuhan kalori
        $calories = $bmr * ($activityFactor[$activity] ?? 1.2);

        return redirect()->back()->with([
            'calories' => round($calories, 2)
        ]);
    }

    // Menentukan kategori BMI
    private function getBMICategory($bmi)
    {
        if ($bmi < 18.5) {
            return "Underweight";
        } elseif ($bmi < 24.9) {
            return "Normal weight";
        } elseif ($bmi < 29.9) {
            return "Overweight";
        } else {
            return "Obese";
        }
    }
}

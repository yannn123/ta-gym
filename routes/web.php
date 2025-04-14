<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalKelasController;
use App\Http\Controllers\pushdayController;
use App\Http\Controllers\pulldayController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\HealthCalculatorController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberAdminController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Tambahkan route untuk reset password jika diperlukan
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

// Route untuk dashboard (halaman setelah login berhasil)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Route untuk halaman registrasi
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/transaction', [TransactionController::class, 'showTransaction']);

Route::get('/admin/payment', [PaymentController::class, 'index'])->name('admin.payment');

Route::get('/admin/members', [MemberAdminController::class, 'index'])->name('admin.members');

Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('merchandise.index');

Route::get('/membership-plans', [MembershipController::class, 'index'])->name('membership.plans');

Route::get('/health-calculator', [HealthCalculatorController::class, 'index'])->name('health.calculator');
Route::post('/calculate-bmi', [HealthCalculatorController::class, 'calculateBMI'])->name('calculate.bmi');
Route::post('/calculate-calories', [HealthCalculatorController::class, 'calculateCalories'])->name('calculate.calories');

// Menampilkan halaman pendaftaran
Route::get('/daftar-member', [MemberController::class, 'showForm'])->name('daftar-member');

// Menangani form pendaftaran
Route::post('/daftar-member', [MemberController::class, 'processForm'])->name('daftar-member.submit');


// app/Http/Controllers/GymMemberController.php
Route::get('/push-day', [pushdayController::class, 'index'])->name('push-day');

Route::get('/', function () { return view('homepage'); });
Route::get('/pricing', function () { return view('pricing'); });
Route::get('/contact', function () { return view('contact'); });
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth,register'); });

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/programs', function () {
    return view('programs'); // Pastikan file programs.blade.php ada di views
})->name('programs');

Route::get('/', function () {
    return view('homepage'); // Halaman utama yang langsung menggunakan homepage.blade.php
});

Route::get('/jadwal-kelas', [JadwalKelasController::class, 'index'])->name('jadwal.kelas');

Route::get('/pull-day', [pulldayController::class, 'pullday'])->name('pull-day');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
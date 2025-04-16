<?php

use App\Http\Controllers\LayananController;
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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\CheckFailedTransaction;

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

// Route route Admin
Route::middleware([IsAdmin::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/payment', [PaymentController::class, 'index'])->name('admin.payment');
    Route::patch('/payment/{id}', [PaymentController::class, 'updateStatus'])->name('admin.payment.update');

    // member
    Route::get('/member', [MemberAdminController::class, 'index'])->name('admin.member');
    Route::post('/member', [MemberAdminController::class, 'store'])->name('admin.member.store');
    Route::put('/member/{id}', [MemberAdminController::class, 'update'])->name('admin.member.update');
    Route::delete('/member/{id}', [MemberAdminController::class, 'destroy'])->name('admin.member.destroy');

    // Layanan
    Route::get('/layanan', [LayananController::class, 'index'])->name('admin.layanan');
    Route::post('/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
    Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('admin.layanan.update');
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');
});

Route::middleware([CheckFailedTransaction::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/transaction', [TransactionController::class, 'showTransaction'])->name('transaction');
    Route::post('/process-transaction', [TransactionController::class, 'processTransaction'])->name('process-transaction');
    Route::get('/payment/success', function () {
        return view('transaction.payment_success');
    })->name('payment.success');

    Route::get('/daftar-member', [MemberController::class, 'showForm'])->name('daftar-member');
    Route::post('/daftar-member', [MemberController::class, 'processForm'])->name('daftar-member.submit');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('homepage');
    });

    Route::get('/programs', function () {
        return view('programs');
    })->name('programs');

    Route::get('/jadwal-kelas', [JadwalKelasController::class, 'index'])->name('jadwal.kelas');

    Route::get('/pull-day', [pulldayController::class, 'pullday'])->name('pull-day');
    Route::get('/push-day', [pushdayController::class, 'index'])->name('push-day');

    Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('merchandise.index');
    Route::get('/membership-plans', [MembershipController::class, 'index'])->name('membership.plans');

    Route::get('/health-calculator', [HealthCalculatorController::class, 'index'])->name('health.calculator');
    Route::post('/calculate-bmi', [HealthCalculatorController::class, 'calculateBMI'])->name('calculate.bmi');
    Route::post('/calculate-calories', [HealthCalculatorController::class, 'calculateCalories'])->name('calculate.calories');
});
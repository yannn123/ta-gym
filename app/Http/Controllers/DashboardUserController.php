<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $transaksis = Transaksi::with(['user', 'layanan'])
                ->where('id_user', Auth::id())
                ->where('status', 'completed')
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($transaksi) {
                    $expiredDate = Carbon::parse($transaksi->expired_date);
                    
                    $transaksi->status_card = $expiredDate->startOfDay() >= Carbon::now()->startOfDay() ? 'Aktif' : 'Tidak Aktif';
                    
                    return $transaksi;
                });
            
            return view('dashboard-user', compact('transaksis'));
        } else {
            return view('dashboard-user', ['transaksis' => null]);
        }
    }
}

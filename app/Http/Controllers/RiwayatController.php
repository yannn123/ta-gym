<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $transaksis = Transaksi::with(['user', 'layanan'])
                ->where('id_user', Auth::id())
                ->orderBy('tanggal_transaksi', 'desc')
                ->get();
            
            return view('riwayat', compact('transaksis'));
        } else {
            return view('riwayat', ['transaksis' => null]);
        }
    }
}

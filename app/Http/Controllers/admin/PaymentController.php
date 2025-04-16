<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Jobs\UpdateExpiredTransactionsJob;

class PaymentController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['user', 'layanan'])
            ->whereHas('user')
            ->latest()
            ->get();
        
        $totalTransaksi = $transaksis->count();
        $successTransaksi = $transaksis->where('status', 'completed')->count();
        $pendingTransaksi = $transaksis->where('status', 'pending')->count();
        
        return view('admin.payment', compact('transaksis', 'totalTransaksi', 'successTransaksi', 'pendingTransaksi'));
    }
    
    public function updateStatus(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->save();
        
        return redirect()->route('admin.payment')->with('success', 'Status transaksi berhasil diperbarui');
    }
}
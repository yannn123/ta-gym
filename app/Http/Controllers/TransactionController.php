<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller 
{
    public function showTransaction(Request $request)
    {
        $idLayanan = $request->input('id_layanan', 1);
        $membershipType = $request->input('membership_type', 'All You Can Fit Membership');
        $duration = $request->input('duration', '1 Bulan');
        $price = $request->input('price', '85000');
        
        $formattedPrice = number_format($price, 0, ',', '.');
        
        return view('transaction.index', [
            'idLayanan' => $idLayanan,
            'membershipType' => $membershipType,
            'duration' => $duration,
            'price' => $price,
            'formattedPrice' => $formattedPrice
        ]);
    }

    public function processTransaction(Request $request)
    {
        
    }
}
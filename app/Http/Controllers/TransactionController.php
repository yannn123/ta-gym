<?php
namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller 
{
    public function showForm()
    {
        $layanan = Layanan::all();
        return view('daftar-member', compact('layanan'));
    }

    public function showTransaction(Request $request)
    {
        $idLayanan = $request->input('id_layanan', 1);
        $membershipType = $request->input('membership_type', 'All You Can Fit Membership');
        $duration = $request->input('duration', '1 Bulan');
        $price = $request->input('price', '85000');
        
        $user = Auth::user();

        $formattedPrice = number_format($price, 0, ',', '.');
        
        return view('transaction.index', [
            'idLayanan' => $idLayanan,
            'membershipType' => $membershipType,
            'duration' => $duration,
            'price' => $price,
            'formattedPrice' => $formattedPrice,
            'user' => $user
        ]);
    }

    public function processTransaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:6',
            'phone' => 'required|string|regex:/^[0-9+\-\s]{10,15}$/',
            'address' => 'required|string',
            'payment_method' => 'required|in:BCA,MANDIRI,GOPAY',
            'membership_type' => 'required',
            'duration' => 'required|string',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Check if the user already exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'no_hp' => $request->phone,
                'alamat' => $request->address,
            ]);

            Auth::login($user);
        } else {
            $user->name = $request->name;
            $user->no_hp = $request->phone;
            $user->alamat = $request->address;

            // Only update password if it's provided
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();
        }

        $transaksi = new Transaksi();
        $transaksi->id_user = $user->id;
        $transaksi->id_layanan = $request->membership_type;
        $transaksi->total_bayar = $request->price;
        $transaksi->tanggal_transaksi = now()->format('Y-m-d');

        $layanan = Layanan::find($request->membership_type);
        if ($layanan) {
            $durationInMonths = (int) $layanan->durasi_layanan;
            $transaksi->expired_date = now()->addMonths($durationInMonths)->format('Y-m-d');
        }

        $transaksi->metode_pembayaran = $request->payment_method;
        $transaksi->status = 'pending';
        $transaksi->save();

        $formattedPrice = number_format($request->price, 0, ',', '.');
        
        return redirect()->route('riwayat')->with('success', 'Transaction is being processed. Your payment of Rp ' . $formattedPrice . ' via ' . $request->payment_method . ' is pending.');
    }
}
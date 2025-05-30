<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Menampilkan halaman pendaftaran
    public function showForm()
    {
        $layanan = Layanan::all();
        return view('daftar-member', compact('layanan'));
    }

    // Menangani form pendaftaran
    public function processForm(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'plan'  => 'required|string',
        ]);

        // Simpan data ke database (Contoh tanpa model)
        // Biasanya disimpan ke tabel `users` atau `members`
        
        // Redirect kembali dengan pesan sukses
        return redirect()->route('daftar-member')->with('success', 'Pendaftaran berhasil!');
    }
}

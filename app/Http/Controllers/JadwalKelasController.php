<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalKelasController extends Controller
{
    public function index()
    {
        // Data statis untuk sementara (tanpa database)
        $jadwalKelas = [
            [
                'nama' => 'Chest Day',
                'trainer' => 'John Doe',
                'hari' => 'Senin',
                'waktu' => '18:00 - 19:30',
            ],
            [
                'nama' => 'Back Day',
                'trainer' => 'Alice Smith',
                'hari' => 'Selasa',
                'waktu' => '17:00 - 18:00',
            ],
            [
                'nama' => 'Leg Day',
                'trainer' => 'Sarah Lee',
                'hari' => 'Rabu',
                'waktu' => '07:00 - 08:30',
            ],
            [
                'nama' => 'Shoulder Day',
                'trainer' => 'Michael Johnson',
                'hari' => 'Kamis',
                'waktu' => '19:00 - 20:30',
            ],
            [
                'nama' => 'Arms Day',
                'trainer' => 'Emily Brown',
                'hari' => 'Jumat',
                'waktu' => '08:00 - 09:30',
            ],
            [
                'nama' => 'Deadlift Day',
                'trainer' => 'Jake Williams',
                'hari' => 'Minggu',
                'waktu' => '16:00 - 17:30',
            ],
        ];

        return view('jadwal', compact('jadwalKelas'));
    }
}

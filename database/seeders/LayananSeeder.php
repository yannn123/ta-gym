<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_layanan' => 'Bulking',
                'deskripsi' => 'Program peningkatan massa otot',
                'harga' => 300000,
                'durasi_layanan' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Bulking',
                'deskripsi' => 'Program peningkatan massa otot',
                'harga' => 800000,
                'durasi_layanan' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Cutting',
                'deskripsi' => 'Program penurunan berat badan',
                'harga' => 300000,
                'durasi_layanan' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_layanan' => 'Cutting',
                'deskripsi' => 'Program penurunan berat badan',
                'harga' => 800000,
                'durasi_layanan' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('layanans')->insert($data);
    }
}

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-center mb-6 text-white">Jadwal Kelas Gym</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($jadwalKelas as $kelas)
        <div class="bg-gray-800 text-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold">{{ $kelas['nama'] }}</h3>
            <p class="mt-2 text-gray-300">Pelatihan dengan instruktur terbaik.</p>
            <div class="mt-4 text-sm">
                <p><strong>Trainer:</strong> {{ $kelas['trainer'] }}</p>
                <p><strong>Hari:</strong> {{ $kelas['hari'] }}</p>
                <p><strong>Waktu:</strong> {{ $kelas['waktu'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-10 text-center">
        <a href="#" class="bg-red-500 hover:bg-red-600 px-6 py-3 text-lg font-semibold rounded-lg text-white">Lihat Semua Jadwal</a>
    </div>
</div>
@endsection

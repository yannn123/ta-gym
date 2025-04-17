<!-- resources/views/layouts/navbar.blade.php -->
<nav class="fixed w-full py-2 top-0 z-50">
    <div class="backdrop-blur-lg bg-white/20 shadow-lg rounded-3xl container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="text-2xl font-bold text-white">GYM BRIAN</a> <!-- Mengubah text-red-500 menjadi text-white -->

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-6">
            @php
                // Get the authenticated user
                $user = Auth::user();
                $hasCompletedTransaction = false;

                if ($user) {
                    // Get the latest transaction for the user
                    $latestTransaction = $user->transaksis()->orderBy('created_at', 'desc')->first();

                    // Check if the latest transaction is completed
                    if ($latestTransaction && $latestTransaction->status === 'completed') {
                        $hasCompletedTransaction = true;
                    }
                }
            @endphp

            @if ($user && $hasCompletedTransaction)
                <a href="{{ route('dashboard') }}" class="text-yellow-400 hover:text-red-500 transition">Dashboard</a>
            @endif
            <a href="/" class="text-white hover:text-red-500 transition">Home</a>
            <a href="{{ route('programs') }}" class="text-white hover:text-red-500 transition">Programs</a>
            <a href="{{route('jadwal.kelas') }}" class="text-white hover:text-red-500 transition">Jadwal</a> <!-- Menambahkan text-white -->
            <a href="{{route('riwayat') }}" class="text-white hover:text-red-500 transition">Riwayat</a>
        </div>

        <!-- Dropdown Button -->
        <div class="relative hidden md:block">
            @if (Auth::check())
                <span class="text-blue-500">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded-lg hover:bg-red-600 transition text-white">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" id="userMenuBtn" class="bg-red-500 px-4 py-2 rounded-lg hover:bg-red-600 transition text-white">Login?</a>
            @endif
        </div>

        <!-- Mobile Menu Button -->
        <button id="menuBtn" class="md:hidden text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-gray-800 px-6 py-4">
        <a href="#" class="block py-2 text-white hover:text-red-500 transition">Home</a>
        <a href="#" class="block py-2 text-white hover:text-red-500 transition">Programs</a>
        <a href="#" class="block py-2 text-white hover:text-red-500 transition">Trainers</a>
        <a href="#" class="block py-2 text-white hover:text-red-500 transition">Contact</a>
        <a href="#" class="block py-2 text-white hover:text-red-500 transition">Login</a>
    </div>
</nav>

<script>
    document.getElementById('menuBtn').addEventListener('click', function () {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });

    document.getElementById('userMenuBtn').addEventListener('click', function () {
        document.getElementById('userMenu').classList.toggle('hidden');
    });
</script>

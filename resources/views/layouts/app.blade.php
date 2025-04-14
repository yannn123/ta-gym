<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Hero</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

    @if (!request()->is('admin*'))
        @include('layouts.navbar')
    @endif

    <main class="mt-16">
        @yield('content') <!-- Bagian yang akan diisi oleh setiap halaman -->
    </main>

    
</body>
</html>

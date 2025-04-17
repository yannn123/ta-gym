<!-- Why Choose Us -->
<section class="max-w-7xl mx-auto p-8 flex flex-col lg:flex-row items-start gap-8 bg-gray-900">
    <!-- Left Side Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 flex-1">
        <!-- Club Card -->
        <div class="relative rounded-2xl overflow-hidden aspect-square shadow-lg transform hover:scale-[1.02] transition-transform">
            <img src="{{ asset('image/BenchPress1.png') }}" alt="Gym Interior" class="w-full h-full object-cover" />
            <div class="absolute bottom-0 left-0 p-6 text-white bg-gradient-to-t from-black/80 to-transparent w-full">
                <h3 class="text-2xl font-bold text-teal-300">Chest Day</h3>
            </div>
        </div>

        <!-- Classes Card -->
        <div class="relative rounded-2xl overflow-hidden aspect-square shadow-lg transform hover:scale-[1.02] transition-transform">
            <img src="{{ asset('image/back.png') }}" alt="Group Fitness" class="w-full h-full object-cover" />
            <div class="absolute bottom-0 left-0 p-6 text-white bg-gradient-to-t from-black/80 to-transparent w-full">
                <h3 class="text-2xl font-bold text-teal-300">Back Day</h3>
            </div>
        </div>

        <!-- Personal Trainer Card -->
        <div class="relative rounded-2xl overflow-hidden aspect-square shadow-lg transform hover:scale-[1.02] transition-transform">
            <img src="{{ asset('image/leg.png') }}" alt="Personal Training" class="w-full h-full object-cover" />
            <div class="absolute bottom-0 left-0 p-6 text-white bg-gradient-to-t from-black/80 to-transparent w-full">
                <h3 class="text-2xl font-bold text-teal-300">Leg Day</h3>
            </div>
        </div>

        <!-- App Features Card -->
        <div class="relative rounded-2xl overflow-hidden aspect-square shadow-lg transform hover:scale-[1.02] transition-transform">
            <img src="{{ asset('image/lateral2.png') }}" alt="Mobile App" class="w-full h-full object-cover" />
            <div class="absolute bottom-0 left-0 p-6 text-white bg-gradient-to-t from-black/80 to-transparent w-full">
                <h3 class="text-2xl font-bold text-teal-300">Shoulder & Arms Day</h3>
            </div>
        </div>
    </div>

    <!-- Right Side Content -->
    <div class="lg:w-[400px] space-y-6 bg-gray-800 p-6 rounded-2xl shadow-lg">
        <div>
            <h2 class="text-4xl font-bold text-teal-300">Membership mulai dari Rp249.000/bulan</h2>
            <p class="mt-4 text-gray-300">Bebas olahraga di semua klub dengan fasilitas premium dan akses kelas FIT HUB
                sepuasnya</p>
        </div>

        <a href="{{ route('programs') }}"
            class="inline-block bg-teal-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-teal-700 transition-colors shadow-md">
            Lihat Program Latihan? →
        </a>
    </div>
</section>


<!-- Konten Teks -->
@php
    // Get the authenticated user
    $user = Auth::user();
    $hasActiveTransaction = false;

    if ($user) {
        // Get the latest transaction for the user
        $latestTransaction = $user->transaksis()->orderBy('created_at', 'desc')->first();

        // Check if the latest transaction is pending or completed
        if (
            $latestTransaction &&
            ($latestTransaction->status === 'pending' || $latestTransaction->status === 'completed')
        ) {
            $hasActiveTransaction = true;
        }
    }
@endphp

@if (!$hasActiveTransaction)
    <section class="relative w-full h-[500px] md:h-[600px] lg:h-[700px] overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('image/back.png') }}" alt="Gym Training"
                class="w-full h-full object-cover opacity-70 object-center" />
        </div>

        <!-- Overlay Transparan -->
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-6">
            <h2 class="text-4xl font-bold text-teal-300 mb-4">
                Latihan Premium Mulai Rp75.000/sesi
            </h2>
            <p class="text-gray-300 text-lg mb-8 max-w-xl">
                Bergabunglah dengan gym terbaik dan tingkatkan kekuatan serta daya tahan tubuh Anda dengan fasilitas
                modern!
            </p>
            <a href="{{ route('daftar-member') }}"
                class="inline-flex items-center gap-2 bg-teal-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-teal-700 transition-colors shadow-lg">
                Bergabung Sekarang
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </section>
@endif
<!-- resources/views/sections/hero.blade.php -->
<section class="container mx-auto px-4 py-12 bg-gray-900">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Find Your Reason Card -->
        <div class="relative h-80 overflow-hidden rounded-lg shadow-lg transform hover:translate-y-1 transition-transform">
            <div class="absolute inset-0">
                <img src="{{ asset('image/deadlift.png') }}" alt="Weight lifting" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            </div>
            <div class="relative h-full flex flex-col justify-end p-6 text-white">
                <h2 class="text-2xl font-bold mb-2 text-teal-300">FIND YOUR REASON</h2>
                <p class="mb-4 text-gray-300">It's your WHY that fuels your relentless determination and keeps you going.</p>
                <a href="#" class="text-teal-400 hover:text-teal-300 transition inline-block">Experience It Now</a>
            </div>
        </div>

        <!-- Personal Training Card -->
        <div class="relative h-80 overflow-hidden rounded-lg shadow-lg transform hover:translate-y-1 transition-transform">
            <div class="absolute inset-0">
                <img src="{{ asset('image/home3.png') }}" alt="Personal training" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            </div>
            <div class="relative h-full flex flex-col justify-end p-6 text-white">
                <h2 class="text-2xl font-bold mb-2 text-teal-300">PERSONAL TRAINING</h2>
                <p class="mb-4 text-gray-300">Unlock your full fitness potential with our Certified Fitness Coaches.</p>
                <a href="#" class="text-teal-400 hover:text-teal-300 transition inline-block">Learn More</a>
            </div>
        </div>

        <!-- Choose Your Classes Card -->
        <div class="relative h-80 overflow-hidden rounded-lg shadow-lg transform hover:translate-y-1 transition-transform">
            <div class="absolute inset-0">
                <img src="{{ asset('image/home1.png') }}" alt="Fitness classes" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            </div>
            <div class="relative h-full flex flex-col justify-end p-6 text-white">
                <h2 class="text-2xl font-bold mb-2 text-teal-300">CHOOSE YOUR CLASSES</h2>
                <p class="mb-4 text-gray-300">Gym newbie or getting back in the game, we've got a wide variety of classes to choose
                    from.</p>
                <a href="#" class="text-teal-400 hover:text-teal-300 transition inline-block">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Inspiration Section -->
<section class="container mx-auto px-4 py-16 bg-gray-900">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
            <h2 class="text-4xl font-bold leading-tight mb-4 text-teal-300">
                GET INSPIRED<br>
                GO FURTHER IN LIFE
            </h2>
            <p class="text-lg mb-6 text-gray-300">Here's what to expect when you join us now.</p>
            <a href="#" class="bg-teal-600 text-white px-6 py-3 rounded-md hover:bg-teal-700 inline-block shadow-md">
                Discover Our Membership Plans
            </a>
        </div>
        <div class="relative">
            <div class="relative h-96 rounded-lg overflow-hidden shadow-lg">
                <img src="{{ asset('image/bodybuilding.png') }}" alt="Gym equipment"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                <div class="absolute bottom-0 left-0 p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2 text-teal-300">ELEVATE YOUR FITNESS</h3>
                    <p class="text-gray-300">Workout at 11 state-of-the-art gyms nationwide.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Contact Us -->
<section id="contact" class="py-20 bg-gray-800 text-white text-center">
    <h2 class="text-4xl font-bold text-teal-300">Get in Touch</h2>
    <p class="mt-4 text-lg max-w-2xl mx-auto text-gray-300">Have questions? Contact us and we'll get back to you!</p>
    <form class="mt-10 max-w-xl mx-auto">
        <input type="text" placeholder="Your Name"
            class="w-full p-3 rounded-md bg-gray-900 border border-gray-700 text-white mb-4 focus:border-teal-400 focus:outline-none">
        <input type="email" placeholder="Your Email"
            class="w-full p-3 rounded-md bg-gray-900 border border-gray-700 text-white mb-4 focus:border-teal-400 focus:outline-none">
        <textarea placeholder="Your Message" class="w-full p-3 rounded-md bg-gray-900 border border-gray-700 text-white mb-4 focus:border-teal-400 focus:outline-none h-32"></textarea>
        <button type="submit" class="w-full px-4 py-3 bg-teal-600 rounded-md hover:bg-teal-700 transition-colors shadow-md">Send Message</button>
    </form>
</section>
<footer class="bg-gray-900 text-white py-12 border-t border-gray-800">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo dan Deskripsi -->
            <div>
                <h2 class="text-2xl font-bold text-teal-300">FITNESS HUB</h2>
                <p class="text-gray-400 mt-2">
                    Elevate your fitness journey with our state-of-the-art gyms and expert trainers.
                </p>
            </div>

            <!-- Navigasi Cepat -->
            <div>
                <h3 class="text-xl font-semibold mb-4 text-teal-300">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-teal-300 transition">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-teal-300 transition">Membership</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-teal-300 transition">Trainers</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-teal-300 transition">Contact Us</a></li>
                </ul>
            </div>

            <!-- Sosial Media -->
            <div>
                <h3 class="text-xl font-semibold mb-4 text-teal-300">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-teal-300 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-teal-300 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-teal-300 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-teal-300 transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-800 mt-8 pt-6 text-center text-gray-500 text-sm">
            © 2025 Fitness Hub. All rights reserved.
        </div>
    </div>
</footer>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Hero Slider</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <style>
        /* Custom styles */
        .content-overlay {
            background: linear-gradient(to right, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.4) 100%);
        }
        .feature-icon {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-icon:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body class="bg-gray-900 text-gray-100">

    @include('layouts.navbar')  
    
    <main class="panjang-maksimal overflow-x-hidden">
        <div class="relative flex justify-between items-center h-screen">
            <div id="slider-container" class="relative w-full h-full">
                <div id="content-wrapper" class="flex h-full w-full items-center">
                    <!-- First Slide -->
                    <div id="content-slider"
                        class="bg-[url('{{ asset('image/home3.png') }}')] bg-cover bg-center px-7 w-full h-full flex items-center min-w-full">
                        <div class="content-overlay absolute inset-0"></div>
                        <div class="w-full max-w-[1300px] mx-auto relative z-10">
                            <div class="relative flex flex-col gap-16 w-full">
                                <div class="text-white">
                                    <h1 class="text-5xl font-bold text-teal-300">Transform Your Body, Transform Your Life!</h1>
                                    <p class="mt-4 text-xl max-w-[50rem] z-50 relative text-gray-300">Join our state-of-the-art
                                        facility
                                        with expert trainers, premium equipment, and a supportive community to achieve
                                        your
                                        fitness goals!</p>
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-[155px] h-[155px] flex flex-col justify-center items-center gap-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Slide -->
                    <div
                        class="bg-[url('{{ asset('image/home2.png') }}')] bg-cover bg-center px-7 w-full h-full flex items-center min-w-full">
                        <div class="content-overlay absolute inset-0"></div>
                        <div class="w-full max-w-[1300px] mx-auto relative z-10">
                            <div class="relative flex flex-col gap-16 w-full">
                                <div class="text-white">
                                    <h1 class="text-5xl font-bold text-teal-300">Expert Personal Training</h1>
                                    <p class="mt-4 text-xl max-w-[50rem] text-gray-300">Get personalized workout plans and nutrition
                                        guidance from our certified trainers to maximize your results.</p>
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-[155px] h-[155px] flex flex-col justify-center items-center gap-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Third Slide -->
                    <div
                        class="bg-[url('{{ asset('image/home4.png') }}')] bg-cover bg-center px-7 w-full h-full flex items-center min-w-full">
                        <div class="content-overlay absolute inset-0"></div>
                        <div class="w-full max-w-[1300px] mx-auto relative z-10">
                            <div class="relative flex flex-col gap-16 w-full">
                                <div class="text-white">
                                    <h1 class="text-5xl font-bold text-teal-300">Premium Facilities</h1>
                                    <p class="mt-4 text-xl max-w-[50rem] text-gray-300">Access our modern equipment, spacious workout
                                        areas, and luxury amenities to enhance your fitness journey.</p>
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-[155px] h-[155px] flex flex-col justify-center items-center gap-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4 w-full absolute bottom-1/2 translate-y-[110%]">
                    <div class="container max-w-[1300px] mx-auto flex gap-4">
                        <a href="{{ route('membership.plans') }}"
                            class="bg-gray-800 text-teal-300 rounded-2xl w-[155px] h-[155px] flex flex-col justify-center items-center gap-2 hover:bg-gray-700 transition-colors border border-gray-700 feature-icon shadow-lg">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 2l-5.5 9h11L12 2zm0 3.5l3 5H9l3-5zM5 22h14v-3H5v3z"></path>
                            </svg>
                            <p class="text-[14px] font-medium">Membership Plans</p>
                        </a>
    
    
                        <a href="{{ route('health.calculator') }}"
                            class="bg-gray-800 text-teal-300 rounded-2xl w-[155px] h-[155px] flex flex-col justify-center items-center gap-2 hover:bg-gray-700 transition-colors border border-gray-700 feature-icon shadow-lg">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 3H15M9 3V7M15 3V7M9 7H15M3 7H21M3 21H21M3 7V21M21 7V21M7 11H11M13 11H17M7 15H11M13 15H17M7 19H11M13 19H17">
                                </path>
                            </svg>
                            <p class="text-[14px] font-medium">Health Calculator</p>
                        </a>
    
                        <a href="{{ route('merchandise.index') }}"
                            class="bg-gray-800 text-teal-300 rounded-2xl w-[155px] h-[155px] flex flex-col justify-center items-center gap-2 hover:bg-gray-700 transition-colors border border-gray-700 feature-icon shadow-lg">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                            <p class="text-[14px] font-medium"> Gym Merchandise & Suplemen</p>
                        </a>
    
    
                        <a href="/"
                            class="bg-gray-800 text-teal-300 rounded-2xl w-[155px] h-[155px] flex flex-col justify-center items-center gap-2 hover:bg-gray-700 transition-colors border border-gray-700 feature-icon shadow-lg">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16H16M3 9l9-6 9 6v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            </svg>
                            <p class="text-[14px] font-medium">Payment & Billing</p>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slider Dots -->
            <div class="flex gap-4 absolute bottom-10 right-1/2 translate-x-1/2">
                <div class="border-blue-500 border-2 !bg-gray-800 text-white py-1.5 px-1.5 rounded-3xl"></div>
                <div class="border-blue-500 border-2 !bg-gray-800 text-white py-1.5 px-1.5 rounded-3xl"></div>
                <div class="border-blue-500 border-2 !bg-gray-800 text-white py-1.5 px-1.5 rounded-3xl"></div>
            </div>
        </div>
    </main>

    @include('layouts.section')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const wrapper = document.getElementById('content-wrapper');
            const slides = wrapper.children;
            const dots = document.querySelectorAll('.flex.gap-4.absolute.bottom-10 > div');

            if (!wrapper || slides.length === 0) {
                console.error('Required elements not found');
                return;
            }

            let currentSlide = 0;
            let isAnimating = false;

            // Initial states
            gsap.set(wrapper, {
                x: 0
            });
            gsap.set(slides[0], {
                filter: 'blur(0px)'
            });
            gsap.set(slides[1], {
                filter: 'blur(8px)'
            });
            gsap.set(slides[2], {
                filter: 'blur(8px)'
            });

            function updateDots(index) {
                dots.forEach((dot, i) => {
                    if (i === index) {
                        dot.classList.remove('bg-gray-800');
                        dot.classList.add('bg-blue-500');
                        dot.classList.add('!border-blue-400');
                    } else {
                        dot.classList.remove('bg-blue-500');
                        dot.classList.remove('!border-blue-400');
                        dot.classList.add('bg-blue-800');
                    }
                });
            }

            function slideNext() {
                if (isAnimating) return;
                isAnimating = true;

                const nextSlide = (currentSlide + 1) % 3;
                const tl = gsap.timeline({
                    onComplete: () => {
                        isAnimating = false;
                    }
                });

                tl.to(slides[currentSlide], {
                    filter: 'blur(8px)',
                    duration: 1,
                    ease: "power2.inOut"
                }, 0)
                    .to(wrapper, {
                        x: `-${nextSlide * 100}%`,
                        duration: 2,
                        ease: "power2.inOut"
                    }, 0)
                    .to(slides[nextSlide], {
                        filter: 'blur(0px)',
                        duration: 1,
                        ease: "power2.inOut"
                    }, 1);

                currentSlide = nextSlide;
                updateDots(currentSlide);
            }

            setInterval(slideNext, 4500);
        });
    </script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

</html>
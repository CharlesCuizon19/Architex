@extends('layouts.guest')

@section('content')
@php
$heroes = [[
'title' => '',
'description' => '',
'button_text' => '',
'button_link' => '#',
'video' => '',
'fallback_image' => 'img/services/page-header.png',
]];

$breadcrumbs = [
'homepage' => 'Home',
'blogs' => 'Blogs',
'blog-single-page' => 'Single Blog',
];

$pageTitle = 'Blog Details';
@endphp

<section>
    @include('components.banner', [
    'banner_type' => 'other',
    'heroes' => $heroes,
    'breadcrumbs' => $breadcrumbs,
    'pageTitle' => $pageTitle,
    ])
</section>

<section class="w-full bg-[#fafafa] pt-20 pb-[20rem]">
    <div class="max-w-screen-xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-10 px-6">

        <!-- Left Content -->
        <div class="lg:col-span-2">
            <!-- Featured Image -->
            <img src="img/properties/first.png" alt="Main Blog Image" class="rounded-md w-full mb-6 shadow-md">

            <!-- Meta Info -->
            <div class="flex items-center gap-6 text-sm text-gray-600 mb-4">
                <div class="flex items-center gap-1">
                    <i class="fa-solid fa-user text-green-700"></i> <span>Admin</span>
                </div>
                <div class="flex items-center gap-1">
                    <i class="fa-solid fa-screwdriver-wrench text-green-700"></i> <span>Architect</span>
                </div>
                <div class="flex items-center gap-1">
                    <i class="fa-solid fa-calendar text-green-700"></i> <span>Mar 21, 2025</span>
                </div>
            </div>

            <!-- Title -->
            <h2 class="text-2xl md:text-3xl font-semibold text-[#355E3B] mb-4">
                Steel Fabrication: Strength Behind Every Structure
            </h2>

            <!-- Paragraph -->
            <p class="text-gray-700 leading-relaxed mb-6">
                In recent years, technology has rapidly transformed every aspect of our lives—from how we
                communicate, to how we work, to how we spend our leisure time. One of the most significant
                changes has taken place in our homes and communities, where innovation is redefining the
                very concept of living. Smart spaces are at the heart of this transformation, offering a new
                era of comfort, convenience, sustainability, and security.
            </p>

            <!-- Subheading -->
            <h3 class="text-xl font-semibold text-[#355E3B] mb-3">
                What Are Smart Spaces?
            </h3>
            <p class="text-gray-700 leading-relaxed mb-8">
                Smart spaces go beyond traditional homes. Efficient, eco-friendly, and user-optimized, they
                integrate technology to make everyday living seamless. Through automation, energy management,
                and data-driven insights, smart spaces promote better living and efficiency.
            </p>

            <!-- You Might Also Like Carousel -->
            <div class="mt-16">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-green-700 font-semibold text-lg">You Might Also Like</h3>
                    <div class="flex gap-2">
                        <button id="prevBtn" class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-300 hover:bg-gray-100 transition">
                            <i class="fa-solid fa-chevron-left text-gray-600 text-sm"></i>
                        </button>
                        <button id="nextBtn" class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-300 hover:bg-gray-100 transition">
                            <i class="fa-solid fa-chevron-right text-gray-600 text-sm"></i>
                        </button>
                    </div>
                </div>

                <!-- Carousel Container -->
                <div class="overflow-hidden relative">
                    <div id="carousel" class="flex gap-6 transition-transform duration-500 ease-in-out">
                        <!-- Card 1 -->
                        <div class="min-w-[280px] bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                            <img src="https://via.placeholder.com/300x200" alt="Smart Spaces" class="rounded-md w-full h-40 object-cover mb-3">
                            <p class="font-medium text-gray-800 mb-1">Smart Spaces: The Future of Modern Living</p>
                            <p class="text-sm text-gray-500 flex items-center gap-1 mb-1">
                                <i class="fa-solid fa-calendar text-green-700"></i> Mar 21, 2025
                            </p>
                            <a href="#" class="text-green-700 text-sm font-medium hover:underline flex items-center gap-1">
                                Read More <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>

                        <!-- Card 2 -->
                        <div class="min-w-[280px] bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                            <img src="https://via.placeholder.com/300x200" alt="Designing Exteriors" class="rounded-md w-full h-40 object-cover mb-3">
                            <p class="font-medium text-gray-800 mb-1">Designing Exteriors that Inspire Productivity</p>
                            <p class="text-sm text-gray-500 flex items-center gap-1 mb-1">
                                <i class="fa-solid fa-calendar text-green-700"></i> Feb 12, 2025
                            </p>
                            <a href="#" class="text-green-700 text-sm font-medium hover:underline flex items-center gap-1">
                                Read More <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>

                        <!-- Card 3 -->
                        <div class="min-w-[280px] bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                            <img src="https://via.placeholder.com/300x200" alt="Steel Strength" class="rounded-md w-full h-40 object-cover mb-3">
                            <p class="font-medium text-gray-800 mb-1">Steel Fabrication: Strength Behind Every Structure</p>
                            <p class="text-sm text-gray-500 flex items-center gap-1 mb-1">
                                <i class="fa-solid fa-calendar text-green-700"></i> Mar 10, 2025
                            </p>
                            <a href="#" class="text-green-700 text-sm font-medium hover:underline flex items-center gap-1">
                                Read More <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="space-y-10">
            <!-- Latest Posts (Component) -->
            @php
            $latestPosts = [
            [
            'title' => 'Steel Fabrication: Strength Behind Every Structure',
            'image' => 'https://via.placeholder.com/100x80',
            'date' => 'Jul 21, 2025',
            ],
            [
            'title' => 'Smart Spaces: The Future of Modern Living',
            'image' => 'https://via.placeholder.com/100x80',
            'date' => 'Jul 19, 2025',
            ],
            [
            'title' => 'Designing Exteriors that Inspire Productivity',
            'image' => 'https://via.placeholder.com/100x80',
            'date' => 'Jul 17, 2025',
            ],
            ];
            @endphp

            <x-latest-post :posts="$latestPosts" />

            <x-contact-box
                image="{{ asset('img/contact-us/image.png') }}"
                title="Need help with your reservation?"
                description="Call Us:"
                phone="(082) 299 2390"
                buttonText="Contact Now"
                buttonLink="{{ route('contactUs') }}" />

        </div>
    </div>
</section>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
    const carousel = document.getElementById('carousel');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    let scrollAmount = 0;

    nextBtn.addEventListener('click', () => {
        scrollAmount += 300;
        carousel.style.transform = `translateX(-${scrollAmount}px)`;
    });

    prevBtn.addEventListener('click', () => {
        scrollAmount = Math.max(0, scrollAmount - 300);
        carousel.style.transform = `translateX(-${scrollAmount}px)`;
    });
</script>
@endsection
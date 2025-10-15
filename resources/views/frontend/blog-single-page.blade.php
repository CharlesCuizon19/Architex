@extends('layouts.guest')

@section('content')
    <div>
        <x-banner2 page="Blog Details" breadcrumb="Blogs" breadcrumb2="{{ $blog->title }}" link="{{ route('blogs.show') }}"
            img="img/blog-banner.png" />
    </div>

    <section class="w-full bg-[#f3f3f3] pt-20 pb-[20rem]">
        <div class="container mx-auto">
            <div class="container grid grid-cols-1 gap-20 px-6 mx-auto lg:grid-cols-3">

                <!-- Left Content -->
                <div class="lg:col-span-2">
                    <!-- Featured Image -->
                    <img src="{{ asset($blog->image) }}" alt="Main Blog Image" class="w-full max-h-[40rem] mb-6 shadow-md">

                    <!-- Meta Info -->
                    <div class="flex items-center gap-6 pb-5 mb-4 text-sm text-gray-600 border-b">
                        <div class="flex items-center gap-1">
                            <i class="text-green-700 fa-solid fa-user"></i> <span>Admin</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 512 512"
                                class="text-green-800">
                                <path fill="currentColor"
                                    d="M404 0c19.2 0 37.6 7.6 51.1 21.2l35.7 35.7C504.4 70.4 512 88.8 512 108s-7.6 37.6-21.2 51.1L445.9 204L308 66.1l44.9-44.9C366.4 7.6 384.8 0 404 0M58.9 315.1L274.1 100L412 237.9L196.9 453.1c-10.7 10.7-24.1 18.5-38.7 22.6L30.4 511.1c-8.3 2.3-17.3 0-23.4-6.2s-8.5-15.1-6.2-23.4l35.6-127.7c4.1-14.6 11.8-27.9 22.6-38.7zM225.4 80.8L80.8 225.4l-69.1-69.1c-15.6-15.6-15.6-40.9 0-56.6l88-88c15.6-15.6 40.9-15.6 56.6 0l5.9 5.9l-56.3 56.3c-7.8 7.8-7.8 20.5 0 28.3s20.5 7.8 28.3 0l56.3-56.3zm205.8 205.8l34.9 34.9l-56.3 56.3c-7.8 7.8-7.8 20.5 0 28.3s20.5 7.8 28.3 0l56.3-56.3l5.9 5.9c15.6 15.6 15.6 40.9 0 56.6l-88 88c-15.6 15.6-40.9 15.6-56.6 0l-69.1-69.1z"
                                    stroke-width="6" stroke="currentColor" />
                            </svg>
                            <span>{{ $blog->category }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="text-green-700 fa-solid fa-calendar"></i>
                            <span>{{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }}
                            </span>
                        </div>
                    </div>

                    <!-- Title -->
                    <h2 class="text-2xl md:text-3xl font-semibold text-[#355E3B] mb-4">
                        {{ $blog->title }}
                    </h2>

                    <!-- Paragraph -->
                    <p class="mb-6 text-lg leading-relaxed text-gray-700">
                        {{ $blog->context }}
                    </p>
                </div>

                <!-- Right Sidebar -->
                <div class="space-y-14">
                    <div class="space-y-5">
                        <h3 class="mb-4 text-xl font-semibold text-green-700">Latest Posts</h3>
                        @foreach ($recentBlogs as $item)
                            <a href="{{ route('blogs.details', ['id' => $item->id]) }}"
                                class="flex items-center gap-5 transition duration-300 hover:bg-green-900/20">
                                <img src="{{ asset($item->image) ?? 'https://via.placeholder.com/100x80' }}"
                                    alt="{{ $item->title ?? 'Post Image' }}" class="object-cover h-20 w-28 ">
                                <div>
                                    <p class="mb-1 font-medium leading-tight text-gray-800">
                                        {{ $item->title }}
                                    </p>
                                    <p class="flex items-center gap-1 text-xs text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                            viewBox="0 0 48 48" class="text-green-950">
                                            <g fill="currentColor" stroke-width="1" stroke="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M17 25h-2v2h2zm-2-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zm10 2h-2v2h2zm-2-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zm10 2h-2v2h2zm-2-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zM17 33h-2v2h2zm-2-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zm10 2h-2v2h2zm-2-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zm10 2h-2v2h2zm-2-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2z"
                                                    clip-rule="evenodd" />
                                                <path fill-rule="evenodd"
                                                    d="M10 11a1 1 0 0 0-1 1v27a1 1 0 0 0 1 1h28c.55 0 1-.449 1-1.002V12.002c0-.554-.45-1.002-1-1.002h-3V9h3c1.658 0 3 1.347 3 3.002v26.996A3 3 0 0 1 38 42H10a3 3 0 0 1-3-3V12a3 3 0 0 1 3-3h5v2zm21 0H19V9h12z"
                                                    clip-rule="evenodd" />
                                                <path fill-rule="evenodd" d="M39 20H9v-2h30z" clip-rule="evenodd" />
                                                <path
                                                    d="M15 7a1 1 0 1 1 2 0v7a1 1 0 1 1-2 0zm16 0a1 1 0 1 1 2 0v7a1 1 0 1 1-2 0z" />
                                            </g>
                                        </svg>

                                        {{ \Carbon\Carbon::parse($item->date)->format('F d, Y') }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <x-contact-box image="{{ asset('img/contact-us/image.png') }}" title="Need help with your reservation?"
                        description="Call Us:" phone="(082) 299 2390" buttonText="Contact Now"
                        buttonLink="{{ route('contactUs') }}" />
                </div>
            </div>

            <div class="grid grid-cols-3 gap-20">
                <div class="col-span-2 mt-10">
                    <div class="container mx-auto">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-green-700">You Might Also Like</h3>
                            <div class="relative z-10 flex gap-2">
                                <div class="transition duration-300 cursor-pointer hover:scale-105 custom-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 9"
                                        class="p-1 text-sm text-green-900 border rounded-full size-10 border-black/50">
                                        <path fill="currentColor"
                                            d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5"
                                            stroke-width="0.2" stroke="currentColor" />
                                        <path fill="currentColor"
                                            d="M6 8.5a.47.47 0 0 1-.35-.15l-3.5-3.5c-.2-.2-.2-.51 0-.71L5.65.65c.2-.2.51-.2.71 0s.2.51 0 .71L3.21 4.51l3.15 3.15c.2.2.2.51 0 .71c-.1.1-.23.15-.35.15Z"
                                            stroke-width="0.2" stroke="currentColor" />
                                    </svg>
                                </div>
                                <div class="transition duration-300 cursor-pointer hover:scale-105 custom-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 9"
                                        class="p-1 text-sm text-green-900 border rounded-full size-10 border-black/50">
                                        <path fill="currentColor"
                                            d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5"
                                            stroke-width="0.2" stroke="currentColor" />
                                        <path fill="currentColor"
                                            d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z"
                                            stroke-width="0.2" stroke="currentColor" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Swiper -->
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($blogs as $item)
                                    <div class="min-h-full bg-white swiper-slide">
                                        <a href="{{ route('blogs.details', ['id' => $item->id]) }}"
                                            class="group bg-white rounded-sm shadow-sm hover:shadow-md transition overflow-visible border-b-4 border-transparent hover:border-[#253e16] duration-300">

                                            <div class="relative w-full h-64 overflow-hidden">
                                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}"
                                                    class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
                                            </div>

                                            <div class="relative z-20 flex justify-center">
                                                <div
                                                    class="absolute -top-5 bg-[#f3f3f3] text-[#253e16] text-sm px-2 py-3 flex items-center justify-between gap-2 shadow-lg w-[90%] max-w-md border border-gray-200 
                            transition-all duration-300 group-hover:bg-[#253e16] group-hover:text-white group-hover:border-[#253e16]">

                                                    <div
                                                        class="flex items-center justify-center w-1/2 gap-2 text-center border-r border-gray-400 group-hover:border-gray-500">
                                                        <span class="text-base mingcute--pencil-ruler-line"></span>
                                                        <span>{{ $item->category }}</span>
                                                    </div>

                                                    <div class="flex items-center justify-center w-1/2 gap-2 text-center">
                                                        <span class="text-base la--calendar-solid"></span>
                                                        <span>{{ \Carbon\Carbon::parse($item->date)->format('F d, Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="p-5 mt-6 text-center">
                                                <h3
                                                    class="mb-3 font-semibold text-gray-800 text-lg transition-colors duration-300 group-hover:text-[#253e16] line-clamp-2">
                                                    {{ $item->title }}
                                                </h3>
                                                <div
                                                    class="inline-block mt-2 text-[#253e16] font-medium hover:text-green-600 transition border-b border-b-[#253e16]">
                                                    Read More
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: ".custom-next",
                prevEl: ".custom-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 2
                },
            },
        });
    </script>
@endsection

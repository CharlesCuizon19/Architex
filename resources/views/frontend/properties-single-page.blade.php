@extends('layouts.guest')

@php
    $tabs = ['Overview', 'Sitemap', 'Amenities'];
    $lots = [
        ['id' => 12, 'size' => '150 sqm', 'price' => '₱2,800,000', 'status' => 'Available', 'color' => 'bg-green-600'],
        ['id' => 8, 'size' => '130 sqm', 'price' => '₱2,600,000', 'status' => 'Reserved', 'color' => 'bg-yellow-500'],
        ['id' => 3, 'size' => '140 sqm', 'price' => '₱2,700,000', 'status' => 'Sold', 'color' => 'bg-red-500'],
    ];
@endphp

@section('content')
    <!-- 🟢 Banner -->
    <div class="bg-[#f3f3f3]">
        <div>
            <x-banner2 page="Property Details" breadcrumb="Properties" breadcrumb2="Apo Yama Residences"
                link="{{ route('properties') }}" img="img/properties/page-header.png" />
        </div>

        <!-- 🟢 Header Image -->
        <section class="px-4 py-16 md:px-12">
            <div class="flex flex-col items-center justify-center mx-auto text-center max-w-screen-2xl">
                <img src="{{ asset('img/properties/apo-yama logo.png') }}" alt="" class="h-auto w-[25rem]">
                <h2 class="text-3xl md:text-2xl text-[#1E4D2B] mb-10">{{ $property->name }}</h2>
                <div class="overflow-hidden shadow-md">
                    <img src="{{ asset($property->img) }}" alt="{{ $property->name }}" class="object-cover w-full h-auto">
                </div>
            </div>
        </section>


        <!-- 🟢 Tabs Section -->
        <section class="pt-10 pb-[20rem] px-4 sm:px-6 lg:px-8" x-data="{
            tabs: @js($tabs),
            activeTab: 'Overview',
        }">
            <div class="mx-auto max-w-screen-2xl">

                <!-- Tabs -->
                <div class="flex justify-center mb-12 border-b border-gray-300">
                    <template x-for="tab in tabs" :key="tab">
                        <button @click="activeTab = tab"
                            class="px-4 pb-3 text-lg font-semibold transition duration-300 border-b-2"
                            :class="{
                                'text-green-900 border-green-700': activeTab === tab,
                                'text-gray-500 hover:text-green-900 border-transparent': activeTab !== tab
                            }">
                            <span x-text="tab"></span>
                        </button>
                    </template>
                </div>

                <!-- 🟢 Overview Tab -->
                <div x-show="activeTab === 'Overview'" x-transition>
                    <div>
                        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16">
                            <!-- Left -->
                            <div class="flex flex-col justify-center lg:col-span-5">
                                <h1 class="text-4xl font-bold text-[#537746] mb-6">{{ $property->name }}</h1>
                                <p class="mb-6 text-lg leading-relaxed text-gray-700">{{ $property->description }}</p>

                                @include('components.reserveModal')
                            </div>

                            <!-- Right Gallery -->
                            <div x-data="gallery({{ json_encode($property->images) }})" class="relative lg:col-span-7">
                                <!-- Main Image Container -->
                                <div class="relative w-full overflow-hidden bg-gray-200 aspect-video">
                                    <!-- Main Image -->
                                    <div class="relative w-full h-full group">
                                        <template x-for="(image, index) in images" :key="index">
                                            <img x-show="current === index" :src="'{{ asset('') }}' + image"
                                                class="object-cover object-center w-full h-full transition-all duration-500 ease-in-out">
                                        </template>

                                        <!-- Navigation Arrows -->
                                        <div class="absolute inset-0 flex items-center justify-between p-4">
                                            <button @click="prev"
                                                class="p-2 text-white transition rounded-full bg-black/50 hover:bg-black/70">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                                </svg>
                                            </button>
                                            <button @click="next"
                                                class="p-2 text-white transition rounded-full bg-black/50 hover:bg-black/70">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Hide/Show Button -->
                                        <div
                                            class="absolute bottom-0 z-20 transition ease-in-out transform -translate-x-1/2 translate-y-11 left-1/2 group-hover:-translate-y-[2px]">
                                            <button @click="showThumbs = !showThumbs"
                                                class="flex flex-col items-center gap-1 px-4 py-1 text-sm text-white transition">
                                                <svg x-show="!showThumbs" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                        d="M19 9l-7 7-7-7" />
                                                </svg>
                                                <svg x-show="showThumbs" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                        d="M5 15l7-7 7 7" />
                                                </svg>
                                                <span x-show="showThumbs">Hide All</span>
                                                <span x-show="!showThumbs">Show All</span>
                                            </button>
                                        </div>

                                        <!-- Thumbnails Overlay -->
                                        <div x-show="!showThumbs" x-transition:enter="transition ease-in-out duration-300"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-200"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="absolute bottom-0 z-10 grid w-full h-full grid-cols-5 gap-3 p-4 bg-gradient-to-t from-[#002B0A] to-transparent">
                                            <template x-for="(image, index) in images" :key="index">
                                                <div @click="current = index"
                                                    class="2xl:mt-[19rem] overflow-hidden transition border-2 border-yellow-400 cursor-pointer h-fit hover:opacity-80"
                                                    :class="current === index ? 'border-yellow-400' : 'border-transparent'">
                                                    <img :src="'{{ asset('') }}' + image"
                                                        class="object-cover w-full h-[6rem] aspect-square">
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 🟢 Sitemap Tab -->
                <div x-show="activeTab === 'Sitemap'" x-transition>
                    <x-property.sitemap-view :lots="$lots" :property="$property" />
                </div>

                <!-- 🟢 Amenities Tab -->
                <div x-show="activeTab === 'Amenities'" x-transition>
                    @include('components.property.amenities', ['images' => $property->amenities])
                </div>
            </div>
        </section>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        function gallery(images) {
            return {
                images,
                current: 0,
                showThumbs: true,
                next() {
                    this.current = (this.current + 1) % this.images.length;
                },
                prev() {
                    this.current = (this.current - 1 + this.images.length) % this.images.length;
                }
            };
        }
    </script>
@endsection

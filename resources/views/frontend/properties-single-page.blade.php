@extends('layouts.guest')

@section('content')
@php
// 🟢 Page Title & Header Image
$title = 'Apo Yama Residences';
$image = 'img/properties/single-page.png';

// 🟢 Hero Section Data
$heroes = [[
'title' => '',
'description' => '',
'button_text' => '',
'button_link' => '#',
'video' => '',
'fallback_image' => 'img/services/page-header.png',
]];

// 🟢 Breadcrumbs
$breadcrumbs = [
'homepage' => 'Home',
'properties' => 'Properties',
'properties-single-page' => 'Apo Yama Residences',
];

// 🟢 Page Title for Banner Component
$pageTitle = 'Services';

// 🟢 Property Information
$property = [
'name' => 'Apo Yama Residences',
'description_p1' => 'Offers a modern living experience designed with comfort, functionality, and elegance in mind. Each unit is thoughtfully crafted with spacious layouts, quality finishes, and a balance of style and practicality—perfect for families and individuals seeking a lasting home.',
'description_p2' => 'Surrounded by accessible amenities and a vibrant community, it’s more than just a residence—it’s a place where convenience and contemporary living come together.',
'button_text' => 'View Sitemap',
'button_link' => '#sitemap-link',
];

// 🟢 Tabs
$tabs = ['Overview', 'Sitemap', 'Amenities'];

// 🟢 Gallery Images
$images = [
['src' => asset('img/properties/first.png'), 'alt' => 'Main View'],
['src' => asset('img/properties/second.png'), 'alt' => 'Side View'],
['src' => asset('img/properties/third.png'), 'alt' => 'Interior View 1'],
['src' => asset('img/properties/fourth.png'), 'alt' => 'Interior View 2'],
['src' => asset('img/properties/second.png'), 'alt' => 'Exterior Night View'],
];

// 🟢 Lots Information
$lots = [
['id' => 12, 'size' => '150 sqm', 'price' => '₱2,800,000', 'status' => 'Available', 'color' => 'bg-green-600'],
['id' => 8, 'size' => '130 sqm', 'price' => '₱2,600,000', 'status' => 'Reserved', 'color' => 'bg-yellow-500'],
['id' => 3, 'size' => '140 sqm', 'price' => '₱2,700,000', 'status' => 'Sold', 'color' => 'bg-red-500'],
];

// 🟢 Amenities
$amenities = [
['src' => asset('img/amenities/pool.png'), 'alt' => 'Swimming Pool'],
['src' => asset('img/amenities/gym.png'), 'alt' => 'Fitness Gym'],
['src' => asset('img/amenities/playground.png'), 'alt' => 'Children’s Playground'],
];
@endphp


<!-- 🟢 Banner Section -->
<section>
    @include('components.banner', [
    'banner_type' => 'other',
    'heroes' => $heroes,
    'breadcrumbs' => $breadcrumbs,
    'pageTitle' => $pageTitle,
    ])
</section>

<!-- 🟢 Page Header Image -->
<section class="bg-white py-16 px-4 md:px-12">
    <div class="max-w-screen-2xl mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-[#1E4D2B] mb-10">{{ $title }}</h2>
        <div class="overflow-hidden shadow-md rounded-xl">
            <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-auto object-cover">
        </div>
    </div>
</section>

<!-- 🟢 Overview + Sitemap + Amenities Section -->
<section class="pt-10 pb-[20rem] px-4 sm:px-6 lg:px-8">
    <div
        x-data="{
            images: @js($images),
            tabs: @js($tabs),
            lots: @js($lots),
            amenities: @js($amenities),
            activeTab: '{{ $tabs[0] ?? 'Overview' }}',
            activeIndex: 0,
            activeLot: null,
            amenityIndex: 0,

            // Computed
            get activeImage() { return this.images[this.activeIndex].src },
            get activeAmenity() { return this.amenities[this.amenityIndex].src },

            // Image Gallery
            goToIndex(i) { this.activeIndex = i },
            nextImage() { this.activeIndex = (this.activeIndex + 1) % this.images.length },
            prevImage() { this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length },

            // Amenities Gallery
            goToAmenity(i) { this.amenityIndex = i },
            nextAmenity() { this.amenityIndex = (this.amenityIndex + 1) % this.amenities.length },
            prevAmenity() { this.amenityIndex = (this.amenityIndex - 1 + this.amenities.length) % this.amenities.length },

            // Lots
            selectLot(lot) { this.activeLot = lot },
            resetLot() { this.activeLot = null }
        }"
        class="max-w-screen-2xl mx-auto">

        <!-- Tabs -->
        <div class="flex justify-center border-b border-gray-300 mb-12">
            <template x-for="tab in tabs" :key="tab">
                <button
                    @click="activeTab = tab"
                    :class="{ 
                        'text-green-900 border-green-700': activeTab === tab, 
                        'text-gray-500 hover:text-green-900 border-transparent': activeTab !== tab 
                    }"
                    class="pb-3 px-4 text-lg font-semibold border-b-2 transition duration-300">
                    <span x-text="tab"></span>
                </button>
            </template>
        </div>

        <!-- Overview -->
        <div x-show="activeTab === 'Overview'" x-transition>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                <!-- Left -->
                <div class="lg:col-span-5 flex flex-col justify-center">
                    <h1 class="text-4xl font-bold text-[#537746] mb-6">{{ $property['name'] }}</h1>
                    <p class="text-gray-700 mb-6 leading-relaxed text-lg">{{ $property['description_p1'] }}</p>
                    <p class="text-gray-700 mb-8 leading-relaxed text-lg">{{ $property['description_p2'] }}</p>

                    <a href="#"
                        @click.prevent="activeTab = 'Sitemap'"
                        class="relative w-fit px-6 py-3 text-white font-medium rounded-sm overflow-hidden 
                              bg-green-900 group transition-all duration-300">
                        <span class="relative z-10">{{ $property['button_text'] }}</span>
                        <span class="absolute left-0 top-0 h-full w-0 bg-green-700 
                                     transition-all duration-500 ease-in-out group-hover:w-full pointer-events-none"></span>
                    </a>
                </div>

                <!-- Right Gallery -->
                <div class="lg:col-span-7">
                    <div class="relative w-full aspect-video mb-4 bg-gray-200 overflow-hidden">
                        <img :src="activeImage" :alt="images[activeIndex].alt"
                            class="object-cover w-full h-full transition duration-300 ease-in-out">

                        <div class="absolute inset-0 flex items-center justify-between p-4">
                            <button @click="prevImage" class="text-white p-2 rounded-full bg-black/50 hover:bg-black/70 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                            </button>
                            <button @click="nextImage" class="text-white p-2 rounded-full bg-black/50 hover:bg-black/70 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div x-show="images.length > 1" class="grid grid-cols-5 gap-3">
                        <template x-for="(image, index) in images" :key="index">
                            <div
                                @click="goToIndex(index)"
                                :class="{'border-4 border-yellow-400': index === activeIndex, 'border-transparent hover:border-yellow-400': index !== activeIndex}"
                                class="rounded-lg overflow-hidden transition cursor-pointer">
                                <img :src="image.src" :alt="image.alt" class="object-cover w-full h-full aspect-square">
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sitemap -->
        <div x-show="activeTab === 'Sitemap'" x-transition>
            <x-property.sitemap-view :lots="$lots" />
        </div>

        <!-- Amenities -->
        <div x-show="activeTab === 'Amenities'" x-transition>
            @include('components.property.amenities', ['images' => $amenities])
        </div>
    </div>
</section>

<!-- Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>
@endsection
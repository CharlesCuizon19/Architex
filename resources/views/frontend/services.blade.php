@extends('layouts.guest')

@section('content')
    @php
        // Example heroes data (you can make this dynamic too)
        $heroes = [
            [
                'title' => '',
                'description' => '',
                'button_text' => '',
                'button_link' => '#',
                'video' => '',
                'fallback_image' => 'img/services/page-header.png',
            ],
        ];

        $breadcrumbs = [
            'homepage' => 'Home',
            'services' => 'Services',
        ];

        $pageTitle = 'Services';
    @endphp

    <div>
        <x-banner2 page="Our Services" breadcrumb="Services" img="img/services/page-header.png" />
    </div>

    <!-- Services Section-->
    <section id="services" class="relative w-full pt-20 pb-[20rem] bg-white">
        <div class="relative z-10 max-w-screen-xl px-6 mx-auto text-center">
            <!-- Background Text -->
            <div
                class="absolute inset-x-0 z-0 text-6xl leading-none tracking-tight text-gray-400 select-none -top-1 md:text-7xl opacity-60 text-outline">

            </div>
            <p class="text-[#1E4D2B] font-bold mb-4 text-lg"></p>
            <h2 class="text-4xl md:text-4xl font-semibold text-[#1E4D2B] mb-12 tracking-tight">

            </h2>

            <div class="space-y-10">
                <x-service-card title="Property for Sale"
                    description="Invest in a property built to last. Our homes and spaces are crafted with durability, style, and value in mind, giving you the opportunity to own a place that matches both your lifestyle and future goals."
                    button-text="See All For Sale" button-link="{{ route('properties') }}" image="img/homepage/sale.png" />

                <x-service-card title="Property for Rent"
                    description="Flexible housing and property options designed for modern living. Our rental units offer comfort, convenience, and functionality—perfect for families, professionals, and businesses seeking quality spaces without long-term commitment."
                    button-text="See All For Rent" button-link="{{ route('rentals') }}" image="img/homepage/rent.png"
                    :reverse="true" />
            </div>
        </div>
    </section>
@endsection

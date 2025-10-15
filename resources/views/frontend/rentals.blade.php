@extends('layouts.guest')

@php
    $rentals = [
        (object) [
            'id' => 1,
            'title' => 'Awhag Area',
            'img' => 'img/properties/first.png',
        ],
        (object) [
            'id' => 2,
            'title' => 'Sasa Area',
            'img' => 'img/properties/second.png',
        ],
    ];
@endphp

@section('content')
    <div>
        <x-banner2 page="Rentals" breadcrumb="Rentals" img="img/rentals-banner.png" />

        <div class="h-full">
            <section class="bg-[#f3f3f3] pt-20 pb-[20rem] px-6 md:px-16">
                <div class="mx-auto max-w-screen-2xl">
                    <h2 class="text-3xl font-bold text-center text-[#1E4D2B] mb-10">
                        {{-- Optional section title --}}
                    </h2>

                    <!-- 2x2 Grid Layout -->
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                        @foreach ($rentals as $item)
                            <a href="{{ route('rental-details', ['id' => $item->id]) }}"
                                class="block relative overflow-hidden h-[500px] group shadow-md">

                                <img src="{{ asset($item->img) }}"
                                    class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#253e16]/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                <div
                                    class="absolute bottom-0 left-0 w-full p-6 text-white transition-all duration-500 translate-y-6 opacity-0 group-hover:opacity-100 group-hover:translate-y-0">
                                    <h3 class="text-2xl font-semibold">{{ $item->title }}</h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

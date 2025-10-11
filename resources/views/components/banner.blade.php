@props([
    'banner_type' => 'home', // default to 'home'
    'heroes' => '',
    'breadcrumbs' => [],
    'pageTitle' => 'Home', // default to 'Home'
])

@php
    // Determine banner dimensions based on type
    $bannerWidth = $banner_type === 'home' ? '1720px' : '100%';
    $bannerHeight = $banner_type === 'home' ? '900px' : '550px';
@endphp

<main class="relative">
    {{-- Banner Background --}}
    @include('components.layout.page-banner-layout')

    {{-- Overlay Hero Content --}}
    <section class="absolute right-0 flex items-center justify-center top-20"
        style="width: {{ $bannerWidth }}; height: {{ $bannerHeight }};">
        @include('components.cards.banner-card', ['heroes' => $heroes])
    </section>

    @if ($banner_type != 'home')
        <section
            class="absolute top-0 z-10 flex items-center justify-center text-6xl -translate-x-1/2  -bottom-12 left-1/2">
            {{ $pageTitle }}
        </section>
        <section class="absolute z-50 flex items-center justify-center -translate-x-1/2 -bottom-14 left-1/2">
            @include('components.breadcrumbs')
        </section>
    @endif
</main>

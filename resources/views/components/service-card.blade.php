@props([
'title' => 'Service Title',
'description' => 'Service description here...',
'buttonText' => 'Learn More',
'buttonLink' => '#',
'image' => '',
'reverse' => false,
])

<div class="grid grid-cols-1 md:grid-cols-2 items-center bg-white shadow-lg rounded-lg overflow-hidden">
    <!-- Left Content -->
    <div class="p-8 text-left {{ $reverse ? 'order-2 md:order-1' : '' }}">
        <h3 class="text-4xl font-semibold text-[#1E4D2B] mb-4">{{ $title }}</h3>
        <p class="text-gray-700 mb-6 leading-relaxed text-lg">
            {{ $description }}
        </p>
        <a href="{{ $buttonLink }}"
            class="inline-block bg-[#253e16] text-white px-6 py-3 rounded-md font-semibold hover:bg-[#256738] transition-all duration-300">
            {{ $buttonText }}
        </a>
    </div>

    <!-- Right Image with Angled Mask -->
    <div class="relative h-72 md:h-full {{ $reverse ? 'order-1 md:order-2' : '' }}">
        <div class="absolute inset-0 clip-diagonal">
            <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-full object-cover">
        </div>
    </div>
</div>
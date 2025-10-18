@props([
    'title' => 'Service Title',
    'description' => 'Service description here...',
    'buttonText' => 'Learn More',
    'buttonLink' => '#',
    'image' => '',
    'reverse' => false,
])

<div class="grid items-center grid-cols-1 overflow-hidden bg-white rounded-lg shadow-lg md:grid-cols-2">
    <!-- Left Content -->
    <div class="p-8 text-left">
        <h3 class="text-4xl font-semibold text-[#1E4D2B] mb-4">{{ $title }}</h3>
        <p class="mb-6 text-lg leading-relaxed text-gray-700">
            {{ $description }}
        </p>
        <a href="{{ $buttonLink }}"
            class="inline-block bg-[#253e16] text-white px-6 py-3 rounded-md font-semibold hover:bg-[#256738] transition-all duration-300">
            {{ $buttonText }}
        </a>
    </div>

    <!-- Right Image with Angled Mask -->
    <div class="relative h-72 md:h-full">
        <div class="absolute inset-0 clip-diagonal">
            <img src="{{ asset($image) }}" alt="{{ $title }}" class="object-cover w-full h-full">
        </div>
    </div>
</div>

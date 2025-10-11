@props(['src', 'caption' => ''])

<div class="relative min-w-[420px] h-[350px] overflow-hidden bg-gray-200 group">
    <!-- Image -->
    <img src="{{ $src }}"
        alt="{{ $caption }}"
        class="w-full h-full object-cover transition-transform duration-[3000ms] ease-linear group-hover:scale-105">

    <!-- Custom Dark Green Overlay (appears on hover) -->
    <div class="absolute inset-0 bg-gradient-to-t from-[#253e16]/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

    <!-- Caption (fades in on hover) -->
    @if ($caption)
    <div class="absolute bottom-4 left-4 text-white text-lg font-semibold drop-shadow-md opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
        {{ $caption }}
    </div>
    @endif
</div>
@props(['images' => []])

<section class="bg-[#f3f3f3] pt-20 pb-[20rem] px-6 md:px-16">
    <div class="max-w-screen-2xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-[#1E4D2B] mb-10">
            {{-- Optional section title --}}
        </h2>

        <!-- 2x2 Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($images as $index => $image)
            <a href="{{ $image['link'] ?? route('properties.single', ['id' => $index + 1]) }}"
                class="block relative overflow-hidden h-[500px] rounded-xl group shadow-md">

                <img
                    src="{{ asset($image['src']) }}"
                    alt="Project {{ $index + 1 }}"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                <!-- Custom Dark Green Overlay (appears on hover) -->
                <div class="absolute inset-0 bg-gradient-to-t from-[#253e16]/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                <!-- Title Text -->
                <div class="absolute bottom-0 left-0 w-full p-6 text-white opacity-0 group-hover:opacity-100 translate-y-6 group-hover:translate-y-0 transition-all duration-500">
                    <h3 class="text-2xl font-semibold">{{ $image['title'] ?? 'Project ' . ($index + 1) }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
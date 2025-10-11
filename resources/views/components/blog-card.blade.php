@props([
'image' => '',
'category' => '',
'date' => '',
'title' => '',
'link' => '#',
])

<div
    class="group bg-white rounded-sm shadow-sm hover:shadow-md transition overflow-visible border-b-4 border-transparent hover:border-[#253e16] duration-300">

    <!-- Image Wrapper -->
    <div class="relative w-full h-64 overflow-hidden">
        <img src="{{ asset($image) }}" alt="{{ $title }}"
            class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
    </div>

    <!-- Category & Date Bar -->
    <div class="relative z-20 flex justify-center">
        <div
            class="absolute -top-5 bg-[#f3f3f3] text-[#253e16] text-sm px-2 py-3 rounded-md flex items-center justify-between gap-2 shadow-lg w-[90%] max-w-md border border-gray-200 
                   transition-all duration-300 group-hover:bg-[#253e16] group-hover:text-white group-hover:border-[#253e16]">

            <!-- Category -->
            <div
                class="flex items-center justify-center gap-2 w-1/2 text-center border-r border-gray-400 group-hover:border-gray-500">
                <span class="mingcute--pencil-ruler-line text-base"></span>
                <span>{{ $category }}</span>
            </div>

            <!-- Date -->
            <div class="flex items-center justify-center gap-2 w-1/2 text-center">
                <span class="la--calendar-solid text-base"></span>
                <span>{{ $date }}</span>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="p-5 text-center mt-6">
        <h3
            class="mb-3 font-semibold text-gray-800 text-lg transition-colors duration-300 group-hover:text-[#253e16]">
            {{ $title }}
        </h3>
        <a href="{{ $link }}"
            class="inline-block mt-2 text-[#253e16] font-medium hover:text-green-600 transition">
            Read More →
        </a>
    </div>
</div>
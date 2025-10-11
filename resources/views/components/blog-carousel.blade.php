<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
    <img src="{{ asset($image) }}" alt="Blog Image" class="w-full h-56 object-cover">
    <div class="p-6">
        <div class="flex justify-between items-center bg-gray-100 px-4 py-2 rounded-md mb-4">
            <span class="flex items-center gap-2 text-green-900 text-sm font-medium">{{ $category }}</span>
            <span class="flex items-center gap-2 text-gray-600 text-sm">{{ $date }}</span>
        </div>
        <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-4">
            {{ $title }}
        </h3>
        <a href="{{ $link }}" class="text-green-900 font-semibold hover:underline">Read More</a>
    </div>
</div>
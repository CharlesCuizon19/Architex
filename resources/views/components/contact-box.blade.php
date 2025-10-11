<!-- resources/views/components/contact-box.blade.php -->
<div class="w-full max-w-sm bg-white  overflow-hidden shadow-md">
    <!-- Image -->
    <img src="{{ $image ?? 'https://via.placeholder.com/400x200' }}"
        alt="Contact Banner"
        class="w-full h-full object-cover">

    <!-- Content -->
    <div class="bg-[#495a46] text-white text-left py-6 px-5 relative">
        <h4 class="text-lg font-semibold mb-2">
            {{ $title ?? 'Need help with your reservation?' }}
        </h4>

        <p class="text-sm mb-5">
            {{ $description ?? 'Call Us:' }}
            <span class="font-medium">{{ $phone ?? '(082) 299 2390' }}</span>
        </p>

        <!-- Divider -->
        <div class="flex items-center justify-center mb-5">
            <div class="flex-1 border-t border-gray-400"></div>
            <span class="mx-3 text-gray-300 text-sm">or</span>
            <div class="flex-1 border-t border-gray-400"></div>
        </div>

        <!-- Button -->
        <a href="{{ $buttonLink ?? route('contactUs') }}"
            class="inline-block bg-[#ffd601] text-black font-medium px-6 py-3 rounded-sm hover:bg-yellow-400 transition">
            {{ $buttonText ?? 'Contact Now' }}
        </a>
    </div>
</div>
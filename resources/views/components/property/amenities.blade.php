<section
    x-data="{
        images: @js($images),
        activeIndex: 0,
        get activeImage() { return this.images[this.activeIndex].src },
        next() { this.activeIndex = (this.activeIndex + 1) % this.images.length },
        prev() { this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length },
    }"
    class="relative bg-white py-12">
    <div class="max-w-screen-2xl mx-auto px-4 md:px-8">
        <!-- Main Image Carousel -->
        <div class="relative overflow-hidden rounded-xl shadow-lg">
            <img
                :src="activeImage"
                class="w-full h-[700px] object-cover transition duration-500 ease-in-out">

            <!-- Dark Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent"></div>

            <!-- Arrows -->
            <button
                @click="prev"
                class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-3 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button
                @click="next"
                class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-3 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Thumbnails -->
        <div class="flex overflow-x-auto mt-4 gap-3 pb-3 scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100">
            <template x-for="(image, index) in images" :key="index">
                <div
                    class="relative cursor-pointer flex-shrink-0"
                    @click="activeIndex = index">
                    <img
                        :src="image.src"
                        :alt="image.alt"
                        class="w-36 h-24 object-cover rounded-md border-2 transition-all duration-300"
                        :class="activeIndex === index ? 'border-yellow-400 shadow-lg' : 'border-transparent hover:border-yellow-400'">
                </div>
            </template>
        </div>

        <!-- Virtual Tour Button -->
        <div class="text-center mt-8">
            <a href="#"
                class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-8 py-3 rounded-md shadow-md transition">
                Virtual Tour
            </a>
        </div>
    </div>
</section>
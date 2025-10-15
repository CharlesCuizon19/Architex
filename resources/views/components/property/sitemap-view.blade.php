@props(['lots' => []])

<div x-data="{
    activeTab: 'Sitemap',
    activeLot: null,
    lots: @js($lots),

    selectLot(lot) {
        // Create a detailed mockup per lot
        const mainImage = '{{ asset('img/homepage/image-1.png') }}';
        const gallery = [
            '{{ asset('img/homepage/image-2.png') }}',
            '{{ asset('img/homepage/image-3.png') }}',
            '{{ asset('img/homepage/image-4.png') }}',
            '{{ asset('img/homepage/image-5.png') }}',
        ];

        this.activeLot = {
            ...lot,
            name: 'SANDERIANA',
            address: 'Road Lot 3, Block 5 Lot ' + lot.id + ', Apo Yama Residences',
            type: 'Single Detached',
            category: 'Residential Lot',
            mainImage,
            gallery,
            description: `Block 4 Lot ${lot.id} is conveniently located near the main road with easy access 
                to community features. Perfect for families seeking a modern and secure neighborhood.`,
        };

        // Reset carousel to first image
        this.$nextTick(() => {
            this.$refs.carousel.currentIndex = 0;
            this.$refs.carousel.images = [mainImage, ...gallery];
        });
    },

    resetLot() { this.activeLot = null; },
}" class="w-full">

    <!-- Sitemap Section -->
    <div x-show="activeTab === 'Sitemap'" x-transition>
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">

            <!-- Left Panel: Lot Info -->
            <div class="bg-gray-50 p-8 rounded-lg shadow-inner text-left overflow-y-auto max-h-[90vh]">

                <!-- Default when no lot selected -->
                <template x-if="!activeLot">
                    <div class="text-center py-60">
                        <img src="{{ asset('img/properties/property-select.png') }}" alt="Select Lot"
                            class="object-contain w-32 h-32 mx-auto mb-6">
                        <h3 class="text-2xl font-bold text-[#1E4D2B] mb-3">Select a Lot to View Details</h3>
                        <p class="max-w-md mx-auto text-gray-600">
                            Click on any highlighted lot from the sitemap to view detailed information including
                            images, lot size, price, and availability.
                        </p>
                    </div>
                </template>

                <!-- When lot selected -->
                <template x-if="activeLot">
                    <div class="space-y-6">

                        <!-- Header -->
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="text-3xl font-bold text-[#1E4D2B]" x-text="activeLot.name"></h2>
                                <p class="mt-1 text-gray-600" x-text="activeLot.address"></p>
                                <span
                                    class="inline-block px-4 py-1 mt-3 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full"
                                    x-text="activeLot.type"></span>
                            </div>
                            <button
                                class="bg-[#1E4D2B] text-white text-sm font-medium px-6 py-2 rounded hover:bg-green-900 transition">
                                Floor Plan
                            </button>
                        </div>

                        <!-- 🖼️ Image Carousel -->
                        <div x-data="{
                            currentIndex: 0,
                            images: [],
                            prevImage() {
                                this.currentIndex = this.currentIndex === 0 ? this.images.length - 1 : this.currentIndex - 1;
                            },
                            nextImage() {
                                this.currentIndex = this.currentIndex === this.images.length - 1 ? 0 : this.currentIndex + 1;
                            }
                        }" x-ref="carousel" x-init="images = [activeLot.mainImage, ...activeLot.gallery]" class="relative w-full"
                            x-effect="if (activeLot) images = [activeLot.mainImage, ...activeLot.gallery]">
                            <!-- Main Image -->
                            <img :src="images[currentIndex]" alt="Main Image"
                                class="object-cover w-full transition duration-500 ease-in-out h-80">

                            <!-- Left Arrow -->
                            <button @click="prevImage"
                                class="absolute p-2 text-white transition -translate-y-1/2 bg-black bg-opacity-50 rounded-full top-1/2 left-4 hover:bg-opacity-70">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                            </button>

                            <!-- Right Arrow -->
                            <button @click="nextImage"
                                class="absolute p-2 text-white transition -translate-y-1/2 bg-black bg-opacity-50 rounded-full top-1/2 right-4 hover:bg-opacity-70">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>

                            <!-- Thumbnails -->
                            <div class="flex justify-center gap-2 mt-4 overflow-x-auto">
                                <template x-for="(img, i) in images" :key="i">
                                    <img :src="img" @click="currentIndex = i"
                                        :class="{
                                            'border-4 border-green-600': i === currentIndex,
                                            'border-2 border-transparent': i !== currentIndex
                                        }"
                                        class="object-cover w-20 h-20 transition rounded cursor-pointer hover:opacity-80">
                                </template>
                            </div>
                        </div>

                        <!-- Info Grid -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div class="p-4 bg-white border border-gray-200 rounded-md">
                                <p class="mb-1 text-sm text-gray-600">Lot Area</p>
                                <p class="text-xl font-semibold text-gray-800" x-text="activeLot.size"></p>
                            </div>

                            <div class="p-4 bg-white border border-gray-200 rounded-md">
                                <p class="mb-1 text-sm text-gray-600">Type</p>
                                <p class="text-xl font-semibold text-gray-800" x-text="activeLot.category"></p>
                            </div>

                            <div class="p-4 bg-white border border-gray-200 rounded-md">
                                <p class="mb-1 text-sm text-gray-600">Price</p>
                                <p class="text-xl font-semibold text-gray-800" x-text="activeLot.price"></p>
                            </div>

                            <div class="p-4 bg-white border border-gray-200 rounded-md">
                                <p class="mb-1 text-sm text-gray-600">Status</p>
                                <p class="text-xl font-semibold"
                                    :class="{
                                        'text-green-700': activeLot.status === 'Available',
                                        'text-yellow-600': activeLot.status === 'Reserved',
                                        'text-red-600': activeLot.status === 'Sold'
                                    }"
                                    x-text="activeLot.status"></p>
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <h3 class="mb-2 text-lg font-semibold text-gray-800">Description</h3>
                            <p class="leading-relaxed text-gray-700" x-text="activeLot.description"></p>
                        </div>

                        <button @click="resetLot()" class="font-semibold text-green-800 hover:underline">
                            ← Back to Selection
                        </button>
                    </div>
                </template>
            </div>

            <!-- Right Panel: Sitemap -->
            <div class="relative overflow-hidden bg-white shadow-md">
                <img src="{{ asset('img/properties/site-map.png') }}" alt="Sitemap"
                    class="object-contain w-full h-auto">

                <!-- Clickable lots -->
                <template x-for="(lot, index) in lots" :key="index">
                    <div @click="selectLot(lot)"
                        :class="[lot.color,
                            'absolute w-10 h-10 rounded-full flex items-center justify-center text-white font-semibold cursor-pointer transition transform hover:scale-110'
                        ]"
                        :style="'top:' + (30 + index * 15) + '%; left:' + (35 + index * 10) + '%;'" x-text="lot.id">
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>

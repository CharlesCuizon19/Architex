@props([
    'lots' => [],
    'property' => [],
])

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
            highlights: 'Total of 4 Bedrooms (including guest room)'
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
            <div class="bg-white p-8 rounded-lg shadow-inner text-left max-h-[90vh] overflow-y-auto h-fit">

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

                <div x-data="{ showFloorPlan: false }">
                    <!-- When lot selected -->
                    <template x-if="activeLot">
                        <div class="space-y-6 transition-all duration-500 ease-in-out"
                            :class="{
                                'relative z-10 w-full': !showFloorPlan,
                                'absolute inset-0 z-0 opacity-0 pointer-events-none': showFloorPlan
                            }"
                            x-ref="lotContent">

                            <button @click="resetLot()"
                                class="flex items-center gap-1 font-semibold text-green-800 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m4 10l-.354.354L3.293 10l.353-.354zm16.5 8a.5.5 0 0 1-1 0zM8.646 15.354l-5-5l.708-.708l5 5zm-5-5.708l5-5l.708.708l-5 5zM4 9.5h10v1H4zM20.5 16v2h-1v-2zM14 9.5a6.5 6.5 0 0 1 6.5 6.5h-1a5.5 5.5 0 0 0-5.5-5.5z"
                                        stroke-width="0.5" stroke="currentColor" />
                                </svg>
                                <div>
                                    Back to Selection
                                </div>
                            </button>

                            <!-- Header -->
                            <div class="flex items-start justify-between">
                                <div>
                                    <h2 class="text-3xl font-bold text-[#1E4D2B]" x-text="activeLot.name"></h2>
                                    <p class="mt-1 text-gray-600" x-text="activeLot.address"></p>
                                    <span
                                        class="inline-block px-4 py-1 mt-3 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full"
                                        x-text="activeLot.type"></span>
                                </div>
                                <button @click="showFloorPlan = !showFloorPlan"
                                    class="bg-[#1E4D2B] text-white text-sm font-medium px-6 py-3 hover:bg-green-900 transition"
                                    x-text="showFloorPlan ? 'Back to Lot' : 'Floor Plan'">
                                </button>
                            </div>

                            <!-- 🖼️ Image Carousel -->
                            <x-image-gallery :images="$property->house_details" />


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
                        </div>
                    </template>

                    <!-- Floor Plan Div - Slides over when button clicked -->
                    <div class="relative z-10 flex flex-col w-full h-full gap-5 transition-all duration-500 ease-in-out bg-white"
                        :class="{
                            'translate-x-full opacity-0 pointer-events-none hidden': !showFloorPlan,
                            'translate-x-0 opacity-100': showFloorPlan
                        }">

                        <div class="flex items-center justify-between">
                            <!-- Header with back button -->
                            <div class="flex items-start justify-between">
                                <button @click="showFloorPlan = false"
                                    class="flex items-center gap-2 mb-4 text-sm font-medium text-gray-600 hover:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="m4 10l-.354.354L3.293 10l.353-.354zm16.5 8a.5.5 0 0 1-1 0zM8.646 15.354l-5-5l.708-.708l5 5zm-5-5.708l5-5l.708.708l-5 5zM4 9.5h10v1H4zM20.5 16v2h-1v-2zM14 9.5a6.5 6.5 0 0 1 6.5 6.5h-1a5.5 5.5 0 0 0-5.5-5.5z"
                                            stroke-width="0.5" stroke="currentColor" />
                                    </svg>
                                    Back
                                </button>
                            </div>
                            <div class="flex gap-5">
                                <div
                                    class="bg-[#ffd601] px-5 py-3 transition duration-300 ease-in-out hover:bg-[#ffe350] cursor-pointer">
                                    Virtual Tours
                                </div>
                                @include('components.reserveModal')
                            </div>
                        </div>

                        <!-- Your existing floor plan content -->
                        <div class="flex-1">
                            <x-image-gallery :images="$property->floor_plan" />
                        </div>

                        <!-- Floor plan info section -->
                        <div class="flex flex-col gap-5 text-[#253e16] pb-6">
                            <div class="text-sm font-light">
                                Floor Plan
                            </div>
                            <div x-text="activeLot?.name || 'Floor Plan'" class="mb-2 text-xl font-medium">
                            </div>
                            <div class="flex flex-col gap-4">
                                <div class="text-sm font-bold">Description</div>
                                <div x-text="activeLot?.description || 'Floor plan description'" class="mb-2 text-base">
                                </div>
                                <div class="text-sm font-bold">Highlights</div>
                                <div x-text="activeLot?.highlights || ''"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel: Sitemap -->
            <div class="relative overflow-hidden">
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

<div>

</div>

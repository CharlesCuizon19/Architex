@props([
    'lots' => [],
    'property' => [],
])

<div x-data="{
    activeTab: 'Sitemap',
    activeLot: null,
    lots: @js($lots),

    selectLot(lot) {
        this.activeLot = {
            ...lot,
            name: lot.name,
            address: lot.address,
            type: lot.type,
            category: lot.category,
            description: lot.description,
            highlights: lot.highlights,
            house_details: lot.house_details,
        };

        this.$nextTick(() => {
            if (galleryComponent && lot.house_details) {
                galleryComponent.house_details = lot.house_details;
                galleryComponent.current = 0;
            }
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

                            {{-- <button @click="resetLot()"
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
                            </button> --}}

                            <!-- Header -->
                            <div class="flex items-start justify-between">
                                <div>
                                    <h2 class="text-3xl font-bold text-[#1E4D2B]" x-text="activeLot.name"></h2>
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 12 12" class="text-[#1E4D2B]">
                                            <path fill="currentColor"
                                                d="M6 .5A4.5 4.5 0 0 1 10.5 5c0 1.863-1.42 3.815-4.2 5.9a.5.5 0 0 1-.6 0C2.92 8.815 1.5 6.863 1.5 5A4.5 4.5 0 0 1 6 .5m0 3a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                                        </svg>
                                        <p class="mt-1 text-gray-600" x-text="activeLot.address"></p>
                                    </div>
                                    <span
                                        class="inline-block px-4 py-1 mt-3 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full"
                                        x-text="activeLot.type"></span>
                                </div>
                                <button @click="showFloorPlan = !showFloorPlan"
                                    class="bg-[#1E4D2B] text-white text-sm font-medium px-6 py-3 hover:bg-green-900 transition"
                                    x-text="showFloorPlan ? 'Back to Lot' : 'Floor Plan'">
                                </button>
                            </div>

                            <div>
                                <div x-data="gallery2([])" x-init="$watch('activeLot', value => {
                                    if (value && value.house_details) {
                                        galleryComponent.house_details = value.house_details;
                                        galleryComponent.current = 0;
                                    }
                                })" x-ref="galleryWrapper"
                                    class="relative z-10 lg:col-span-7">
                                    <!-- Main Image Container -->
                                    <div class="relative w-full overflow-hidden bg-gray-200 aspect-video">
                                        <!-- Main Image -->
                                        <div class="relative w-full h-full group">
                                            <template x-for="(image, index) in house_details" :key="index">
                                                <img x-show="current === index" :src="'{{ asset('') }}' + image"
                                                    class="object-contain object-center w-full h-full transition-all duration-500 ease-in-out">
                                            </template>

                                            <!-- Navigation Arrows -->
                                            <div class="absolute inset-0 flex items-center justify-between p-4">
                                                <button @click="prev"
                                                    class="p-2 text-white transition rounded-full bg-black/50 hover:bg-black/70">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                                    </svg>
                                                </button>
                                                <button @click="next"
                                                    class="p-2 text-white transition rounded-full bg-black/70 hover:bg-black/70">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Hide/Show Button -->
                                            <div
                                                class="absolute bottom-0 z-20 transition ease-in-out transform -translate-x-1/2 translate-y-11 left-1/2 group-hover:-translate-y-[2px]">
                                                <button @click="showThumbs = !showThumbs"
                                                    class="flex flex-col items-center gap-1 px-4 py-1 text-sm text-white transition">
                                                    <svg x-show="!showThumbs" xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3" d="M19 9l-7 7-7-7" />
                                                    </svg>
                                                    <svg x-show="showThumbs" xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3" d="M5 15l7-7 7 7" />
                                                    </svg>
                                                    <span x-show="showThumbs">Hide All</span>
                                                    <span x-show="!showThumbs">Show All</span>
                                                </button>
                                            </div>

                                            <!-- Thumbnails Overlay -->
                                            <div x-show="!showThumbs"
                                                x-transition:enter="transition ease-in-out duration-300"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="transition ease-in duration-200"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                                class="absolute bottom-0 z-10 grid w-full h-full grid-cols-5 gap-3 p-4 bg-gradient-to-t from-[#002B0A] to-transparent">
                                                <template x-for="(image, index) in house_details"
                                                    :key="index">
                                                    <div @click="current = index"
                                                        class="2xl:mt-[15rem] overflow-hidden transition border-2 border-yellow-400 cursor-pointer h-fit hover:opacity-80"
                                                        :class="current === index ? 'border-yellow-400' : 'border-transparent'">
                                                        <img :src="'{{ asset('') }}' + image"
                                                            class="object-cover w-full h-[6rem] aspect-square">
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
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
                            <div>
                                <h3 class="mb-2 text-lg font-semibold text-gray-800">Highlights</h3>
                                <p class="leading-relaxed text-gray-700" x-text="activeLot.highlights"></p>
                            </div>
                        </div>
                    </template>

                    <!-- Floor Plan Div - Slides over when button clicked -->
                    <div class="relative z-10 flex flex-col w-full h-full gap-5 bg-white"
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
                            <x-image-gallery :images="$property['floor_plan']" />
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
                                <div x-text="activeLot?.description || 'Floor plan description'"
                                    class="mb-2 text-base">
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
                        :class="[
                            lot.color,
                            'absolute w-10 h-10 rounded-full flex items-center justify-center text-white font-semibold cursor-pointer transition transform hover:scale-110 '
                        ]"
                        :style="'top:' + (30 + index * 15) + '%; left:' + (35 + index * 10) + '%;'" x-text="lot.id">
                    </div>

                </template>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('gallery2', (initialImages = []) => ({
            house_details: initialImages,
            current: 0,
            showThumbs: true,

            init() {
                // register this instance globally so the parent can access it
                galleryComponent = this;
            },
            next() {
                this.current = (this.current + 1) % this.house_details.length;
            },
            prev() {
                this.current = (this.current - 1 + this.house_details.length) % this.house_details
                    .length;
            }
        }))
    })
</script>

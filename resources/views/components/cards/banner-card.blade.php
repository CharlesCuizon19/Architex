@props([
    'banner_type' => 'home',
    'heroes' => [],
])


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

{{-- FIXED: Removed conditional width and set width via Tailwind class 'w-full' --}}
<section class="w-full mt-16 2xl:mt-0">
    <div>
        <div>
            <div class="relative w-auto h-full 2xl:w-full swiper">
                <div class="absolute z-50 w-full">
                    <div class="container mx-auto">
                        {{-- <x-layout.navbar /> --}}
                        <x-header2 />
                    </div>
                </div>
                <div class="h-full swiper-wrapper ">
                    @foreach ($heroes as $hero)
                        <div class="relative w-auto 2xl:h-full 2xl:w-full swiper-slide">
                            @if (!empty($hero['video']))
                                <div class="relative w-full h-full 2xl:w-full">
                                    <div>
                                        <video autoplay loop muted class="object-cover w-full h-[30rem] 2xl:h-[55rem]">
                                            <source src="{{ asset($hero['video']) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        {{-- <img src="{{ asset('img/homepage/sample-banner.png') }}" alt=""
                                            class="object-cover w-full h-full"> --}}
                                    </div>
                                    <div class="absolute inset-0 z-50 h-full">
                                        <div {{-- Adjusted pl-[10rem] to use Tailwind's responsive grid/container approach, aligning content to the left of the main white section on the homepage --}}
                                            class="flex flex-col justify-center h-full px-4 mx-auto space-y-5 max-w-screen-2xl sm:px-6 lg:px-8">

                                            {{-- NOTE: For the homepage, the content needs to be positioned only within the white area (approx 75% of the screen). You may need to wrap this content in a w-3/4 or w-2/3 div if it still overflows the intended column. --}}
                                            <h1 class="text-5xl font-bold leading-tight text-green-900 2xl:text-7xl">
                                                {!! $hero['title'] !!}
                                            </h1>
                                            <p class="w-1/2 mt-4 text-xl text-green-900">{{ $hero['description'] }}</p>
                                            @if (!empty($hero['button_text']))
                                                <a href="{{ $hero['button_link'] ?? '#' }}"
                                                    class="px-6 py-3 mt-6 text-white bg-green-900 w-fit">
                                                    {{ $hero['button_text'] }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- <img src="{{ asset('img/homepage/sample-banner.png') }}" alt=""
                                    class="object-cover h-full"> --}}
                            @elseif(!empty($hero['fallback_image']))
                                <img src="{{ asset($hero['fallback_image']) }}"
                                    class="absolute inset-0 object-cover w-full h-full" alt="Hero Background">
                            @endif

                            @if ($banner_type === 'home')
                                {{-- Adjusted gradient to go from white to transparent on the right, as seen in the home image --}}
                                <div
                                    class="absolute inset-0 z-20 bg-gradient-to-r from-white via-white/20 to-transparent">
                                </div>
                                <div class="h-full z-10 bg-[#717171]/30 absolute inset-0"></div>
                            @endif
                        </div>
                    @endforeach
                </div>

                @if ($banner_type === 'home')
                    {{-- Moved buttons to the bottom right of the banner area --}}
                    <div class="absolute bottom-0 right-0 z-20 flex justify-between gap-2 p-5 bg-white">
                        <div
                            class="flex items-center justify-center w-12 h-12 text-[#00721B] transition-all duration-300 ease-in-out bg-white border border-gray-300 rounded-full shadow-lg cursor-pointer custom-swiper-button-prev bg-opacity-70 hover:bg-gray-700 hover:border-green-500 hover:scale-105 group">
                            <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </div>

                        <div
                            class="flex items-center justify-center w-12 h-12 text-[#00721B] transition-all duration-300 ease-in-out bg-white border border-gray-300 rounded-full shadow-lg cursor-pointer custom-swiper-button-next bg-opacity-70 hover:bg-gray-700 hover:border-green-500 hover:scale-105 group">
                            <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>


</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        loop: true,
        speed: 800, // slide transition speed in ms
        navigation: {
            nextEl: '.custom-swiper-button-next',
            prevEl: '.custom-swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        // effect: 'slide' is default, so no need to specify
    });
</script>

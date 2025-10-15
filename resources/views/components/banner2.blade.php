@props([
    'page' => 'title',
    'parent_page' => 'Home',
    'breadcrumb' => 'title',
    'breadcrumb2' => '',
    'link' => '#',
    'img' => '',
])

<div>
    <div class="flex flex-col">
        <div class="grid grid-cols-2">
            <div class="bg-[#253E16]">
                <section class="2xl:ml-[9rem] flex gap-10 py-8 text-white lg:px-10 2xl:gap-52">
                    <div class="flex items-center gap-2 lg:gap-5 ">
                        <span class="p-3 ic--baseline-phone"></span>
                        <div>(082) 299 2390</div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="p-3 material-symbols--mail"></span>
                        <div>architexphilinc@gmail.com</div>
                    </div>
                </section>
            </div>
            <div class="flex items-center justify-end bg-white">
                <section class="px-10 py-2 2xl:mr-[9rem]">
                    <div class="flex gap-2">
                        <span class="tdesign--location-filled text-[#00721B] p-3"></span>
                        <div>
                            Door 102, API Building, Block 8 Lot 15, Talisay St., Awhag Subd., Davao City
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="relative">
            <div>
                <img src="{{ asset($img) }}" alt="" class="object-cover w-full h-auto">
            </div>

            <div class="flex items-center justify-center absolute inset-0 text-[#253E16] text-7xl font-medium">
                <div>
                    {{ $page }}
                </div>
            </div>

            <div
                class="flex items-center w-full -bottom-5  justify-center absolute text-[#253E16] text-md font-medium z-20">
                <div class="flex items-center gap-3 px-6 py-2 bg-white h-fit w-fit shadow-[#253E16] shadow-md">
                    <a href="{{ route('homepage') }}" class="hover:text-green-600">
                        {{ $parent_page }}
                    </a>
                    <div class="text-xl font-semibold">
                        >
                    </div>
                    @if ($link === '#')
                        <div>
                            {{ $breadcrumb }}
                        </div>
                    @else
                        <a href="{{ $link }}">
                            {{ $breadcrumb }}
                        </a>
                    @endif
                    <div class="{{ $breadcrumb2 ? 'flex' : 'hidden' }} text-xl font-semibold">
                        >
                    </div>
                    <div class="{{ $breadcrumb2 ? 'flex' : 'hidden' }}">
                        {{ $breadcrumb2 }}
                    </div>
                </div>
            </div>

            <div class="absolute top-0 z-20 flex w-full 2xl:justify-center">
                <div class="w-full">
                    <x-header2 />
                </div>
            </div>
        </div>
    </div>
</div>

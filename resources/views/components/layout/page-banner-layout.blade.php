<section class="relative grid grid-cols-2
    {{ request()->routeIs('homepage') ? 'h-[1200px]' : 'h-[600px]' }}">

    <div class="
        relative py-5 px-2 bg-[#253e16]">

        <div class="">
            <img src="{{ asset('img/homepage/bg-1.png') }}"
                class="absolute inset-0 object-cover object-bottom w-full h-full mix-blend-multiply" alt="Background">
        </div>
        <div class="absolute inset-0">
            <section class="flex py-8 text-white lg:px-10 2xl:ml-[15rem] gap-20 2xl:gap-52">
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
        <div
            class="absolute 2xl:grid items-center justify-center flex 2xl:grid-cols-1 top-[] 2xl:top-[30%] gap-10 px-10">
            <div class="flex flex-col items-center gap-10">
                <span class="text-sm tracking-widest -rotate-90 text-white origin-center transform scale-y-[1]">
                    Follow Us
                </span>
            </div>

            <!-- Social Icons -->
            <div class="flex items-center gap-4 2xl:flex-col">
                <span class="w-px h-6 bg-white"></span>
                <a href="#"
                    class="flex items-center justify-center w-10 h-10 text-green-900 bg-yellow-400 rounded-full">
                    <i class="p-3 ri--facebook-fill"></i>
                </a>
                <a href="#" class="flex items-center justify-center w-10 h-10 bg-green-800 rounded-full">
                    <i class="mingcute--instagram-fill p-3 text-[#00C52F]"></i>
                </a>
                <a href="#" class="flex items-center justify-center w-10 h-10 bg-green-900 rounded-full">
                    <i class="ic--baseline-tiktok p-3 text-[#00C52F]"></i>
                </a>
                <span class="w-px h-6 bg-white"></span>
            </div>
        </div>
    </div>

    <!-- ✅ Right White Section -->
    <div class=" 
        {{ request()->routeIs('homepage') ? 'h-[400px]' : 'h-[20px]' }} 
        px-2 py-5 bg-white">
        <div class="xl:block">
            <section class="px-10 py-2">
                <div class="flex gap-2">
                    <span class="tdesign--location-filled text-[#00721B] p-3"></span>
                    <div>
                        Door 102, API Building, Block 8 Lot 15, Talisay St., Awhag Subd., Davao City
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

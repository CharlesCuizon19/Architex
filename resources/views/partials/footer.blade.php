<!-- Footer -->
<footer class="bg-[#e8e8e8] border-t border-gray-200 relative z-0">

    <!-- Background Image Left -->
    <div class="absolute left-0 top-0 pointer-events-none z-0 mix-blend-multiply">
        <img src="{{ asset('img/footer/first.png') }}" alt="" class="w-full h-full object-contain">
    </div>

    <!-- Background Image Right -->
    <div class="absolute right-0 top-0 pointer-events-none z-0 mix-blend-multiply">
        <img src="{{ asset('img/footer/second.png') }}" alt="" class="w-full h-full object-contain">
    </div>

    <!-- Newsletter -->
    <div class="-mt-52 max-w-screen-xl mx-auto ">
        <div class="bg-[#253e16] text-white shadow-lg grid md:grid-cols-2 gap-0 items-stretch overflow-hidden">
            <!-- Text -->
            <div class="p-10 flex flex-col justify-center">
                <h2 class="text-4xl font-semibold mb-6">Subscribe to Newsletter!</h2>
                <p class="text-gray-200 mb-6">
                    From project highlights and innovative solutions to company news and industry trends,
                    our newsletter keeps you updated on everything that shapes the future of modern spaces.
                </p>
                <!-- Wider form -->
                <form class="flex w-full lg:w-full">
                    <input type="email" placeholder="Enter your email address"
                        class="w-full p-3 text-black rounded-l-md focus:outline-none">
                    <button type="submit"
                        class="bg-yellow-400 px-6 py-3 rounded-r-md font-semibold hover:bg-yellow-500">
                        Subscribe Now
                    </button>
                </form>
            </div>
            <!-- Full Image -->
            <div class="flex justify-end items-end">
                <img src="img/footer/newsletter.png"
                    alt="Newsletter"
                    class="w-100 h-full object-cover object-right">
            </div>
        </div>
    </div>

    <!-- Footer Content -->
    <div class="max-w-screen-xl mx-auto py-16 text-black mt-10">

        <!-- Logo + Socials -->
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start">
            <img src="img/footer/logo.png" alt="Logo" class="h-10 mb-6 md:mb-0">
            <div class="flex space-x-4">
                <a href="#" class="hover:opacity-80 transition">
                    <img src="{{ asset('img/footer/fb.png') }}" alt="Facebook" class="w-10 h-10">
                </a>
                <a href="#" class="hover:opacity-80 transition">
                    <img src="{{ asset('img/footer/insta.png') }}" alt="Instagram" class="w-10 h-10">
                </a>
                <a href="#" class="hover:opacity-80 transition">
                    <img src="{{ asset('img/footer/tiktok.png') }}" alt="TikTok" class="w-10 h-10">
                </a>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t-2 border-[#00721b] my-8"></div>

        <!-- Quick Links / Properties / Contact -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- Quick Links -->
            <div>
                <h3 class="text-2xl font-bold mb-4 text-black">QUICK LINKS</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="font-semibold text-lg flex items-center gap-2 hover:text-green-700">› Home</a></li>
                    <li><a href="#" class="font-semibold text-lg flex items-center gap-2 hover:text-green-700">› About Us</a></li>
                    <li><a href="#" class="font-semibold text-lg flex items-center gap-2 hover:text-green-700">› Properties</a></li>
                    <li><a href="#" class="font-semibold text-lg flex items-center gap-2 hover:text-green-700">› Services</a></li>
                    <li><a href="#" class="font-semibold text-lg flex items-center gap-2 hover:text-green-700">› Blogs</a></li>
                    <li><a href="#" class="font-semibold text-lg flex items-center gap-2 hover:text-green-700">› Contact Us</a></li>
                </ul>
            </div>

            <!-- Properties -->
            <div>
                <h3 class="text-2xl font-bold mb-4 text-black">PROPERTIES</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="font-semibold text-lg flex items-center gap-2 hover:text-green-700">› Apo Yama Residences</a></li>
                    <li><a href="#" class="font-semibold text-lg flex items-center gap-2 hover:text-green-700">› Singao Residences</a></li>
                    <li><a href="#" class="font-semibold text-lg flex items-center gap-2 hover:text-green-700">› Mateo Residences</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-2xl font-bold mb-4 text-black">CONTACT US</h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-2">
                        <img src="{{ asset('img/footer/location.png') }}" alt="Location" class="w-6 h-6 mt-1">
                        <span class="font-semibold text-lg">
                            Door 102, API Building, Block 8 Lot 15, Talisay St., Awhag Subd., Brgy. 19-B, Davao City, Davao del Sur, Phil., 8000
                        </span>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('img/footer/phone.png') }}" alt="Phone" class="w-6 h-6">
                        <span class="font-semibold text-lg">(082) 299 2390</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('img/footer/email.png') }}" alt="Email" class="w-6 h-6">
                        <span class="font-semibold text-lg">architexphilinc@gmail.com</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="bg-[#253e16] text-gray-200 py-4 font-semibold">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-sm">
            <div class="flex space-x-4 mt-2 md:mt-0">
                <a href="#" class="hover:underline">Terms & Conditions</a>
                <a href="#" class="hover:underline">Privacy Policy</a>
            </div>
            <p class="mt-2 md:mt-0">© Architex Phil, Inc. 2025. Designed and Developed by
                <span class="text-[#ff6200] font-semibold">R Web Solutions Corp.</span>
            </p>
        </div>
    </div>
</footer>
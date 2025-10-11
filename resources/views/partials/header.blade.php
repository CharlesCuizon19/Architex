<!-- Top Contact Bar -->
<div class="w-full bg-[#2d3b20] text-white text-sm flex flex-col md:flex-row md:justify-between md:items-center pl-[100px] pr-12 py-2 border-b border-white/10">
    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4">
        <span>📞 (082) 299 2390</span>
        <span>✉️ architexphilinc@gmail.com</span>
    </div>
    <div class="text-center md:text-right mt-2 md:mt-0">
        <span>📍 Door 102, API Building, Block 8 Lot 15, Talisay St., Awhag Subd., Davao City</span>
    </div>
</div>

<!-- Main Header -->
<header class="bg-white shadow-md py-4 pl-[100px] pr-12 flex justify-between items-center relative z-20">
    <img src="{{ asset('img/logo/logo.png') }}" alt="ARCHITEX Logo" class="h-10">
    <nav class="flex items-center gap-6 text-[#2e3e29] font-medium">
        <a href="/" class="hover:text-[#ff9800] {{ Request::is('/') ? 'text-[#2e3e29] font-semibold' : '' }}">Home</a>
        <a href="/about" class="hover:text-[#ff9800] {{ Request::is('about') ? 'text-[#2e3e29] font-semibold' : '' }}">About Us</a>
        <a href="/properties" class="hover:text-[#ff9800] {{ Request::is('properties') ? 'text-[#2e3e29] font-semibold' : '' }}">Properties</a>
        <a href="/services" class="hover:text-[#ff9800] {{ Request::is('services') ? 'text-[#2e3e29] font-semibold' : '' }}">Services</a>
        <a href="/blogs" class="hover:text-[#ff9800] {{ Request::is('blogs') ? 'text-[#2e3e29] font-semibold' : '' }}">Blogs</a>
        <a href="/contact" class="bg-[#ff9800] text-white px-4 py-2 rounded hover:bg-[#e68900]">Contact Us</a>
    </nav>
</header>
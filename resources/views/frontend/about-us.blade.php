@extends('layouts.guest')

@section('content')
    @php
        // Example heroes data (you can make this dynamic too)
        $heroes = [
            [
                'title' => '',
                'description' => '',
                'button_text' => '',
                'button_link' => '#',
                'video' => '',
                'fallback_image' => 'img/about-us/page-header.png',
            ],
        ];

        $breadcrumbs = [
            'homepage' => 'Home',
            'about-us' => 'About Us',
        ];

        $pageTitle = 'About Us';
    @endphp

    {{-- <section>
        @include('components.banner', [
            'banner_type' => 'other',
            'heroes' => $heroes,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => $pageTitle,
        ])
    </section> --}}

    <div>
        <x-banner2 page="About Us" breadcrumb="About Us" />
    </div>

    <section class="relative w-full bg-[#f7f7f7] py-24 overflow-hidden">

        <!-- Decorative Dotted Pattern -->
        <div class="absolute left-0 transform -translate-y-1/2 top-1/2">
            <img src="{{ asset('img/about-us/dot.png') }}" alt="pattern" class="w-64 h-auto opacity-40">
        </div>

        <!-- Content Wrapper -->
        <div class="relative z-10 grid items-center max-w-screen-xl grid-cols-1 gap-12 px-6 mx-auto md:grid-cols-2">

            <!-- ✅ Left: Single Image -->
            <div class="relative flex justify-center">
                <img src="{{ asset('img/about-us/house.png') }}" alt="Sanderiana Two Storey Single Detached"
                    class="object-cover w-full h-auto">
            </div>

            <!-- ✅ Right: Text Content -->
            <div class="space-y-6">
                <div>
                    <p class="text-[#00721B] font-bold tracking-wide text-lg">Who We Are</p>
                    <h2 class="text-3xl md:text-4xl font-semibold text-[#253e16] relative">
                        <span
                            class="absolute text-[#253e16]/10 -top-5 text-5xl font-extrabold select-none text-outline opacity-20">
                            Who We Are
                        </span>
                        CONSTRUCTION & DESIGN
                    </h2>
                </div>

                <p class="text-lg leading-relaxed text-gray-700">
                    At Architex Phil., Inc., we go beyond construction and design—we create spaces that inspire, connect,
                    and endure. Established with a passion for innovation and excellence, our company has grown into a
                    trusted
                    partner in architectural design, building solutions, and project management. Every project we undertake
                    is
                    guided by precision, sustainability, and a commitment to bringing our clients’ vision to life.
                </p>

                <!-- ✅ Bullet Points -->
                <ul class="mt-6 space-y-3">
                    <li class="flex items-center gap-3">
                        <img src="{{ asset('img/ico/check-icon.png') }}" alt="check" class="w-6 h-6">
                        <span class="text-lg">Innovative & Sustainable Designs</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <img src="{{ asset('img/ico/check-icon.png') }}" alt="check" class="w-6 h-6">
                        <span class="text-lg">Skilled and Experienced Team</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <img src="{{ asset('img/ico/check-icon.png') }}" alt="check" class="w-6 h-6">
                        <span class="text-lg">Quality Materials & Workmanship</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>


    <!--History Section-->
    <section class="relative w-full py-20 overflow-hidden bg-white md:py-32">

        <!-- Main Content Wrapper -->
        <div class="relative z-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="relative mb-16 text-center">
                <p class="text-[#00721B] text-xl tracking-widest font-bold">Our History</p>
                <h2 class="text-4xl md:text-4xl font-bold text-[#253e16] mt-4">
                    FROM HUMBLE BEGINNINGS
                    <!-- Subtle background text effect -->
                    <span
                        class="absolute inset-0 flex items-center justify-center text-6xl md:text-6xl font-semibold text-[#253e16] opacity-20 text-outline">
                        Our History
                    </span>
                </h2>
            </div>

            <!-- Timeline Items -->

            <!-- Year 2000 - Left Image, Right Text -->
            <div class="grid items-start grid-cols-1 gap-12 mb-20 md:grid-cols-2 md:gap-x-24">
                <!-- Single Image - Left Column -->
                <div class="flex justify-center order-2 md:order-1">
                    <img src="img/about-us/2000.png" alt="Team members shaking hands" class="w-full h-full">
                </div>

                <!-- Text Content - Right Column -->
                <div class="order-1 space-y-4 md:order-2">
                    <!-- Corrected: Year as a regular text element, not absolute -->
                    <h3 class="text-6xl font-extrabold text-[#bfdbc6] mb-4 leading-none">2000</h3>
                    <p class="text-lg leading-relaxed text-gray-700">
                        When a group of passionate professionals came together with a shared dream for building homes,
                        communities, lives, and goals. We weren't just looking to build properties – we wanted to be able to
                        trust, long-term relationships, and spaces that enhance quality of life. These early years were
                        about establishing our values: integrity, innovation, and a deep commitment to our clients.
                    </p>
                </div>
            </div>

            <!-- Year 2003 - Right Image, Left Text -->
            <div class="grid items-start grid-cols-1 gap-12 mb-20 md:grid-cols-2 md:gap-x-24">
                <!-- Text Content - Left Column -->
                <div class="order-1 space-y-4">
                    <!-- Corrected: Year as a regular text element, not absolute -->
                    <h3 class="text-6xl font-extrabold text-[#bfdbc6] mb-4 leading-none">2003</h3>
                    <p class="text-lg leading-relaxed text-gray-700">
                        We had started to establish a reputation in the industry. With our growing team and stronger
                        partnerships, we invested in refining our business model and expanding our services. This was a time
                        when our company went solidified, but we became known not only as developers, but as visionaries who
                        placed people at the heart of every project. Our culture of collaboration and customer focus became
                        our strongest foundation.
                    </p>
                </div>

                <!-- Single Image - Right Column -->
                <div class="flex justify-center order-2 md:order-1">
                    <img src="img/about-us/2003.png" alt="Team members shaking hands" class="w-full h-full ">
                </div>
            </div>

            <!-- Year 2008 - Left Image, Right Text -->
            <div class="grid items-start grid-cols-1 gap-12 md:grid-cols-2 md:gap-x-24">
                <!-- Single Image - Left Column -->
                <div class="flex justify-center order-2 md:order-1">
                    <img src="img/about-us/2008.png" alt="Team members shaking hands" class="w-full h-full ">
                </div>
                <!-- Text Content - Right Column -->
                <div class="order-1 space-y-4 md:order-2">
                    <!-- Corrected: Year as a regular text element, not absolute -->
                    <h3 class="text-6xl font-extrabold text-[#bfdbc6] mb-4 leading-none">2008</h3>
                    <p class="text-lg leading-relaxed text-gray-700">
                        Our organization expanded its workforce, bringing in experts from different fields who enriched our
                        capabilities. Internally, we developed stronger systems and a culture that embraced both discipline
                        and creativity. Externally, we gained recognition as a company that delivers quality, reliability,
                        and forward-thinking solutions. This was the year when our brand name started to stand out in the
                        competitive landscape.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Miletone Section -->
    <section class="relative w-full bg-[#f7f7f7] py-20 md:py-32 overflow-hidden">

        <!-- Header Section -->
        <div class="relative z-10 px-4 mx-auto mb-16 max-w-7xl sm:px-6 lg:px-8">
            <span class="absolute text-[#00721b] text-6xl font-extrabold select-none opacity-20 text-outline">
                Project Milestone
            </span>
            <p class="text-[#00721b] text-lg uppercase tracking-widest font-bold">Project Milestone</p>
            <h2 class="mt-2 text-4xl font-bold text-gray-800 uppercase md:text-5xl">
                A JOURNEY OF GROWTH
            </h2>
        </div>

        <!-- Timeline Wrapper -->
        <div class="relative z-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Positioned to be roughly between the two content columns on desktop -->
            <div class="absolute left-[calc(22%-0px)] top-0 bottom-0 w-[2px] bg-[#cfcfcf] z-0 hidden md:block"></div>
            <!-- For mobile, line is still on the far left -->
            <div class="absolute left-6 top-0 bottom-0 w-[2px] bg-green-200 z-0 md:hidden"></div>

            <!-- Timeline Items -->

            <!-- Milestone 2010 -->
            <div class="relative flex flex-col items-start py-8 md:flex-row">
                <!-- Year and Subtitle (Left Column) -->
                <div class="relative flex-shrink-0 w-full pr-8 text-left md:w-1/4">
                    <h3 class="text-6xl md:text-7xl font-bold text-[#cecece] leading-none">2010</h3>
                    <p class="text-lg ml-4 text-[#303030] font-semibold mt-2">The Beginning</p>
                    <!-- Dot on Timeline (Desktop) -->
                    <div
                        class="absolute right-[2.5rem] top-1/2 transform -translate-y-1/2 w-7 h-7 bg-[#00721b] rounded-full border-4 border-white z-20 hidden md:block">
                    </div>
                    <!-- Dot on Timeline (Mobile) -->
                    <div
                        class="absolute left-[-14px] top-1/2 transform -translate-y-1/2 w-7 h-7 bg-[#00721b] rounded-full border-4 border-white z-20 md:hidden">
                    </div>
                </div>

                <!-- Content (Image & Text) (Right Column) -->
                <div class="relative w-full pt-6 md:pt-0">
                    <div class="flex flex-col gap-6 md:flex-row ">
                        <img src="img/about-us/2010.png" alt="Project 2010" class="w-full h-full">
                        <div class="md:w-full">
                            <p class="leading-relaxed text-gray-700 text-md">
                                In 2010, our journey began with a simple but powerful idea: to create living and working
                                spaces that go beyond four walls. At this stage, our focus was on studying the needs of
                                communities and understanding how modern design could improve quality of life. It was a year
                                of laying the groundwork — forming the team, building partnerships, and drafting the
                                blueprint for what would later become our signature projects.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Milestone 2014 -->
            <div class="relative flex flex-col items-start py-8 md:flex-row">
                <!-- Year and Subtitle (Left Column) -->
                <div class="relative flex-shrink-0 w-full pr-8 text-left md:w-1/4">
                    <h3 class="text-6xl md:text-7xl font-bold text-[#cecece] leading-none">2014</h3>
                    <p class="text-lg ml-2 text-[#303030] font-semibold mt-2">First Breakthrough</p>
                    <!-- Dot on Timeline (Desktop) -->
                    <div
                        class="absolute right-[2.5rem] top-1/2 transform -translate-y-1/2 w-7 h-7 bg-[#00721b] rounded-full border-4 border-white z-20 hidden md:block">
                    </div>
                    <!-- Dot on Timeline (Mobile) -->
                    <div
                        class="absolute left-[-14px] top-1/2 transform -translate-y-1/2 w-7 h-7 bg-[#00721b] rounded-full border-4 border-white z-20 md:hidden">
                    </div>
                </div>

                <!-- Content (Image & Text) (Right Column) -->
                <div class="relative w-full pt-6 md:pt-0">
                    <div class="flex flex-col gap-6 md:flex-row">
                        <img src="img/about-us/2014.png" alt="Interior 2014" class="w-full h-full">
                        <div class="md:w-full">
                            <p class="leading-relaxed text-gray-700 text-md">
                                By 2014, after years of preparation and planning, we launched our very first approved
                                project. This milestone marked a turning point, transforming our vision into something
                                tangible. The project was modest in scale but ambitious in design, blending functionality
                                with comfort. It introduced us to the challenges of construction and community-building,
                                while also proving that our approach to modern, thoughtful spaces had a real impact on
                                people's lives.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Milestone 2017 -->
            <div class="relative flex flex-col items-start py-8 md:flex-row">
                <!-- Year and Subtitle (Left Column) -->
                <div class="relative flex-shrink-0 w-full pr-8 text-left md:w-1/4">
                    <h3 class="text-6xl md:text-7xl font-bold text-[#cecece] leading-none">2017</h3>
                    <p class="text-lg  text-[#303030] font-semibold mt-2">Expanding Horizons</p>
                    <!-- Dot on Timeline (Desktop) -->
                    <div
                        class="absolute right-[2.5rem] top-1/2 transform -translate-y-1/2 w-7 h-7 bg-[#00721b] rounded-full border-4 border-white z-20 hidden md:block">
                    </div>
                    <!-- Dot on Timeline (Mobile) -->
                    <div
                        class="absolute left-[-14px] top-1/2 transform -translate-y-1/2 w-7 h-7 bg-[#00721b] rounded-full border-4 border-white z-20 md:hidden">
                    </div>
                </div>

                <!-- Content (Image & Text) (Right Column) -->
                <div class="relative w-full pt-6 md:pt-0">
                    <div class="flex flex-col gap-6 md:flex-row">
                        <img src="img/about-us/2017.png" alt="Landscape 2017" class="w-full h-full">
                        <div class="md:w-full">
                            <p class="leading-relaxed text-gray-700 text-md">
                                With experience and confidence, 2017 was the year of expansion. We moved beyond initial
                                projects and started developing larger residential communities and commercial spaces. This
                                was also the year we introduced innovative concepts like open green areas, integrated
                                amenities, and smart design solutions that made our developments stand out. Our brand was no
                                longer just emerging — it was starting to gain recognition for quality and innovation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Milestone 2025 -->
            <div class="relative flex flex-col items-start py-8 md:flex-row">
                <!-- Year and Subtitle (Left Column) -->
                <div class="relative flex-shrink-0 w-full pr-8 text-left md:w-1/4">
                    <h3 class="text-6xl md:text-7xl font-bold text-[#cecece] leading-none">2025</h3>
                    <p class="text-lg text-[#303030] font-semibold mt-2">Shaping the Future</p>
                    <!-- Dot on Timeline (Desktop) -->
                    <div
                        class="absolute right-[2.5rem] top-1/2 transform -translate-y-1/2 w-7 h-7 bg-[#00721b] rounded-full border-4 border-white z-20 hidden md:block">
                    </div>
                    <!-- Dot on Timeline (Mobile) -->
                    <div
                        class="absolute left-[-14px] top-1/2 transform -translate-y-1/2 w-7 h-7 bg-[#00721b] rounded-full border-4 border-white z-20 md:hidden">
                    </div>
                </div>

                <!-- Content (Image & Text) (Right Column) -->
                <div class="relative w-full pt-6 md:pt-0">
                    <div class="flex flex-col gap-6 md:flex-row">
                        <img src="img/about-us/2025.png" alt="Modern Homes 2025" class="w-full h-full ">
                        <div class="md:w-full">
                            <p class="leading-relaxed text-gray-700 text-md">
                                Today, we continue to grow with a clear focus on the future. Our current projects are built
                                around the concept of "Smart Spaces" — blending technology, sustainability, and
                                human-centered design. We are expanding nationwide, creating communities that are not only
                                modern and connected, but also environmentally responsible. The present is not just about
                                building structures — it's about building lifestyles, where innovation meets everyday
                                living.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="relative bg-[#1E3B15] text-white overflow-hidden">
        <!-- BACKGROUND LAYER -->
        <div class="absolute inset-0 bg-[#1E3B15]">
            <!-- Vision background (right side diagonal) -->
            <div
                class="absolute right-0 top-0 w-1/2 h-full bg-[url('/img/about-us/vision-bg.jpg')] bg-cover bg-center clip-path-diagonal opacity-90">
            </div>
            <div
                class="w-full h-full bg-[url('/img/about-us/bg-mission.png')] bg-contain bg-no-repeat bg-left mix-blend-multiply ">
            </div>
        </div>

        <!-- Foreground mission image (right side, visible on top) -->
        <div class="absolute inset-0 z-10 flex items-center justify-end">
            <div class="w-full h-full bg-[url('/img/about-us/mission.png')] bg-contain bg-no-repeat bg-right opacity-90">
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-20 px-6 py-20 mx-auto max-w-screen-2xl">
            <!-- Heading -->
            <div class="relative mb-16">
                <!-- Background Outline Text -->
                <h1
                    class="absolute inset-0 z-10 flex items-start justify-start text-6xl font-bold pointer-events-none select-none md:text-6xl stroke-text ">
                    Mission & Vision
                </h1>

                <!-- Foreground Text -->
                <p class="relative z-10 text-lg font-semibold">Mission & Vision</p>
                <h2 class="text-4xl md:text-5xl font-bold text-[#45b700] relative z-10">
                    Commitment to Excellence
                </h2>
            </div>


            <!-- Mission and Vision Cards -->
            <div class="relative z-20 grid grid-cols-1 gap-12 md:grid-cols-2">
                <!-- Mission -->
                <div class="bg-white text-gray-900  relative border-b-[6px] border-[#ffe350] p-10">
                    <div class="absolute -top-6 left-8 bg-[#2A441A] p-3 rounded-md">
                        <img src="{{ asset('img/ico/mission-icon.png') }}" alt="Check Icon"
                            class="object-contain w-6 h-6">
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-[#2A441A] uppercase">Our Mission</h3>
                    <ul class="space-y-3 text-lg font-semibold leading-relaxed text-gray-700 list-disc list-inside">
                        <li>To deliver modern, client-focused architectural, planning, and construction services with the
                            highest standards of quality and craftsmanship.</li>
                        <li>To combine Japanese precision with Filipino creativity, ensuring efficient, functional, and
                            aesthetically driven designs.</li>
                        <li>To foster long-term partnerships by consistently exceeding expectations and contributing to
                            responsible urban development throughout the country.</li>
                    </ul>
                </div>

                <!-- Vision -->
                <div class="bg-white text-gray-900 relative border-b-[6px] border-[#ffe350] p-10">
                    <div class="absolute -top-6 left-8 bg-[#2A441A] p-3 rounded-md">
                        <img src="{{ asset('img/ico/vision-icon.png') }}" alt="Check Icon"
                            class="object-contain w-6 h-6">
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-[#2A441A]">Our Vision</h3>
                    <p class="text-lg font-semibold leading-relaxed text-gray-700">
                        To be a leading architectural and design firm in the Philippines, delivering sustainable, inclusive,
                        and high-quality housing solutions—from socialized to high-end—designed to uplift communities and
                        enrich Filipino lives.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <section class="relative bg-[#f8f8f8] pt-20 pb-[20rem] overflow-hidden">

        <div class="max-w-screen-xl px-6 mx-auto text-center">

            <!-- ✅ Section Title -->
            <div class="relative mb-16">
                <!-- Background Text -->
                <div
                    class="absolute inset-x-0 z-0 text-6xl leading-none tracking-tight text-gray-400 select-none -top-1 md:text-7xl opacity-20 text-outline">
                    Our Core Values
                </div>
                <p class="text-[#00721B] font-semibold uppercase tracking-wide">Our Core Values</p>
                <h2 class="text-4xl md:text-5xl font-semibold text-[#253e16] relative inline-block mt-2">
                    <span
                        class="absolute inset-0 text-[#253e16]/10 text-6xl md:text-7xl font-extrabold select-none -z-10 -top-6">
                        Our Core Values
                    </span>
                    CREATING RESPONSIBLY
                </h2>
            </div>

            <!-- ✅ Icons Row -->
            <div class="grid grid-cols-1 gap-10 mb-12 sm:grid-cols-3 justify-items-center">
                <!-- Integrity -->
                <div class="flex flex-col items-center space-y-4">
                    <div class="w-14 h-14 flex items-center justify-center bg-[#00721B] rounded-sm shadow-lg">
                        <img src="{{ asset('img/ico/integrity.png') }}" alt="Integrity Icon"
                            class="object-contain w-15 h-15">
                    </div>
                    <h3 class="text-xl font-bold text-[#253e16] tracking-wide">INTEGRITY</h3>
                </div>

                <!-- Expertise -->
                <div class="flex flex-col items-center space-y-4">
                    <div class="w-14 h-14 flex items-center justify-center bg-[#00721B] rounded-sm shadow-lg">
                        <img src="{{ asset('img/ico/expertise.png') }}" alt="Expertise Icon"
                            class="object-contain w-15 h-15">
                    </div>
                    <h3 class="text-xl font-bold text-[#253e16] tracking-wide">EXPERTISE</h3>
                </div>

                <!-- Leadership -->
                <div class="flex flex-col items-center space-y-4">
                    <div class="w-14 h-14 flex items-center justify-center bg-[#00721B] rounded-sm shadow-lg">
                        <img src="{{ asset('img/ico/leadership.png') }}" alt="Leadership Icon"
                            class="object-contain w-15 h-15">
                    </div>
                    <h3 class="text-xl font-bold text-[#253e16] tracking-wide">LEADERSHIP</h3>
                </div>

            </div>

            <!-- ✅ Description -->
            <p class="max-w-3xl mx-auto text-2xl leading-relaxed text-black">
                Our expertise in estimating, construction, project management, and preconstruction services ensures that
                our customers receive a quality product at a fair price and within a reasonable timeframe. This is
                accomplished through the selective use of responsible subcontractors, hiring and retaining first-class
                employees, and working for clients that share a belief in open, honest, and direct communication.
            </p>

        </div>
    </section>
@endsection

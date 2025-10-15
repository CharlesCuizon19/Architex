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
        <x-banner2 page="About Us" breadcrumb="About Us" img="img/about-us-banner.png" />
    </div>

    <section class="relative w-full bg-[#f3f3f3] py-24 overflow-hidden">

        <div class="flex flex-col">
            <div class="flex flex-col">
                <div class="grid items-center grid-cols-2 md:grid-cols-3 mx-[5rem]">
                    <div>
                        <img src="{{ asset('img/about-us/Architex Japan Logo2.png') }}" alt="" class="h-auto w-[60%]">
                    </div>

                    <div class="grid items-center justify-center grid-cols-1 gap-10">
                        <img src="{{ asset('img/about-us/about us - who we are intro 1.png') }}"
                            alt="Sanderiana Two Storey Single Detached" class="object-cover w-[80%] h-auto">
                        <img src="{{ asset('img/about-us/about us - who we are intro 2.jpg') }}"
                            alt="Sanderiana Two Storey Single Detached" class="object-cover w-[80%] h-auto">
                    </div>

                    <div class="col-span-3 space-y-6 md:col-span-1">
                        <div>
                            <p class="text-[#00721B] font-bold tracking-wide text-lg">Who We Are</p>
                            <h2 class="text-3xl md:text-4xl font-semibold text-[#253e16] relative">
                                <span
                                    class="absolute text-[#253e16]/10 -top-5 text-5xl font-extrabold select-none text-outline opacity-20">
                                    Who We Are
                                </span>
                                JOURNEY OF GROWTH
                            </h2>
                        </div>

                        <p class="text-lg leading-relaxed text-justify text-gray-700">
                            The origins of Architex Phil., Inc. can be traced back to Japan, where our founders built a
                            solid
                            reputation for providing affordable housing solutions for all life stages. Over the years,
                            Architex
                            Group has expanded to more than 37 offices across Osaka, Nagoya, and Tokyo, gaining the
                            confidence
                            of
                            local communities with our dedication to quality, innovation, and integrity.
                            <br> <br>
                            With the same commitment, we bring this legacy to the Philippines, starting in Mindanao, fusing
                            Japanese
                            precision with Filipino creativity to build sustainable, people-centered communities and
                            developments
                            that elevate lives and contribute to a better future for communities around the world.

                        </p>

                        <!-- ✅ Bullet Points -->
                        {{-- <ul class="mt-6 space-y-3">
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
                        </ul> --}}
                    </div>
                </div>
                <div class="py-5 text-xl text-center opacity-50">
                    Architex Office - Okazaki, Japan
                </div>
            </div>
            <div class="container mx-auto">
                <div class="bg-white p-16 border-l-[4px] border-[#253e16] w-auto mx-[5rem]">
                    <div class="grid grid-cols-3 text-[#253e16] divide-x divide-solid divide-[#253e16]">

                        <div class="space-y-3 text-center">
                            <div class="text-5xl font-semibold counter" data-target="120">0+</div>
                            <div class="text-lg">Projects Completed</div>
                        </div>

                        <div class="space-y-3 text-center">
                            <div class="text-5xl font-semibold counter" data-target="15">0+</div>
                            <div class="text-lg">Years of Experience</div>
                        </div>

                        <div class="space-y-3 text-center">
                            <div class="text-5xl font-semibold counter" data-target="37">0+</div>
                            <div class="text-lg">Offices</div>
                        </div>

                    </div>
                </div>
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
        <div class="absolute inset-0 z-0 flex items-center justify-end">
            <div
                class="w-full h-full bg-[url('/img/about-us/mission.png')] bg-contain bg-no-repeat clip-path-diagonal bg-right opacity-90">
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-0 px-6 mx-auto py-28 max-w-screen-2xl">
            <!-- Heading -->
            <div class="container relative mx-auto mb-20 ml-[5rem]">
                <!-- Background Outline Text -->
                <h1
                    class="absolute inset-0 z-10 flex items-start justify-start text-6xl font-bold pointer-events-none select-none md:text-6xl stroke-text ">
                    Mission & Vision
                </h1>

                <!-- Foreground Text -->
                <p class="relative z-10 text-lg font-semibold">Mission & Vision</p>
                <h2 class="text-4xl md:text-5xl text-[#45b700] relative z-10">
                    Commitment to Excellence
                </h2>
            </div>


            <!-- Mission and Vision Cards -->
            <div class="relative z-20 grid w-full grid-cols-2 gap-8 md:flex">
                <!-- Mission -->
                <div class="bg-white text-gray-900  relative border-b-[6px] border-[#ffe350] pt-10 pb-5 px-10 md:w-[30%]">
                    <div class="absolute -top-8 left-8 bg-[#00721b] p-5 ">
                        <img src="{{ asset('img/ico/mission-icon.png') }}" alt="Check Icon"
                            class="object-contain w-5 h-5">
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-[#2A441A] uppercase">Our Mission</h3>
                    <div class="leading-relaxed text-gray-700 text-md">
                        To deliver innovative and sustainable architectural solutions that combine function, beauty, and
                        quality, shaping spaces that add value to people and communities.
                    </div>
                </div>

                <!-- Vision -->
                <div class="bg-white text-gray-900 relative border-b-[6px] border-[#ffe350] pt-10 pb-5 px-10 md:w-[30%]">
                    <div class="absolute -top-8 left-8 bg-[#00721b] p-5">
                        <img src="{{ asset('img/ico/vision-icon.png') }}" alt="Check Icon"
                            class="object-contain w-5 h-5">
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-[#2A441A] uppercase">Our Vision</h3>
                    <p class="leading-relaxed text-gray-700 text-md">
                        To be recognized as a leading architectural and construction partner in the Philippines, known for
                        transforming ideas into lasting landmarks that stand the test of time.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="relative bg-[#f3f3f3]">
        <div class="flex items-center justify-center w-full">
            <div>
                <img src="{{ asset('img/about-us/Architex Japan Logo.png') }}" alt=""
                    class="object-cover object-left w-full h-screen ">
            </div>
        </div>

        <div class="absolute inset-0 top-[4rem] z-10">
            <div class="text-center">
                <!-- ✅ Section Title -->
                <div class="relative mb-16">
                    <div class="flex flex-col gap-3">
                        <p class="text-[#00721B] font-semibold uppercase tracking-wide">Our Core Values</p>
                        <h2 class="text-4xl md:text-5xl text-[#253e16] relative inline-block mt-2">
                            CREATING RESPONSIBLY
                        </h2>
                    </div>
                    <div
                        class="absolute inset-x-0 z-0 text-6xl leading-none tracking-tight text-gray-400 select-none -top-1 md:text-7xl opacity-20 text-outline">
                        Our Core Values
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute inset-0">
            <div class="flex items-center justify-center w-full h-full text-center ">
                <div class="container grid grid-cols-2 mx-auto md:grid-cols-3 gap-y-20">
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div>
                            <img src="{{ asset('img/ico/expertise.png') }}" alt="">
                        </div>
                        <div class="text-2xl font-semibold uppercase">
                            Quality
                        </div>
                        <div class="w-[80%]">
                            Commited to excellence in design, materials, and craftsmanship to ensure lasting value.
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div>
                            <img src="{{ asset('img/ico/leadership.png') }}" alt="">
                        </div>
                        <div class="text-2xl font-semibold uppercase">
                            Integrity
                        </div>
                        <div class="w-[80%]">
                            Building trust through transparency, profesisonalism, and ethical standards in every aspect of
                            our work.
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div>
                            <img src="{{ asset('img/ico/sustainability.png') }}" alt="">
                        </div>
                        <div class="text-2xl font-semibold uppercase">
                            Sustainability
                        </div>
                        <div class="w-[80%]">
                            Designing responsibility while balancing function, beauty, and the environments.
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div>
                            <img src="{{ asset('img/ico/integrity.png') }}" alt="">
                        </div>
                        <div class="text-2xl font-semibold uppercase">
                            Innovation
                        </div>
                        <div class="w-[80%]">
                            Embracing new ideas, modern moethods, and sustainable practices to create designs that inspire.
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div>
                            <img src="{{ asset('img/ico/collab.png') }}" alt="">
                        </div>
                        <div class="text-2xl font-semibold uppercase">
                            Collaboration
                        </div>
                        <div class="w-[80%]">
                            Working closely with clients, partners, and communities to bring visions to life.
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div>
                            <img src="{{ asset('img/ico/precision.png') }}" alt="">
                        </div>
                        <div class="text-2xl font-semibold uppercase">
                            Precision
                        </div>
                        <div class="w-[80%]">
                            With focus to details, we uphold the highest standards in accuracy and execution.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const counters = document.querySelectorAll('.counter');
        const speed = 100; // smaller = faster

        counters.forEach(counter => {
            const animate = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText.replace('+', '');

                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment) + '+';
                    setTimeout(animate, 80);
                } else {
                    counter.innerText = target + '+';
                }
            };

            // Optional: start counting only when visible
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animate();
                        observer.unobserve(counter);
                    }
                });
            }, {
                threshold: 0.5
            });

            observer.observe(counter);
        });
    </script>
@endsection

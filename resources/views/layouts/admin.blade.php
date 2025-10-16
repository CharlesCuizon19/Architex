<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    @vite('resources/css/app.css') {{-- TailwindCSS --}}

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="">
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <link rel="apple-touch-icon" href="">
</head>

<body x-data="{ sidebarOpen: true }" class="flex min-h-screen bg-gray-100">

    {{-- Sidebar --}}
    <aside
        :class="sidebarOpen ? 'w-64' : 'w-16'"
        class="bg-white text-gray-700 flex-shrink-0 flex flex-col justify-between min-h-screen transition-all duration-300 border-r">

        <!-- Logo + Toggle -->
        <div>
            <div class="flex items-center justify-between p-4 border-b">
                <!-- Full Logo -->
                <img src="{{ asset('/img/logo/image-2.png') }}" alt="Logo"
                    class="h-8 w-auto"
                    x-show="sidebarOpen"
                    x-transition>

                <!-- Small Logo (collapsed) -->
                <img src="{{ asset('/img/logo/logo.png') }}" alt="Small Logo"
                    class="h-8 w-auto mx-auto"
                    x-show="!sidebarOpen"
                    x-transition>

                <!-- Toggle Button -->
                <button
                    class="text-[#ff9800] hover:text-gray-400 "
                    @click="sidebarOpen = !sidebarOpen">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 transform transition-transform duration-300"
                        :class="sidebarOpen ? 'rotate-0' : 'rotate-180'"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-2 text-sm">
                <!-- Homepage Banner -->
                <a href="{{ route('admin.banners.index') }}"
                    class="flex items-center px-3 py-2 rounded 
                        {{ request()->routeIs('admin.banners.*') ? 'bg-[#ff9800] text-white' : 'hover:bg-gray-200' }}
                        "
                    :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition class="ml-3">Homepage Banner</span>
                </a>


                <!-- Services -->
                <a href="{{ route('admin.services.index') }}"
                    class="flex items-center px-3 py-2 rounded {{ request()->routeIs('admin.services.*') ? 'bg-[#ff9800] text-white' : 'hover:bg-gray-200' }}"
                    :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.75 17L15 12 9.75 7" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition class="ml-3">Services</span>
                </a>

                <!-- Blogs -->
                <a href="{{ route('admin.blogs.index') }}"
                    class="flex items-center px-3 py-2 rounded {{ request()->routeIs('admin.blogs.*') ? 'bg-[#ff9800] text-white' : 'hover:bg-gray-200' }}"
                    :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 20h9M12 4H3m9 0v16" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition class="ml-3">Blogs</span>
                </a>

                <!-- Newsletter -->
                <a href="{{ route('admin.newsletter.index') }}"
                    class="flex items-center px-3 py-2 rounded {{ request()->routeIs('admin.newsletter.*') ? 'bg-[#ff9800] text-white' : 'hover:bg-gray-200' }}"
                    :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8l9 6 9-6" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition class="ml-3">Newsletter</span>
                </a>

                <!-- Project Categories -->
                <a href="{{ route('admin.projectCategories.index') }}"
                    class="flex items-center px-3 py-2 rounded {{ request()->routeIs('admin.projectCategories.*') ? 'bg-[#ff9800] text-white' : 'hover:bg-gray-200' }}"
                    :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition class="ml-3">Project Categories</span>
                </a>

                <!-- Projects -->
                <a href="{{ route('admin.projects.index') }}"
                    class="flex items-center px-3 py-2 rounded {{ request()->routeIs('admin.projects.*') ? 'bg-[#ff9800] text-white' : 'hover:bg-gray-200' }}"
                    :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition class="ml-3">Projects</span>
                </a>

                <!-- Product Categories -->
                <a href="{{ route('admin.productCategories.index') }}"
                    class="flex items-center px-3 py-2 rounded {{ request()->routeIs('admin.productCategories.*') ? 'bg-[#ff9800] text-white' : 'hover:bg-gray-200' }}"
                    :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 13V7a2 2 0 00-2-2h-4l-2-2H8a2 2 0 00-2 2v6" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition class="ml-3">Product Categories</span>
                </a>

                <!-- Attributes -->
                <a href="{{ route('admin.attributes.index') }}"
                    class="flex items-center px-3 py-2 rounded {{ request()->routeIs('admin.attributes.*') ? 'bg-[#ff9800] text-white' : 'hover:bg-gray-200' }}"
                    :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition class="ml-3">Attributes</span>
                </a>

                <!-- Products -->
                <a href="{{ route('admin.products.index') }}"
                    class="flex items-center px-3 py-2 rounded {{ request()->routeIs('admin.products.*') ? 'bg-[#ff9800] text-white' : 'hover:bg-gray-200' }}"
                    :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 12H4" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition class="ml-3">Products</span>
                </a>

                <!-- Contacts -->
                <a href="{{ route('admin.contacts.index') }}"
                    class="flex items-center px-3 py-2 rounded {{ request()->routeIs('admin.contacts.*') ? 'bg-[#ff9800] text-white' : 'hover:bg-gray-200' }}"
                    :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5h18M9 3v2m6-2v2M4 7h16v10H4z" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition class="ml-3">Contacts</span>
                </a>

                <!-- Calculator -->
                <a href="{{ route('admin.calculator.index') }}"
                    class="flex items-center px-3 py-2 rounded {{ request()->routeIs('admin.calculator.*') ? 'bg-[#ff9800] text-white' : 'hover:bg-gray-200' }}"
                    :class="{ 'justify-center': !sidebarOpen, 'justify-start': sidebarOpen }">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 10h10M7 14h4" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition class="ml-3">Calculator Emails</span>
                </a>
            </nav>
        </div>

        <!-- Logout -->
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 w-full text-left px-5 py-2 rounded-lg font-semibold text-red-600 hover:bg-red-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 
                     0 005.25 5.25v13.5A2.25 2.25 0 007.5 
                     21h6a2.25 2.25 0 002.25-2.25V15m3 
                     0l3-3m0 0l-3-3m3 3H9" />
                </svg>
                <span x-show="sidebarOpen" x-transition>Logout</span>
            </button>
        </form>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">
        <!-- Banner -->
        <header class="bg-white shadow p-[1.1rem]">
            <h1 class="text-lg font-semibold text-orange-900">@yield('title')</h1>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>

</html>
<style>
    table.dataTable thead th {
        border-bottom: 1px solid #d1d5db;
        border-left: 1px solid #d1d5db;
        /* Left side border */
        border-right: 1px solid #d1d5db;
        /* Right side border */
        font-size: 12px;
        /* Text size for header cells */
        font-weight: bold;
        padding: 4px;
        /* Optional for bold headers */
    }


    table.dataTable thead th:first-of-type {
        border-left: none;
    }

    /* Body Cell Styling */
    table.dataTable td {
        border-bottom: 1px solid #d1d5db;
        border-left: 1px solid #d1d5db;
        /* Left side border */
        border-right: 1px solid #d1d5db;
        /* Right side border */
        font-size: 11px;
        /* Text size for header cells */
        font-weight: normal;
        padding: 0;
        /* Text size for body cells */
    }

    /* Footer Styling */
    table.dataTable tfoot th,
    table.dataTable tfoot td {
        border-top: 2px solid #d1d5db;
        /* Border at the top of footer cells */
        border-left: 1px solid #d1d5db;
        /* Left side border */
        border-right: 1px solid #d1d5db;
        /* Right side border */
        font-size: 11px;
        /* Text size for footer cells */
        font-weight: bold;
        /* Normal weight for footer cells */
    }


    /* Optional: Remove the border for the first footer cell to prevent double borders */
    table.dataTable tfoot th:first-of-type,
    table.dataTable tfoot td:first-of-type {
        border-left: none;
    }
</style>
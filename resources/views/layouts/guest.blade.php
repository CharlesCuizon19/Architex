<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Home') | Architex</title>

    <script src="https://cdn.tailwindcss.com" defer></script>
    <script src="https://unpkg.com/lucide@latest" defer></script>

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/logo/logo.png') }}">

    <!-- For Safari/Apple -->
    <link rel="apple-touch-icon" href="{{ asset('img/logo/logo.png') }}">

    <!-- For Windows tiles -->
    <meta name="msapplication-TileImage" content="{{ asset('img/logo/logo.png') }}">
    @vite('resources/css/app.css')
</head>

<body>
    @include('css.design')
    <main>
        @yield('content')
    </main>

    @include('partials.footer')
    @yield('data')
</body>

</html>

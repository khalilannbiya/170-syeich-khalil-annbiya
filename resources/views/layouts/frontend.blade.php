<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.frontend.meta')

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-thumb.jpeg') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo-thumb.jpeg') }}" />

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap"
        rel="stylesheet">

    {{-- Box Icons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Title --}}
    <title>@yield('title', '')Laporpak — Melawan Kejahatan Bersama</title>

    <link rel="canonical" href="{{ URL::current() }}">

    @vite('resources/css/app.css')
</head>

<body class="relative antialiased font-montserrat">
    @include('sweetalert::alert')

    {{-- Header --}}
    @include('components.frontend.navbar')

    {{-- Main Content --}}
    <main class="px-4 mx-auto">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.frontend.footer')

    @vite('resources/js/app.js')
    @stack('script')
</body>

</html>

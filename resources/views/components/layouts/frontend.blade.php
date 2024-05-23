<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-partials.frontend.meta />

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
    <title>{{ $title ?? '' }} Laporpak — Melawan Kejahatan Bersama</title>

    <link rel="canonical" href="{{ URL::current() }}">

    @vite('resources/css/app.css')
</head>

<body class="relative antialiased text-black font-montserrat">
    @include('sweetalert::alert')

    {{-- Header --}}
    <x-partials.frontend.navbar />

    {{-- Main Content --}}
    <main class="px-4 mx-auto">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-partials.frontend.footer />

    @vite('resources/js/app.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @stack('script')
</body>

</html>

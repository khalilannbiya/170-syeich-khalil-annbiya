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

<body class="relative antialiased text-black bg-white font-montserrat">
    @include('sweetalert::alert')

    {{-- Main Content --}}
    <main class="px-4 mx-auto py-10 lg:py-0 lg:px-0">
        <img src="{{ asset('assets/images/logo.webp') }}" class="w-28 lg:hidden" alt="Logo Laporpak">

        <section class="max-w-max mx-auto lg:flex lg:flex-row lg:w-full">
            <section class="hidden lg:basis-1/2 lg:overflow-hidden lg:flex lg:flex-col lg:justify-between">
                <img class="w-full h-full object-cover object-center" src="{{ asset('assets/images/siren.webp') }}"
                    alt="Gambar Polisi">
            </section>
            {{ $slot }}
        </section>
    </main>


    @vite('resources/js/app.js')
    @stack('script')
</body>

</html>

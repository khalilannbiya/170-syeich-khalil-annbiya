@extends('layouts.frontend')

@section('title', 'Tentang Kami | ')

@section('content')
    <section class="pt-[60px] md:pt-[82px]">
        <div
            class="bg-gradient-hero aspect-square lg:aspect-auto h-[300px] w-full flex items-center justify-center rounded-lg">
            <div class="max-w-7xl flex flex-col items-center justify-center gap-4">
                <h1 class="text-4xl text-white font-bold text-center leading-normal">Tentang Kami</h1>
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center justify-center flex-wrap space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="{{ route('index') }}" aria-label="Kembali Ke Halaman Beranda"
                                class="inline-flex items-center text-sm font-medium text-white hover:text-slate-300">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Beranda
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-slate-300 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-slate-300 md:ms-2">Tentang Kami</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto flex justify-center md:mt-20 py-24 px-4">
        <section class="flex flex-col lg:flex-row justify-between items-center gap-10">
            <div class="w-full flex justify-center items-center">
                <img loading="lazy" class="rounded-md md:max-w-xl" src="{{ asset('assets/images/aboutus-1.webp') }}"
                    alt="Gambar Polisi">
            </div>
            <div class="w-full md:max-w-xl">
                <p class="text-sm text-gray-500 text-justify">
                    Laporpak merupakan sistem informasi pengaduan masyarakat yang diinisiasi oleh Kepolisian Resor Kabupaten
                    Karawang. Sistem ini hadir sebagai platform digital yang mudah diakses dan terpercaya untuk membantu
                    masyarakat dalam melaporkan berbagai tindak kejahatan dan membangun lingkungan yang lebih aman di
                    wilayah Kabupaten Karawang.
                </p>
                <p class="text-sm text-gray-500 text-justify mt-5">
                    Kepolisian Resor Kabupaten Karawang berkomitmen untuk meningkatkan kualitas pelayanan publik dan
                    menciptakan rasa aman bagi masyarakat. Dalam rangka mewujudkan komitmen tersebut, Polres Karawang
                    meluncurkan LaporPak sebagai solusi inovatif untuk mempermudah proses pelaporan tindak kejahatan dan
                    mempercepat penanganan kasus.
                </p>
            </div>
        </section>
    </section>

    <section class="max-w-7xl mx-auto flex flex-col justify-center items-center gap-10 py-10 px-4">
        <h1 class="max-w-[380px] text-center text-black font-medium">
            Beberapa satuan unit/divisi kami yang mempunyai integritas dan profesionalisme yang tinggi
        </h1>
        <section class="flex flex-wrap justify-center items-center gap-20 md:px-6">
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-brimob.webp') }}" alt="Logo Brimob"
                loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-densus88.webp') }}" alt="Logo Densus 88"
                loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-gegana.webp') }}" alt="Logo Gegana"
                loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-polair.webp') }}" alt="Logo polair"
                loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-propam.webp') }}" alt="Logo propam"
                loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-sat-binmas.webp') }}" alt="Logo Sat Binmas"
                loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-sat-intelkam.webp') }}"
                alt="Logo Sat intelkam" loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-sat-lantas.webp') }}" alt="Logo Sat lantas"
                loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-sat-pamobvit.webp') }}"
                alt="Logo Sat pamobvit" loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-sat-reskrim.webp') }}"
                alt="Logo Sat reskrim" loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-sat-resnarkoba.webp') }}"
                alt="Logo Sat resnarkoba" loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-sat-sabhara.webp') }}"
                alt="Logo Sat sabhara" loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-sat-tahti.webp') }}" alt="Logo Sat tahti"
                loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-sat-tipol.webp') }}" alt="Logo Sat tipol"
                loading="lazy" />
            <img class="w-[3rem] md:w-[5rem]" src="{{ asset('assets/images/logo-spkt.webp') }}" alt="Logo SPKT"
                loading="lazy" />
        </section>
    </section>

    <section class="max-w-7xl mx-auto flex flex-col items-center justify-center gap-5 py-10 px-4">
        <h1 class="text-4xl text-black font-semibold text-center leading-normal">Lokasi Kami</h1>
        <iframe title="Alamat Kepolisian Resor Kabupaten Karawang" class="w-full"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.466401190948!2d107.333213!3d-6.3335734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697819aaaaaa93%3A0x7235e241f13cb603!2sPolres%20Karawang!5e0!3m2!1sen!2sid!4v1716014797071!5m2!1sen!2sid"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection

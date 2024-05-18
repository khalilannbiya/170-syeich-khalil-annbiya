@extends('layouts.frontend')

@section('title', 'Beranda | ')

@section('content')
    <section class="pt-[60px] md:pt-[82px] flex items-center">
        <section
            class="bg-gradient-hero flex w-full justify-center items-center gap-6 h-[29rem] md:h-[26rem] lg:h-[29rem] py-10 px-2 md:px-10 lg:px-10 lg:py-10 rounded-xl">
            <div class="flex items-center justify-center gap-6 max-w-7xl rounded-xl">
                <div class="self-start hidden lg:block">
                    <img class="w-64 xl:w-56" src="{{ asset('assets/icons/siren.webp') }}" alt="Icon Siren" loading="lazy">
                </div>
                <div class="flex flex-col items-center justify-center gap-6">
                    <h1 class="text-[2.2rem] leading-tight text-white lg:text-5xl text-center font-semibold ">
                        Ciptakan Masyarakat Aman dan Nyaman
                    </h1>
                    <p class="text-center text-white text-sm max-w-[20rem] sm:max-w-md lg:max-w-xl leading-normal">
                        Keamanan bukan hanya hak, tapi tanggung jawab bersama. LaporPak hadir sebagai platform pengaduan
                        masyarakat yang mudah diakses, terpercaya, dan responsif, untuk membantu Anda melawan tindak
                        kejahatan dan membangun lingkungan yang lebih aman.
                    </p>
                    <a href="#" aria-label="Menuju Halaman Buat Laporan"
                        class="flex w-[10rem] items-center justify-center px-4 gap-3 md:mt-4 select-none bg-black py-3 text-center align-middle text-sm font-bold text-white hover:bg-slate-700 hover:shadow-xl hover:-translate-y-2 transition-all duration-500 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none border-[1.5px] border-black rounded-lg">
                        Ayo Melapor
                    </a>
                </div>
                <div class="self-end hidden lg:block">
                    <img class="w-64 xl:w-56" src="{{ asset('assets/icons/police-car-icon.webp') }}" alt="Icon Police Car"
                        loading="lazy">
                </div>
            </div>
        </section>
    </section>

    <section class="flex items-center justify-center py-24">
        <section class="flex flex-col items-center justify-center gap-20 max-w-7xl">
            <section class="flex flex-col items-center justify-center gap-5">
                <h1 class="text-4xl font-semibold text-center text-black">Keunggulan kami</h1>
                <p class="text-center text-sm max-w-[20rem] sm:max-w-md lg:max-w-lg leading-normal text-slate-400">
                    Laporpak hadir sebagai solusi inovatif untuk membantu masyarakat dalam melaporkan tindak kejahatan dan
                    membangun lingkungan yang lebih aman.
                </p>
            </section>
            <section class="w-full">
                <ul class="flex flex-wrap items-center justify-center gap-16 lg:gap-10">
                    <li class="group w-[20rem] flex flex-col items-center justify-center gap-6 rounded-xl">
                        <div
                            class="group-hover:-translate-y-2 transition-all duration-500 ease-in-out bg-black border border-black p-5 rounded-[50%] group-hover:bg-slate-700">
                            <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 24 24" style="transform: ;msFilter:;">
                                <path
                                    d="M5 22h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2h-2a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1H5c-1.103 0-2 .897-2 2v15c0 1.103.897 2 2 2zM5 5h2v2h10V5h2v15H5V5z">
                                </path>
                                <path d="m11 13.586-1.793-1.793-1.414 1.414L11 16.414l5.207-5.207-1.414-1.414z"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3 text-center">
                            <h2 class="text-2xl font-medium text-black">Kemudahan Pengaduan</h2>
                            <p class="text-sm text-slate-400">Proses pelaporan yang sederhana dan mudah dimengerti
                            </p>
                        </div>
                    </li>
                    <li class="group w-[20rem] flex flex-col items-center justify-center gap-6">
                        <div
                            class="group-hover:-translate-y-2 transition-all duration-500 ease-in-out bg-black border border-black p-5 rounded-[50%] group-hover:bg-slate-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                <path
                                    d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3 text-center">
                            <h2 class="text-2xl font-medium text-black">Respon Cepat dan Tepat</h2>
                            <p class="text-sm text-slate-400">Tim profesional yang berpengalaman dalam menangani berbagai
                                kasus kejahatan
                            </p>
                        </div>
                    </li>
                    <li class="group w-[20rem] flex flex-col items-center justify-center gap-6">
                        <div
                            class="group-hover:-translate-y-2 transition-all duration-500 ease-in-out bg-black border border-black p-5 rounded-[50%] group-hover:bg-slate-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                <path
                                    d="m21.857 8.485-3-5A.997.997 0 0 0 18 3h-4.586l-.707-.707a.999.999 0 0 0-1.414 0L10.586 3H6a.997.997 0 0 0-.857.485l-3 5A1.001 1.001 0 0 0 2.002 9H2v10a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9h-.002c0-.178-.046-.356-.141-.515zM20 18h-6v-4h-4v4H4v-8h2.414l.293-.293 2-2L12 4.414l4.293 4.293 1 1 .293.293H20v8z">
                                </path>
                                <circle cx="11.895" cy="9.895" r="2.105"></circle>
                                <path d="M6 12h2v3H6zm10 0h2v3h-2z"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-3 text-center">
                            <h2 class="text-2xl font-medium text-black">Membangun Komunitas </h2>
                            <p class="text-sm text-slate-400">Saling mengingatkan dan menjaga keamanan bersama</p>
                        </div>
                    </li>
                </ul>
            </section>
        </section>
    </section>

    <section class="py-24 mx-auto flex flex-col justify-center items-center bg-[#F4F8FB] rounded-xl">
        <section class="max-w-7xl flex flex-col gap-20">
            <section class="flex flex-col justify-center items-center gap-5">
                <h1 class="text-4xl text-black font-semibold">Lacak Laporan</h1>
                <p class="text-center text-sm max-w-[20rem] sm:max-w-md lg:max-w-lg leading-normal text-slate-400">
                    Gunakan kode unik yang telah diberikan saat pelaporan untuk melacak status laporan Anda. Dengan ini,
                    Anda
                    dapat memantau perkembangan penanganan laporan secara transparan dan akurat
                </p>
            </section>
            <form action="#" method="GET" class="w-full flex gap-2 md:gap-3">
                <input type="text" name="keyword" id="default-search"
                    class="w-full p-3 text-sm text-black placeholder:text-black border border-black rounded-lg bg-transparent focus:ring-black focus:border-black"
                    placeholder="Masukan kode unik..." required />
                <button type="submit" aria-label="Cari berdasarkan kode unik"
                    class="text-white md:w-40 bg-black hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-black font-medium rounded-md text-sm px-4 py-2">Cari</button>
            </form>
        </section>
    </section>

    <section class="flex items-center justify-center mx-auto py-28">
        <section class="flex flex-col items-center justify-center gap-10 px-4 max-w-7xl lg:flex-row md:gap-16">
            <section class="grid gap-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <img loading="lazy"
                            class="h-[12rem] w-[40rem] object-cover object-center rounded-lg hidden md:block"
                            src="{{ asset('assets/images/aboutus-2.webp') }}" alt="Gambar Polisi">
                    </div>
                    <div>
                        <img loading="lazy"
                            class="h-[12rem] w-[40rem] object-cover object-center rounded-lg hidden md:block"
                            src="{{ asset('assets/images/aboutus-3.webp') }}" alt="Gambar Polisi">
                    </div>
                </div>
                <div>
                    <img loading="lazy"
                        class="h-[12rem] w-full lg:w-[40rem] object-cover object-center block md:hidden lg:block rounded-lg"
                        src="{{ asset('assets/images/aboutus-1.webp') }}" alt="Gambar Polisi">
                </div>
            </section>
            <section class="flex flex-col items-center justify-center gap-5 lg:items-start md:gap-10">
                <h1 class="text-4xl font-semibold text-center text-black lg:text-left">Tentang Kami</h1>
                <p class="text-sm leading-normal text-center lg:text-left text-slate-400">
                    Laporpak merupakan sistem informasi pengaduan masyarakat yang diinisiasi oleh Kepolisian Resor Kabupaten
                    Karawang. Sistem ini hadir sebagai platform digital yang mudah diakses dan terpercaya untuk membantu
                    masyarakat dalam melaporkan berbagai tindak kejahatan dan membangun lingkungan yang lebih aman di
                    wilayah Kabupaten Karawang.
                </p>
                <a href="{{ route('about-us') }}" aria-label="Menuju Halaman Tentang Kami"
                    class="px-4 py-3 text-sm font-medium text-white transition-all duration-500 ease-in-out bg-black border border-black rounded-lg hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-black">Lihat
                    Selengkapnya</a>
            </section>
        </section>
    </section>

    <section class="py-24 mx-auto flex flex-col justify-center items-center bg-[#F4F8FB] rounded-xl">
        <section class="max-w-7xl flex flex-col gap-20">
            <section class="flex flex-col justify-center items-center gap-5">
                <h1 class="text-4xl text-black font-semibold">Aduan Terbaru</h1>
                <p class="text-center text-sm max-w-[20rem] sm:max-w-md lg:max-w-lg leading-normal text-slate-400">
                    Laporpak senantiasa berkomitmen untuk memberikan pelayanan terbaik kepada masyarakat dalam hal pengaduan
                    tindak kejahatan.
                </p>
            </section>
            <section class="flex flex-col justify-center items-center gap-6">
                <section class="w-full md:py-6 flex flex-wrap justify-center items-center gap-3 md:gap-4">

                    {{-- Card Report --}}
                    @for ($i = 1; $i <= 3; $i++)
                        <x-frontend.card-report />
                    @endfor
                </section>
                <section class="flex justify-center items-center">
                    <a href="{{ route('public-report') }}" aria-label="Menuju halaman lihat aduan publik"
                        class="items-center justify-center px-4 gap-3 select-none bg-transparent py-3 text-center align-middle text-sm font-bold text-black hover:bg-black hover:text-white transition-all duration-500 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none border-[1.5px] border-black rounded-lg">
                        Lihat Selengkapnya
                    </a>
                </section>
            </section>
        </section>
    </section>
@endsection

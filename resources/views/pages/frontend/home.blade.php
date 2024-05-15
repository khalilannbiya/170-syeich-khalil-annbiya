@extends('layouts.frontend')

@section('title', 'Beranda | ')

@section('content')
    <section class="pt-[60px] md:pt-[82px] flex items-center">
        <section
            class="bg-gradient-hero flex w-full justify-center items-center gap-6 h-[29rem] md:h-[26rem] lg:h-[29rem] py-10 px-2 md:px-10 lg:px-10 lg:py-10 rounded-xl">
            <div class="max-w-7xl flex justify-center items-center gap-6 rounded-xl">
                <div class="self-start hidden lg:block">
                    <img class="w-64 xl:w-56" src="{{ asset('assets/icons/siren.webp') }}" alt="Icon Siren" loading="lazy">
                </div>
                <div class="flex flex-col justify-center items-center gap-6">
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
    <section class="flex justify-center items-center py-24">
        <section class="max-w-7xl flex flex-col justify-center items-center gap-20">
            <section class="flex flex-col justify-center items-center gap-5">
                <h1 class="text-4xl text-black text-center font-semibold">Keunggulan kami</h1>
                <p class="text-center text-sm max-w-[20rem] sm:max-w-md lg:max-w-lg leading-normal text-slate-400">
                    Laporpak hadir sebagai solusi inovatif untuk membantu masyarakat dalam melaporkan tindak kejahatan dan
                    membangun lingkungan yang lebih aman.
                </p>
            </section>
            <section class="w-full">
                <ul class="flex justify-center items-center flex-wrap gap-16 lg:gap-10">
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
                        <div class="flex flex-col justify-center items-center text-center gap-3">
                            <h2 class="text-2xl text-black font-medium">Kemudahan Pengaduan</h2>
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
                        <div class="flex flex-col justify-center items-center text-center gap-3">
                            <h2 class="text-2xl text-black font-medium">Respon Cepat dan Tepat</h2>
                            <p class="text-sm text-slate-400">Tim respons yang sigap dan profesional
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
                        <div class="flex flex-col justify-center items-center text-center gap-3">
                            <h2 class="text-2xl text-black font-medium">Membangun Komunitas </h2>
                            <p class="text-sm text-slate-400">Kerjasama dengan berbagai pihak</p>
                        </div>
                    </li>
                </ul>
            </section>
        </section>
    </section>
@endsection

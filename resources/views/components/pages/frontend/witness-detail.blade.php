<x-layouts.frontend>
    <x-slot:title>Saksi Detail | </x-slot:title>

    <x-partials.frontend.banner>
        <x-slot:title>Saksi Detail</x-slot:title>
        <li class="inline-flex items-center">
            <a href="{{ route('index') }}" aria-label="Kembali Ke Halaman Beranda"
                class="inline-flex items-center text-sm font-medium text-white hover:text-slate-300">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Beranda
            </a>
        </li>
        @auth
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-white rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('reporter.reports.index') }}"
                        class="text-sm font-medium text-white ms-1 md:ms-2">Riwayat</a>
                </div>
            </li>
        @endauth
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-white rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <a href="{{ route('reporter.reports.show', $witness->report->slug) }}"
                    class="text-sm font-medium text-white ms-1 md:ms-2">Detail
                    Laporan</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 rtl:rotate-180 text-slate-300" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="text-sm font-medium ms-1 text-slate-300 md:ms-2">Saksi Detail</span>
            </div>
        </li>
    </x-partials.frontend.banner>

    <section class="flex flex-col items-center justify-center gap-6 py-9">
        <section class="w-full py-8 max-w-7xl">
            <div class="flex items-center justify-start gap-3">
                <h1 class="text-xl font-semibold capitalize">{{ $witness->name }}</h1>
            </div>
            <p class="mb-2 font-medium">{{ $witness->phone }}</p>
            <p class="mb-1 font-medium">Alamat: <span class="font-semibold capitalize">{{ $witness->address }}</span>
            </p>

            <div class="border border-black mb-7"></div>

            <p class="font-medium text-pretty">{{ $witness->description }}</p>
        </section>
    </section>

</x-layouts.frontend>

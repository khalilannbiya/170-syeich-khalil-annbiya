<x-layouts.frontend>
    <x-slot:title>Riwayat Laporan | </x-slot:title>

    <x-partials.frontend.banner>
        <x-slot:title>Riwayat Laporan</x-slot:title>
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
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-slate-300 mx-1" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-sm font-medium text-slate-300 md:ms-2">Riwayat Laporan</span>
            </div>
        </li>
    </x-partials.frontend.banner>

    <section class="py-24 mx-auto flex flex-col justify-center items-center bg-[#F4F8FB] rounded-xl">
        <section class="max-w-7xl flex flex-col gap-20">
            <form action="#" method="GET" class="w-full flex gap-2 md:gap-3">
                <input type="text" namex="keyword" id="default-search"
                    class="w-full p-3 text-sm text-black placeholder:text-black border border-black rounded-lg bg-transparent focus:ring-black focus:border-black"
                    placeholder="Masukan kata kunci..." required />
                <button type="submit" aria-label="Cari berdasarkan kode unik"
                    class="text-white md:w-40 bg-black hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-black font-medium rounded-md text-sm px-4 py-2">Cari</button>
            </form>
        </section>
    </section>

    <section class="flex flex-col justify-center items-center gap-6">
        <section class="w-full max-w-7xl md:py-6 flex flex-wrap justify-center items-center gap-3 md:gap-4">

            @for ($i = 1; $i <= 3; $i++)
                <x-partials.frontend.card-report />
            @endfor
        </section>
    </section>
</x-layouts.frontend>

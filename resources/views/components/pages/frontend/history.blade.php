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
                <svg class="w-3 h-3 mx-1 rtl:rotate-180 text-slate-300" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="text-sm font-medium ms-1 text-slate-300 md:ms-2">Riwayat Laporan</span>
            </div>
        </li>
    </x-partials.frontend.banner>

    <section class="py-24 mx-auto flex flex-col justify-center items-center bg-[#F4F8FB] rounded-xl">
        <section class="flex flex-col gap-20 max-w-7xl">
            <form action="{{ route('reporter.reports.index') }}" method="GET" class="flex w-full gap-2 md:gap-3">
                <input type="text" name="keyword" id="default-search"
                    class="w-full p-3 text-sm text-black bg-transparent border border-black rounded-lg placeholder:text-black focus:ring-black focus:border-black"
                    placeholder="Masukan kata kunci..." required />
                <button type="submit" aria-label="Cari berdasarkan kata kunci"
                    class="px-4 py-2 text-sm font-medium text-white bg-black rounded-md md:w-40 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-black">Cari</button>
            </form>
        </section>
    </section>

    <section class="flex flex-col items-center justify-center gap-6">
        <section class="flex flex-wrap items-center justify-center w-full gap-3 my-10 max-w-7xl md:py-6 md:gap-4">

            @forelse ($reports as $report)
                <x-partials.frontend.card-report :report="$report">
                    <a href="{{ route('reporter.reports.show', $report->slug) }}" aria-label="Lihat Detail Laporan"
                        class="flex items-center justify-between px-4 gap-3 select-none rounded-md bg-black py-3 text-center align-middle text-sm font-bold text-white shadow-md shadow-slate-500/20 transition-all hover:shadow-lg hover:shadow-slate-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Detail
                    </a>
                </x-partials.frontend.card-report>
            @empty
                <div class="flex flex-col justify-center capitalize">
                    <p class="text-lg font-bold">belum ada laporan yang dibuat!</p>
                    <p class="mt-3 text-base font-medium text-gray-500">anda dapat membuat laporan <a
                            class="underline cursor-pointer text-deep-koamaru-600"
                            href="{{ route('reporter.reports.create') }}">disini</a>
                    </p>
                </div>
            @endforelse
        </section>
    </section>

    {{-- Pagination --}}
    {{-- if the $products has more than one page (meaning there are multiple pages) --}}
    @if ($reports->lastPage() > 1)
        <section class="flex flex-col items-center justify-center">
            <section class="flex justify-center w-full mx-auto my-5 max-w-7xl md:py-6">
                {{ $reports->links('components.partials.frontend.pagination') }}
            </section>
        </section>
    @endif
</x-layouts.frontend>

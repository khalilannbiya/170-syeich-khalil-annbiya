<x-layouts.frontend>
    <x-slot:title>Detail Laporan | </x-slot:title>

    <x-partials.frontend.banner>
        <x-slot:title>Detail Laporan</x-slot:title>
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
                <span class="ms-1 text-sm font-medium text-slate-300 md:ms-2">Detail Laporan</span>
            </div>
        </li>
    </x-partials.frontend.banner>

    <section class="flex flex-col justify-center items-center gap-6 py-9">
        <section class="w-full max-w-7xl py-8">
            <h1 class="text-4xl font-semibold mb-7">Laporan #127882</h1>
            <div class="flex gap-3 justify-start items-center">
                <h1 class="font-semibold text-lg">Syeich Khalil Annbiya</h1>
                <p class="px-3 py-1 font-semibold text-sm text-gray-500 border rounded-md">127882</p>
            </div>
            <p class="font-medium mb-2">20:02, 20-01-2022</p>
            <p class="font-medium mb-1">Status laporan: <span class="font-semibold capitalize">Sedang Diproses</span>
            </p>
            <p class="font-medium mb-1">Didisposisikan ke <span class="font-semibold capitalize">Sat intelkam, Sat
                    lantas</span></p>
            <p class="font-medium mb-7">Kategori laporan: <span class="font-semibold capitalize">Pemerkosaan
                    dan
                    perbuatan
                    cabul</span>
            </p>

            <div class="border border-black mb-7"></div>

            <h1 class="text-pretty text-2xl capitalize font-semibold mb-4">Lorem ipsum dolor sit, amet consectetur
                adipisicing
                elit.
                Doloribus,
                aperiam?</h1>
            <p class="text-pretty font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Corrupti
                accusantium molestiae vero, eveniet assumenda veniam natus eos dolores, distinctio et commodi quis
                necessitatibus libero error, odio voluptatem quam? Quos minus sit necessitatibus facilis iste! Mollitia
                repellendus voluptas ipsum possimus dolores saepe qui maiores illo officia ratione, exercitationem eius
                repudiandae officiis consequuntur commodi facilis sunt, aspernatur accusantium! Impedit atque ut
                repellendus veniam quibusdam, facere odit eum doloremque cupiditate alias, officia dolorum consectetur
                deserunt expedita hic numquam iure animi id neque dolores ducimus amet soluta. Fugiat saepe voluptatem
                nesciunt sint deleniti ipsa iusto possimus! Sunt obcaecati similique quo velit maiores. Quibusdam,
                laborum!</p>


            <section class="mt-10 md:mt-14">
                <div class="flex flex-col">
                    <ul class="flex justify-center items-center gap-2 mb-4">
                        <li class="flex cursor-pointer border">
                            <a class="inline-block py-2 px-4 text-lg xl:text-base font-semibold text-gray-500 hover:text-black"
                                data-tab="bukti">
                                Bukti</a>
                        </li>
                        <li class="flex cursor-pointer border">
                            <a class="inline-block py-2 px-4 text-lg xl:text-base font-semibold text-gray-500 hover:text-black"
                                data-tab="lokasi">
                                Lokasi</a>
                        </li>
                    </ul>

                    <div class="border border-gray-200 rounded-md">
                        <div class="p-4 flex gap-2 md:gap-4 flex-wrap" id="firts-tab-content" data-tab-content="bukti">
                            @for ($i = 1; $i <= 5; $i++)
                                <a href="{{ asset('assets/images/aboutus-2.webp') }}" target="_blank"
                                    class="relative group cursor-pointer">
                                    <p
                                        class="absolute lg:hidden truncate lg:group-hover:block bg-black text-white text-xs px-1 py-2 w-full bottom-0">
                                        Lorem ipsum dolor sit amet.</p>
                                    <img src="{{ asset('assets/images/aboutus-2.webp') }}"
                                        class="size-32 md:size-36 object-cover object-center" alt="Bukti Laporan"
                                        loading="lazy">
                                </a>
                            @endfor
                        </div>
                        <div class="p-4 hidden" data-tab-content="lokasi">
                            <p>Ini adalah konten untuk Tab 2.</p>
                        </div>
                    </div>
                </div>
            </section>

        </section>
    </section>

    @push('script')
        <script>
            const tabs = document.querySelectorAll('[data-tab]');
            const contentSections = document.querySelectorAll('[data-tab-content]');

            function activateTab(clickedTab) {
                tabs.forEach(tab => {
                    tab.classList.remove('text-black');
                    tab.classList.add('text-gray-500');
                });

                clickedTab.classList.toggle('text-black');
                clickedTab.classList.toggle('text-gray-500');

                const contentToShow = document.querySelector(`[data-tab-content="${clickedTab.dataset.tab}"]`);
                contentSections.forEach(section => section.classList.add('hidden'));
                contentToShow.classList.remove('hidden');
            }

            window.addEventListener('load', function() {
                const firstTab = tabs[0]; // Select the first tab by default
                activateTab(firstTab);
            });

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    activateTab(tab);
                });
            });
        </script>
    @endpush
</x-layouts.frontend>

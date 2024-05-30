<x-layouts.dashboard>
    <x-slot:title>Detail Laporan | </x-slot:title>

    <div>
        {{-- Alert --}}
        @if (!$report->reportDivisions()->exists())
            <div
                class="flex w-full border-l-6 border-warning bg-warning bg-opacity-[15%] px-7 py-8 mb-10 shadow-md dark:bg-[#1B1B24] dark:bg-opacity-30 md:p-9">
                <div class="mr-5 flex h-9 w-9 items-center justify-center rounded-lg bg-warning bg-opacity-30">
                    <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.50493 16H17.5023C18.6204 16 19.3413 14.9018 18.8354 13.9735L10.8367 0.770573C10.2852 -0.256858 8.70677 -0.256858 8.15528 0.770573L0.156617 13.9735C-0.334072 14.8998 0.386764 16 1.50493 16ZM10.7585 12.9298C10.7585 13.6155 10.2223 14.1433 9.45583 14.1433C8.6894 14.1433 8.15311 13.6155 8.15311 12.9298V12.9015C8.15311 12.2159 8.6894 11.688 9.45583 11.688C10.2223 11.688 10.7585 12.2159 10.7585 12.9015V12.9298ZM8.75236 4.01062H10.2548C10.6674 4.01062 10.9127 4.33826 10.8671 4.75288L10.2071 10.1186C10.1615 10.5049 9.88572 10.7455 9.50142 10.7455C9.11929 10.7455 8.84138 10.5028 8.79579 10.1186L8.13574 4.75288C8.09449 4.33826 8.33984 4.01062 8.75236 4.01062Z"
                            fill="#FBBF24"></path>
                    </svg>
                </div>
                <div class="w-full">
                    <h5 class="mb-3 text-lg font-bold text-[#9D5425]">
                        Attention needed
                    </h5>
                    <p class="leading-relaxed text-[#D0915C]">
                        Laporan ini belum didisposisikan. Silahkan segera diproses!
                    </p>
                </div>
            </div>
        @endif

        {{-- Breadcrumb --}}
        <nav class="mb-5">
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route('adminisrator.dashboard') }}">Dashboard /</a>
                </li>
                <li>
                    <a class="font-medium" href="{{ route('adminisrator.reports.getAdminReportsList') }}">Laporan /</a>
                </li>
                <li class="font-medium text-primary">Detail</li>
            </ol>
        </nav>

        {{-- Data Pelapor Start --}}
        <div
            class="rounded-sm border border-stroke bg-white-dahsboard shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-semibold text-black-dashboard dark:text-white-dahsboard">
                    Data Pelapor
                </h3>
            </div>
            <div class="p-6.5">
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nama
                    </label>
                    <input type="text" disabled readonly value="{{ $report->user->name }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Email
                    </label>
                    <input type="text" disabled readonly value="{{ $report->user->email }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nomor Telepon
                    </label>
                    <input type="text" disabled readonly value="{{ $report->user->phone }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nomor Induk Kependudukan
                    </label>
                    <input type="text" disabled readonly value="{{ $report->user->nik }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Alamat
                    </label>
                    <input type="text" disabled readonly value="{{ $report->user->address }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>
            </div>
        </div>
        {{-- Data Pelapor End --}}


        {{-- Data Laporan Start --}}
        <div
            class="rounded-sm border border-stroke mt-5 bg-white-dahsboard shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-semibold text-black-dashboard dark:text-white-dahsboard">
                    Data Laporan #{{ $report->unic_code }}
                </h3>
            </div>
            <div class="p-6.5">
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Kategori
                    </label>
                    <input type="text" disabled readonly value="{{ $report->category->name }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Didisposisikan
                    </label>
                    <input type="text" disabled readonly
                        value="{{ $report->reportDivisions()->exists() ? 'uhuy' : 'Belum didisposisikan' }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Judul Laporan
                    </label>
                    <input type="text" disabled readonly value="{{ $report->title }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Lokasi
                    </label>
                    <input type="text" disabled readonly value="{{ $report->location }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Status
                    </label>
                    <input type="text" disabled readonly value="{{ $report->status }}"
                        class="w-full capitalize rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Waktu Kejadian
                    </label>
                    <input type="text" disabled readonly
                        value="{{ \Carbon\Carbon::parse($report->time)->format('H:i, d-m-Y') }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Kode Unik
                    </label>
                    <input type="text" disabled readonly value="{{ $report->unic_code }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Dilaporkan sejak
                    </label>
                    <input type="text" disabled readonly value="{{ $report->created_at->format('H:i, d-m-Y') }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Terakhir Update
                    </label>
                    <input type="text" disabled readonly
                        value="{{ $report->updated_at->format('H:i, d-m-Y') == $report->created_at->format('H:i, d-m-Y') ? 'Belum ada update' : $report->updated_at->format('H:i, d-m-Y') }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Isi Laporan
                    </label>
                    <textarea rows="6" disabled readonly
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">{{ $report->description }}</textarea>
                </div>
            </div>
        </div>
        {{-- Data Laporan End --}}

        {{-- Tabs Evidences and Witnesses Start --}}
        <section
            class="mt-10 md:mt-14 p-5 rounded-sm bg-white-dahsboard dark:bg-boxdark border border-stroke shadow-default dark:border-strokedark">
            <div class="flex flex-col">
                <ul class="flex items-center justify-center gap-2 mb-4">
                    <li class="flex border cursor-pointer">
                        <a class="inline-block px-4 py-2 text-lg font-semibold text-gray-500 dark:text-gray-400 xl:text-base hover:text-black-dashboard dark:hover:text-white-dahsboard"
                            data-tab="bukti">
                            Bukti</a>
                    </li>
                    <li class="flex border cursor-pointer">
                        <a class="inline-block px-4 py-2 text-lg font-semibold text-gray-500 dark:text-gray-400 xl:text-base hover:text-black-dashboard dark:hover:text-white-dahsboard"
                            data-tab="saksi">
                            Saksi</a>
                    </li>
                </ul>

                <div class="border border-gray-400 dark:border-gray-300 rounded-md">
                    <div class="flex flex-wrap flex-col md:flex-row justify-center md:justify-start gap-2 p-4 md:gap-4"
                        id="firts-tab-content" data-tab-content="bukti">
                        @if ($report->evidences()->exists())
                            @foreach ($report->evidences as $item)
                                <article
                                    class="p-5 bg-white-dahsboard shadow-lg dark:bg-black-dashboard md:basis-[45%]">
                                    <div>
                                        <a href="{{ Storage::url($item->url) }}" target="_blank">
                                            <img class="w-full h-36 object-cover object-center"
                                                src="{{ Storage::url($item->url) }}" alt="Bukti laporan">
                                        </a>
                                    </div>
                                    <div>
                                        <h1 id="title-evidence"
                                            class="text-lg mt-2 text-black-dashboard dark:text-white-dahsboard font-semibold capitalize">
                                            {{ $item->title }}
                                        </h1>
                                        <p id="description-evidence"
                                            class="mt-2 text-base text-gray-500 dark:text-gray-300 font-medium text-pretty">
                                            {{ $item->description }}</p>
                                    </div>
                                    <a href="{{ route('adminisrator.reports.getDetailedEvidence', [$item->report_id, $item->id]) }}"
                                        class="mt-4 cursor-pointer text-deep-koamaru-600">Lihat
                                        detail...</a>
                                </article>
                            @endforeach
                        @else
                            <p>Belum ada bukti</p>
                        @endif
                    </div>
                    <div class="hidden p-4" data-tab-content="saksi">
                        <div class="flex flex-col gap-2 md:w-full md:flex-row md:flex-wrap">
                            @if ($report->witnesses()->exists())
                                @foreach ($report->witnesses as $item)
                                    <article
                                        class="p-5 bg-white-dahsboard dark:bg-black-dashboard shadow-lg md:basis-[45%]">
                                        <h1
                                            class="text-lg text-black-dashboard dark:text-white-dahsboard font-semibold capitalize">
                                            {{ $item->name }}
                                        </h1>
                                        <p class="mt-1 text-base font-medium">{{ $item->phone }}</p>
                                        <address class="mt-1 text-base">{{ $item->address }}</address>
                                        <p id="description-witness"
                                            class="mt-2 text-base text-gray-500 dark:text-gray-300 font-medium text-pretty">
                                            {{ $item->description }}</p>
                                        <a href="{{ route('adminisrator.reports.getDetailedWitness', [$item->report_id, $item->id]) }}"
                                            class="mt-2 cursor-pointer text-deep-koamaru-600">Lihat
                                            detail...</a>
                                    </article>
                                @endforeach
                            @else
                                <p>Belum ada saksi</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Tabs Evidences and Witnesses End --}}

    </div>

    @push('script')
        <script>
            const tabs = document.querySelectorAll('[data-tab]');
            const contentSections = document.querySelectorAll('[data-tab-content]');

            function activateTab(clickedTab) {
                tabs.forEach(tab => {
                    tab.classList.remove('text-black-dashboard');
                    tab.classList.remove('dark:text-white-dahsboard');
                    tab.classList.add('text-gray-500');
                    tab.classList.add('dark:text-gray-400');
                });

                clickedTab.classList.toggle('text-black-dashboard');
                clickedTab.classList.toggle('dark:text-white-dahsboard');
                clickedTab.classList.toggle('text-gray-500');
                clickedTab.classList.toggle('dark:text-gray-400');

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
        <script>
            // Text Elipsis via javascript
            function shortenText(elementSelector, maxLength, elipsis) {
                let elements = document.querySelectorAll(elementSelector);

                elements.forEach(function(element) {
                    let textContent = element.textContent.trim();

                    if (textContent.length > maxLength) {
                        if (elipsis) {
                            let shortenedContent =
                                textContent.substring(0, maxLength) + " ...";
                            element.textContent = shortenedContent;
                        } else {
                            let shortenedContent = textContent.substring(0, maxLength);
                            element.textContent = shortenedContent;
                        }
                    }
                });
            }

            shortenText("#description-witness", 50, true);
            shortenText("#description-evidence", 50, true);
            shortenText("#title-evidence", 70, true);
        </script>
    @endpush
</x-layouts.dashboard>

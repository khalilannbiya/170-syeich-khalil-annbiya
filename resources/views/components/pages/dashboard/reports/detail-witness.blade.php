<x-layouts.dashboard>
    <x-slot:title>Detail Saksi | </x-slot:title>

    <div>
        {{-- Breadcrumb --}}
        <nav class="mb-5">
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium"
                        href="{{ route(strtolower(auth()->user()->role->name) . '.dashboard') }}">Dashboard /</a>
                </li>
                <li>
                    <a class="font-medium"
                        href="{{ route(strtolower(auth()->user()->role->name) . '.reports' . (strtolower(auth()->user()->role->name) == 'adminisrator' ? '.getAdminReportsList' : '.getDepartementReportsList')) }}">Laporan
                        /</a>
                </li>
                <li>
                    <a class="font-medium"
                        href="{{ route(strtolower(auth()->user()->role->name) . '.reports.getDetailedReport', $witness->report->slug) }}">Detail
                        /</a>
                </li>
                <li class="font-medium text-primary">Detail Saksi</li>
            </ol>
        </nav>

        {{-- Data Pelapor Start --}}
        <div
            class="rounded-sm border border-stroke bg-white-dahsboard shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-semibold text-black-dashboard dark:text-white-dahsboard">
                    Detail Saksi
                </h3>
            </div>
            <div class="p-6.5">
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nama
                    </label>
                    <input type="text" disabled readonly value="{{ $witness->name }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nomor Telepon
                    </label>
                    <input type="text" disabled readonly value="{{ $witness->phone }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Alamat
                    </label>
                    <input type="text" disabled readonly value="{{ $witness->address }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Deskripsi Saksi
                    </label>
                    <textarea rows="6" disabled readonly
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">{{ $witness->description !== null ? $witness->description : 'Tidak ada deskripsi' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>

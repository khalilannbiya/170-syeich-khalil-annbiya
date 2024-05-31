<x-layouts.dashboard>
    <x-slot:title>Edit | </x-slot:title>

    <div>
        {{-- Alert --}}
        @if ($errors->any())
            <div
                class="flex mb-5 w-full border-l-6 border-[#F87171] bg-[#F87171] bg-opacity-[15%] px-7 py-8 shadow-md dark:bg-[#1B1B24] dark:bg-opacity-30 md:p-9">
                <div class="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-[#F87171]">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.4917 7.65579L11.106 12.2645C11.2545 12.4128 11.4715 12.5 11.6738 12.5C11.8762 12.5 12.0931 12.4128 12.2416 12.2645C12.5621 11.9445 12.5623 11.4317 12.2423 11.1114C12.2422 11.1113 12.2422 11.1113 12.2422 11.1113C12.242 11.1111 12.2418 11.1109 12.2416 11.1107L7.64539 6.50351L12.2589 1.91221L12.2595 1.91158C12.5802 1.59132 12.5802 1.07805 12.2595 0.757793C11.9393 0.437994 11.4268 0.437869 11.1064 0.757418C11.1063 0.757543 11.1062 0.757668 11.106 0.757793L6.49234 5.34931L1.89459 0.740581L1.89396 0.739942C1.57364 0.420019 1.0608 0.420019 0.740487 0.739944C0.42005 1.05999 0.419837 1.57279 0.73985 1.89309L6.4917 7.65579ZM6.4917 7.65579L1.89459 12.2639L1.89395 12.2645C1.74546 12.4128 1.52854 12.5 1.32616 12.5C1.12377 12.5 0.906853 12.4128 0.758361 12.2645L1.1117 11.9108L0.758358 12.2645C0.437984 11.9445 0.437708 11.4319 0.757539 11.1116C0.757812 11.1113 0.758086 11.111 0.75836 11.1107L5.33864 6.50287L0.740487 1.89373L6.4917 7.65579Z"
                            fill="#ffffff" stroke="#ffffff"></path>
                    </svg>
                </div>
                <div class="w-full">
                    <h5 class="mb-3 font-bold text-[#B45454]">
                        Error
                    </h5>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="leading-relaxed text-[#CD5D5D]">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
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
                <li class="font-medium text-primary">Edit</li>
            </ol>
        </nav>

        {{-- Change Status --}}
        <div
            class="rounded-sm border border-stroke bg-white-dahsboard shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-semibold text-black-dashboard dark:text-white-dahsboard">
                    Ubah Status
                </h3>
            </div>
            <div class="p-6.5">
                <form action="{{ route('adminisrator.reports.update', $report->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="mb-4.5">
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="status"
                                class="relative z-20 w-full appearance-none capitalize rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true">
                                <option disabled selected class="text-body capitalize">Pilih Status</option>
                                @forelse ($statuses as $status)
                                    <option class="text-body capitalize" value="{{ $status }}"
                                        {{ $report->status == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @empty
                                    <option disabled class="text-body capitalize">Belum ada kategori</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <button
                        class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray-dashboard hover:bg-opacity-90">
                        Ubah Status
                    </button>
                </form>
            </div>
        </div>

        {{-- Change Disposition --}}
        <div
            class="rounded-sm border mt-10 border-stroke bg-white-dahsboard shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-semibold text-black-dashboard dark:text-white-dahsboard">
                    Ubah disposisi
                </h3>
            </div>
            <div class="p-6.5">
                    <form action="{{ route('adminisrator.reports.disposisi.update', $report->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-4.5">
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                                @foreach ($report->reportDivisions as $item)
                                    <select name="disposition[]"
                                        class="relative mb-3 z-20 w-full appearance-none capitalize rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        :class="isOptionSelected && 'text-black dark:text-white'"
                                        @change="isOptionSelected = true">
                                        <option disabled selected class="text-body capitalize">Pilih Divisi</option>
                                        @foreach ($divisions as $division)
                                            <option class="text-body capitalize"
                                                value="{{ $item->division_id == $division->id ? $division->id : $division->id }}"
                                                {{ $item->division_id == $division->id ? 'selected' : '' }}>
                                                {{ $item->division_id == $division->id ? $division->name : $division->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="reportDivisionId[]" value="{{ $item->id }}" hidden>
                                @endforeach
                            </div>
                        </div>

                        <button
                            class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray-dashboard hover:bg-opacity-90">
                            Ubah disposisi
                        </button>
                    </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>

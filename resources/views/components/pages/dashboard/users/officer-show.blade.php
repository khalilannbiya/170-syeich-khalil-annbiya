<x-layouts.dashboard>
    <x-slot:title>Detail Petugas | </x-slot:title>

    <div>
        {{-- Breadcrumb --}}
        <nav class="mb-5">
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route('adminisrator.dashboard') }}">Dashboard /</a>
                </li>
                <li>
                    <a class="font-medium" href="{{ route('adminisrator.users.officer.getDataOfficer') }}">Data Petugas
                        /</a>
                </li>
                <li class="font-medium text-primary">Detail Petugas</li>
            </ol>
        </nav>

        {{-- Data Petugas Start --}}
        <div
            class="rounded-sm border border-stroke bg-white-dahsboard shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-semibold text-black-dashboard dark:text-white-dahsboard">
                    Data Petugas
                </h3>
            </div>
            <div class="p-6.5">
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nama
                    </label>
                    <input type="text" disabled readonly value="{{ $user->name }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Email
                    </label>
                    <input type="text" disabled readonly value="{{ $user->email }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Role
                    </label>
                    <input type="text" disabled readonly value="{{ $user->role->name }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                @if ($user->division !== null)
                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            Divisi/Unit
                        </label>
                        <input type="text" disabled readonly value="{{ $user->division->name }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                    </div>
                @endif

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nomor Telepon
                    </label>
                    <input type="text" disabled readonly value="{{ $user->phone }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nomor Induk Kependudukan
                    </label>
                    <input type="text" disabled readonly value="{{ $user->nik }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Alamat
                    </label>
                    <input type="text" disabled readonly value="{{ $user->address }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Terdaftar pada tanggal
                    </label>
                    <input type="text" disabled readonly value="{{ $user->created_at->format('H:i, d-m-Y') }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>
            </div>
        </div>
        {{-- Data Petugas End --}}
    </div>
</x-layouts.dashboard>

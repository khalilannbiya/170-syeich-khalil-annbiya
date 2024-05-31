<x-layouts.dashboard>
    <x-slot:title>Edit Petugas | </x-slot:title>

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
                <li class="font-medium text-primary">Edit Petugas</li>
            </ol>
        </nav>

        {{-- Data Pelapor Start --}}
        <div
            class="rounded-sm border border-stroke bg-white-dahsboard shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-semibold text-black-dashboard dark:text-white-dahsboard">
                    Data Petugas
                </h3>
            </div>
            <div class="p-6.5">
                <form action="{{ route('adminisrator.users.officer.updateOfficer', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-4.5">
                        <label for="role_id"
                            class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            Role
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="role_id"
                                class="relative z-20 w-full appearance-none capitalize rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true">
                                <option disabled selected class="text-body capitalize">Pilih Role</option>
                                @forelse ($roles as $role)
                                    <option class="text-body capitalize"
                                        value="{{ $user->role_id == $role->id ? $role->id : $role->id }}"
                                        {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                        {{ $user->role_id == $role->id ? $role->name : $role->name }}
                                    </option>
                                @empty
                                    <option disabled class="text-body capitalize">Belum ada Role</option>
                                @endforelse
                            </select>
                            <x-partials.frontend.input-error :messages="$errors->get('role_id')" class="mt-2" />

                        </div>
                    </div>

                    @if ($user->role_id == 2)
                        <div class="mb-4.5">
                            <label for="division_id"
                                class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                                Division
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                                <select name="division_id"
                                    class="relative z-20 w-full appearance-none capitalize rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                    :class="isOptionSelected && 'text-black dark:text-white'"
                                    @change="isOptionSelected = true">
                                    <option disabled selected class="text-body capitalize">Pilih Divisi</option>
                                    @forelse ($divisions as $division)
                                        <option class="text-body capitalize"
                                            value="{{ $user->division_id == $division->id ? $division->id : $division->id }}"
                                            {{ $user->division_id == $division->id ? 'selected' : '' }}>
                                            {{ $user->division_id == $division->id ? $division->name : $division->name }}
                                        </option>
                                    @empty
                                        <option disabled class="text-body capitalize">Belum ada Divisi</option>
                                    @endforelse
                                </select>
                                <x-partials.frontend.input-error :messages="$errors->get('division_id')" class="mt-2" />

                            </div>
                        </div>
                    @endif

                    <div class="mb-4.5">
                        <label for="name"
                            class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            Nama
                        </label>
                        <input type="text" name="name" autofocus autocomplete="name" maxlength="100"
                            value="{{ $user->name }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                        <x-partials.frontend.input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <label for="email"
                            class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            Email
                        </label>
                        <input type="email" name="email" autocomplete="email" maxlength="100"
                            value="{{ $user->email }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                        <x-partials.frontend.input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <label for="phone"
                            class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            Nomor Telepon
                        </label>
                        <input type="text" name="phone" autocomplete="phone" maxlength="20"
                            value="{{ $user->phone }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                        <x-partials.frontend.input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <label for="address"
                            class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            Alamat
                        </label>
                        <textarea rows="6" name="address" autocomplete="address"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">{{ $user->address }}</textarea>
                        <x-partials.frontend.input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <label for="nik"
                            class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            Nomor Induk Kependudukan
                        </label>
                        <input type="text" name="nik" autocomplete="nik" maxlength="16"
                            value="{{ $user->nik }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                        <x-partials.frontend.input-error :messages="$errors->get('nik')" class="mt-2" />
                    </div>

                    <button type="submit"
                        class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray-dashboard hover:bg-opacity-90">
                        Ubah Data
                    </button>

                </form>
            </div>
        </div>
        {{-- Data Pelapor End --}}

</x-layouts.dashboard>

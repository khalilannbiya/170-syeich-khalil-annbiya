<x-layouts.auth>
    <x-slot:title>Register | </x-slot:title>

    <section class="mt-12 lg:max-w-2xl mx-auto lg:mt-0 lg:basis-1/2 lg:px-10 lg:py-16">
        <h1 class="font-bold text-4xl">Register</h1>
        <p class="font-medium text-sm text-gray-500 text-pretty mt-3">Hanya dalam hitungan menit, Anda sudah dapat
            mulai
            melaporkan kejahatan dan
            merasakan keamanan
            nyata dengan
            Laporpak!</p>
        <form class="mt-8" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-partials.frontend.label class="text-sm" value="Nama" for="name" />
                <x-partials.frontend.input type="text" class="mt-2 lg:text-sm" id="name" name="name"
                    :value="old('name')" placeholder="Masukan Nama Lengkap" autofocus required maxlength="100"
                    autocomplete="name" />
                <x-partials.frontend.input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-partials.frontend.label class="text-sm" value="Email" for="email" />
                <x-partials.frontend.input type="email" class="mt-2 lg:text-sm" id="email" name="email"
                    :value="old('email')" placeholder="Masukan Email" required maxlength="100" autocomplete="email" />
                <x-partials.frontend.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Nomor Telepon -->
            <div class="mt-4">
                <x-partials.frontend.label class="text-sm" value="Nomor Telepon" for="phone" />
                <p class="font-medium text-xs text-gray-700">Contoh: +628123456789</p>
                <x-partials.frontend.input type="text" class="mt-2 lg:text-sm" id="phone" name="phone"
                    :value="old('phone')" placeholder="Masukan Nomor Telepon" required maxlength="20"
                    autocomplete="phone" />
                <x-partials.frontend.input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-partials.frontend.label class="text-sm" value="Alamat" for="address" />
                <textarea name="address" id="address"
                    class="w-full lg:text-sm mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent"
                    placeholder="Masukan Alamat Lengkap" required autocomplete="address">{{ old('address') }}</textarea>
                <x-partials.frontend.input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- NIK -->
            <div class="mt-4">
                <x-partials.frontend.label class="text-sm" value="NIK" for="nik" />
                <x-partials.frontend.input type="text" class="mt-2 lg:text-sm" id="nik" name="nik"
                    :value="old('nik')" placeholder="Masukan Nomor Induk Kependudukan" required maxlength="16"
                    autocomplete="nik" />
                <x-partials.frontend.input-error :messages="$errors->get('nik')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-partials.frontend.label class="text-sm" value="Password" for="password" />
                <x-partials.frontend.input type="password" class="mt-2 lg:text-sm" id="password" name="password"
                    :value="old('password')" placeholder="Masukan Password" required autocomplete="new-password" />
                <x-partials.frontend.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-partials.frontend.label class="text-sm" value="Konfirmasi Password" for="password_confirmation" />
                <x-partials.frontend.input type="password" class="mt-2 lg:text-sm" id="password_confirmation"
                    name="password_confirmation" :value="old('password_confirmation')" placeholder="Masukan Ulang Password" required
                    autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end gap-2 mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Sudah Mendaftar?') }}
                </a>

                <button type="submit"
                    class="text-white px-8 py-3 bg-black hover:bg-slate-700 border border-black focus:ring-4 focus:outline-none focus:ring-black transition-all duration-500 ease-in-out font-medium text-sm rounded">
                    Daftar
                </button>
            </div>
        </form>
    </section>
</x-layouts.auth>

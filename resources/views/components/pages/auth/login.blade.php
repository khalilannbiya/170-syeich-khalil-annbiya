<x-layouts.auth>
    <x-slot:title>Login | </x-slot:title>

    <section class="mt-12 lg:max-w-2xl mx-auto lg:mt-0 lg:basis-1/2 lg:px-10 lg:py-16 h-screen">
        <h1 class="font-bold text-4xl">Login</h1>
        <p class="font-medium text-sm text-gray-500 text-pretty mt-3">Pantau perkembangan penanganan kasus Anda dan
            dapatkan informasi terbaru langsung di platform Laporpak.</p>
        <form class="mt-8" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-partials.frontend.label class="text-sm" value="Email" for="email" />
                <x-partials.frontend.input type="email" class="mt-2 lg:text-sm" id="email" name="email"
                    :value="old('email')" placeholder="Masukan Email" required maxlength="100" autofocus
                    autocomplete="email" />
                <x-partials.frontend.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-partials.frontend.label class="text-sm" value="Password" for="password" />
                <x-partials.frontend.input type="password" class="mt-2 lg:text-sm" id="password" name="password"
                    :value="old('password')" placeholder="Masukan Password" required autocomplete="new-password" />
                <x-partials.frontend.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end gap-2 mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit"
                    class="text-white px-8 py-3 bg-black hover:bg-slate-700 border border-black focus:ring-4 focus:outline-none focus:ring-black transition-all duration-500 ease-in-out font-medium text-sm rounded">
                    Masuk
                </button>
            </div>
        </form>
    </section>
</x-layouts.auth>

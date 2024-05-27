<header class="">
    <nav id="navbar" class="bg-white z-[999] fixed w-full">
        <div
            class="top-0 left-0 flex items-center justify-between w-full px-4 py-3 mx-auto max-w-7xl md:px-4 md:py-5 lg:py-4">
            <div class="w-1/3">
                <a href="{{ route('index') }}">
                    <img class="max-w-[120px] max-h-[35px] sm:max-w-[125px] sm:max-h-[40px] md:max-w-[140px] md:max-h-[46px] lg:max-w-[130px] lg:max-h-[50px] object-contain"
                        src="{{ asset('assets/images/logo.webp') }}" alt="Logo Laporpak —  Melawan Kejahatan Bersama" />
                </a>
            </div>
            <ul id="navList"
                class="fixed bg-[#F4F8FB] lg:ml-10 lg:static flex flex-col lg:flex-row justify-center items-center gap-7 md:gap-9 lg:gap-7 top-0 right-[-1000px] md:right-[-1000px] h-screen lg:h-auto w-full z-20 lg:z-0 bg-pewter-blue lg:bg-transparent lg:text-black font-semibold transition-all duration-1000">
                <li>
                    <a href="{{ route('index') }}"
                        class="transition-all duration-500 md:text-lg lg:text-sm {{ Route::current()->getName() == 'index' ? 'text-deep-koamaru-900 lg:text-deep-koamaru-900' : 'text-black hover:text-deep-koamaru-900 lg:text-black lg:hover:text-deep-koamaru-900' }}">Beranda</a>
                </li>

                {{-- if user is reporter --}}
                @if (auth()->check() && auth()->user()->role->name == 'Reporter')
                    <li>
                        <a href="{{ route('reporter.reports.create') }}"
                            class="transition-all duration-500 md:text-lg lg:text-sm {{ Route::current()->getName() == 'reporter.reports.create' ? 'text-deep-koamaru-900 lg:text-deep-koamaru-900' : 'text-black hover:text-deep-koamaru-900 lg:text-black lg:hover:text-deep-koamaru-900' }}">Buat
                            Aduan</a>
                    </li>

                    {{-- Navlink mobile version --}}
                    <li class="block lg:hidden">
                        <a href="{{ route('profile.edit') }}"
                            class="px-6 py-3 bg-transparent hover:text-white hover:bg-slate-700 border border-black focus:ring-4 focus:outline-none focus:ring-black transition-all duration-500 ease-in-out font-medium text-sm rounded">
                            Profile
                        </a>
                    </li>

                    {{-- Navlink mobile version --}}
                    <li class="block lg:hidden">
                        <a href="{{ route('logout') }}"
                            class="text-white px-8 py-3 bg-black hover:bg-slate-700 border border-black focus:ring-4 focus:outline-none focus:ring-black transition-all duration-500 ease-in-out font-medium text-sm rounded">
                            Logout
                        </a>
                    </li>
                @endif

                {{-- if user is not logged in --}}
                @guest
                    <li>
                        <a href="{{ route('about-us') }}"
                            class="transition-all duration-500 md:text-lg lg:text-sm {{ Route::current()->getName() == 'about-us' ? 'text-deep-koamaru-900 lg:text-deep-koamaru-900' : 'text-black hover:text-deep-koamaru-900 lg:text-black lg:hover:text-deep-koamaru-900' }}">Tentang
                            Kami</a>
                    </li>

                    <li>
                        <a href="{{ route('public-report') }}"
                            class="transition-all duration-500 md:text-lg lg:text-sm {{ Route::current()->getName() == 'public-report' ? 'text-deep-koamaru-900 lg:text-deep-koamaru-900' : 'text-black hover:text-deep-koamaru-900 lg:text-black lg:hover:text-deep-koamaru-900' }}">Laporan
                            Publik</a>
                    </li>

                    {{-- Navlink mobile version --}}
                    <li class="block lg:hidden">
                        <a href="{{ route('register') }}"
                            class="px-6 py-3 bg-transparent hover:text-white hover:bg-slate-700 border border-black focus:ring-4 focus:outline-none focus:ring-black transition-all duration-500 ease-in-out font-medium text-sm rounded">
                            Daftar
                        </a>
                    </li>

                    {{-- Navlink mobile version --}}
                    <li class="block lg:hidden">
                        <a href="{{ route('login') }}"
                            class="text-white px-8 py-3 bg-black hover:bg-slate-700 border border-black focus:ring-4 focus:outline-none focus:ring-black transition-all duration-500 ease-in-out font-medium text-sm rounded">
                            Masuk
                        </a>
                    </li>
                @endguest
            </ul>

            {{-- Navlink desktop version --}}
            <div class="w-1/3 lg:w-[30%] hidden  lg:flex gap-2">

                {{-- if user is reporter --}}
                @if (auth()->check() && auth()->user()->role->name == 'Reporter')
                    <a href="{{ route('profile.edit') }}"
                        class="px-6 py-3 bg-transparent hover:text-white hover:bg-slate-700 border border-black
                    focus:ring-4 focus:outline-none focus:ring-black transition-all duration-500 ease-in-out font-medium
                    text-sm rounded">
                        Profile
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="text-white px-8 py-3 bg-black hover:bg-slate-700 border border-black focus:ring-4 focus:outline-none focus:ring-black transition-all duration-500 ease-in-out font-medium text-sm rounded">Logout</button>
                    </form>
                @endif

                {{-- if user is not logged in --}}
                @guest
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 bg-transparent hover:text-white hover:bg-slate-700 border border-black
                focus:ring-4 focus:outline-none focus:ring-black transition-all duration-500 ease-in-out font-medium
                text-sm rounded">
                        Daftar
                    </a>
                    <a href="{{ route('login') }}"
                        class="text-white px-8 py-3 bg-black hover:bg-slate-700 border border-black focus:ring-4 focus:outline-none focus:ring-black transition-all duration-500 ease-in-out font-medium text-sm rounded">
                        Masuk
                    </a>
                @endguest

            </div>
            <div class="absolute z-30 cursor-pointer right-4 md:right-4 lg:hidden" id="toggle">
                <svg xmlns="http://www.w3.org/2000/svg" id="iconToggle"
                    class="icon icon-tabler icon-tabler-align-justified" width="27" height="27"
                    viewBox="0 0 24 24" stroke-width="3" stroke="#1e293b" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 6l16 0"></path>
                    <path d="M4 12l16 0"></path>
                    <path d="M4 18l12 0"></path>
                </svg>
            </div>
        </div>
    </nav>
</header>

@push('script')
    <script>
        // Scroll Navbar
        document.onreadystatechange = function() {
            let lastScrollPosition = 0;
            const navbar = document.getElementById("navbar");
            window.addEventListener("scroll", function(e) {
                lastScrollPosition = window.scrollY;

                if (lastScrollPosition > 10) {
                    navbar.classList.add(
                        "transition-all",
                        "duration-500",
                        "shadow-lg",
                    );
                    navbar.classList.remove("bg-transparent");
                } else {
                    navbar.classList.add(
                        "transition-all",
                        "duration-500",
                    );
                    navbar.classList.remove(
                        "shadow-lg",
                    );
                }
            });
        };

        // Toggle Navbar Responsive
        const toggle = document.getElementById("toggle");
        toggle.addEventListener("click", function() {
            document.getElementById("navList").classList.toggle("slide");
        });

        // Change the width and height in the icon toggle when the screen width is that of a tablet screen.
        const widthOfScreen = window.innerWidth;
        if (widthOfScreen >= 768) {
            document.getElementById("iconToggle").setAttribute("width", "36");
            document.getElementById("iconToggle").setAttribute("height", "36");
        }
    </script>
@endpush

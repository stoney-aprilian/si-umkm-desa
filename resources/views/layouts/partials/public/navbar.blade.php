<header
    x-data="{ open: false }"
    class="sticky top-0 z-50 border-b border-slate-200/70 bg-white/80 backdrop-blur-xl">

    <div class="app-container">

        <div class="flex h-20 items-center justify-between">

            {{-- ====================================================== --}}
            {{-- Logo --}}
            {{-- ====================================================== --}}
            <a
                href="{{ route('home') }}"
                class="flex items-center gap-4">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-600 text-lg font-bold text-white shadow-sm">

                    SI

                </div>

                <div>

                    <h1
                        class="text-lg font-bold tracking-tight text-slate-900">

                        SI UMKM Desa

                    </h1>

                    <p
                        class="text-xs text-slate-500">

                        Desa Salamnunggal

                    </p>

                </div>

            </a>





            {{-- ====================================================== --}}
            {{-- Desktop Navigation --}}
            {{-- ====================================================== --}}
            <nav
                class="hidden items-center gap-2 lg:flex">

                <a
                    href="{{ route('home') }}"
                    class="rounded-xl px-4 py-2 text-sm font-medium transition

                    {{ request()->routeIs('home')
                        ? 'bg-emerald-50 text-emerald-700'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900'
                    }}">

                    Beranda

                </a>



                <a
                    href="{{ route('public.umkms.index') }}"
                    class="rounded-xl px-4 py-2 text-sm font-medium transition

                    {{ request()->routeIs('public.umkms.*')
                        ? 'bg-emerald-50 text-emerald-700'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900'
                    }}">

                    UMKM

                </a>



                <a
                    href="{{ route('public.products.index') }}"
                    class="rounded-xl px-4 py-2 text-sm font-medium transition

                    {{ request()->routeIs('public.products.*')
                        ? 'bg-emerald-50 text-emerald-700'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900'
                    }}">

                    Produk

                </a>



                <a
                    href="{{ route('about') }}"
                    class="rounded-xl px-4 py-2 text-sm font-medium transition

                    {{ request()->routeIs('about')
                        ? 'bg-emerald-50 text-emerald-700'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900'
                    }}">

                    Tentang

                </a>

            </nav>






            {{-- ====================================================== --}}
            {{-- Right Side --}}
            {{-- ====================================================== --}}
            <div
                class="flex items-center gap-3">

                {{-- Login --}}
                <x-ui.button
                    href="{{ route('login') }}"
                    class="hidden lg:inline-flex">

                    Login

                </x-ui.button>





                {{-- Mobile Button --}}
                <button
                    @click="open=!open"
                    class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:bg-slate-100 lg:hidden">

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            x-show="!open"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>

                        <path
                            x-show="open"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </button>

            </div>

        </div>





        {{-- ====================================================== --}}
        {{-- Mobile Navigation --}}
        {{-- ====================================================== --}}
        <div
            x-show="open"
            x-transition
            class="border-t border-slate-200 py-5 lg:hidden">

            <nav class="space-y-2">

                <a
                    href="{{ route('home') }}"
                    class="block rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-slate-100">

                    Beranda

                </a>

                <a
                    href="{{ route('public.umkms.index') }}"
                    class="block rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-slate-100">

                    UMKM

                </a>

                <a
                    href="{{ route('public.products.index') }}"
                    class="block rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-slate-100">

                    Produk

                </a>

                <a
                    href="{{ route('about') }}"
                    class="block rounded-xl px-4 py-3 text-sm font-medium transition hover:bg-slate-100">

                    Tentang

                </a>

                <div class="pt-2">

                    <x-ui.button
                        href="{{ route('login') }}"
                        class="w-full justify-center">

                        Login

                    </x-ui.button>

                </div>

            </nav>

        </div>

    </div>

</header>

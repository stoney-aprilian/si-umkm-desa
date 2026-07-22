<header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/80 backdrop-blur-xl">

    <div class="app-container">

        <div class="flex h-20 items-center justify-between">

            {{-- Logo --}}
            <a
                href="{{ route('home') }}"
                class="group flex items-center gap-4">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-white shadow-lg shadow-emerald-500/20 transition duration-300 group-hover:scale-105">

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 21h18M5 21V8l7-4 7 4v13"/>

                    </svg>

                </div>

                <div>

                    <h1 class="text-lg font-bold tracking-tight text-slate-900">

                        SI UMKM Desa

                    </h1>

                    <p class="text-xs tracking-wide text-slate-500">

                        Digital Village Platform

                    </p>

                </div>

            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden items-center rounded-2xl border border-slate-200 bg-slate-50 p-1 md:flex">

                <a
                    href="{{ route('home') }}"
                    class="rounded-xl px-5 py-2.5 text-sm font-medium transition-all duration-200
                    {{ request()->routeIs('home')
                        ? 'bg-white text-emerald-700 shadow-sm'
                        : 'text-slate-600 hover:bg-white hover:text-slate-900' }}">

                    Beranda

                </a>

                <a
                    href="{{ route('public.umkms.index') }}"
                    class="rounded-xl px-5 py-2.5 text-sm font-medium transition-all duration-200
                    {{ request()->routeIs('public.umkms.*')
                        ? 'bg-white text-emerald-700 shadow-sm'
                        : 'text-slate-600 hover:bg-white hover:text-slate-900' }}">

                    UMKM

                </a>

                <a
                    href="{{ route('public.products.index') }}"
                    class="rounded-xl px-5 py-2.5 text-sm font-medium transition-all duration-200
                    {{ request()->routeIs('public.products.*')
                        ? 'bg-white text-emerald-700 shadow-sm'
                        : 'text-slate-600 hover:bg-white hover:text-slate-900' }}">

                    Produk

                </a>

            </nav>

            {{-- Right Side --}}
            <div class="flex items-center gap-3">

                <a
                    href="{{ route('login') }}"
                    class="hidden items-center gap-2 rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-emerald-700 hover:shadow md:inline-flex">

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m-6-3h11.25m0 0l-3-3m3 3l-3 3"/>

                    </svg>

                    Login

                </a>

                {{-- Mobile Menu --}}
                <button
                    type="button"
                    class="flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-600 md:hidden"
                    aria-label="Buka menu">

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>

                    </svg>

                </button>

            </div>

        </div>

    </div>

</header>

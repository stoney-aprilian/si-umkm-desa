<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">

    <div class="app-container">

        <div class="flex h-18 items-center justify-between py-4">

            {{-- Logo --}}
            <a
                href="{{ route('home') }}"
                class="flex items-center gap-3">

                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-600 text-lg font-bold text-white shadow-sm">

                    SI

                </div>

                <div>

                    <h1 class="text-base font-bold tracking-tight text-slate-900">

                        SI UMKM Desa

                    </h1>

                    <p class="text-xs text-slate-500">

                        Digital Village Platform

                    </p>

                </div>

            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden items-center gap-2 md:flex">

                <a
                    href="{{ route('home') }}"
                    class="rounded-xl px-4 py-2 text-sm font-medium transition-all duration-200
                    {{ request()->routeIs('home')
                        ? 'bg-emerald-50 text-emerald-700'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                    Beranda

                </a>

                <a
                    href="{{ route('public.umkms.index') }}"
                    class="rounded-xl px-4 py-2 text-sm font-medium transition-all duration-200
                    {{ request()->routeIs('public.umkms.*')
                        ? 'bg-emerald-50 text-emerald-700'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                    UMKM

                </a>

                <a
                    href="{{ route('public.products.index') }}"
                    class="rounded-xl px-4 py-2 text-sm font-medium transition-all duration-200
                    {{ request()->routeIs('public.products.*')
                        ? 'bg-emerald-50 text-emerald-700'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                    Produk

                </a>

            </nav>

            {{-- Right Side --}}
            <div class="flex items-center gap-3">

                <a
                    href="{{ route('login') }}"
                    class="btn-primary hidden md:inline-flex">

                    Login

                </a>

                {{-- Mobile Menu Button --}}
                <button
                    type="button"
                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-600 transition hover:bg-slate-100 md:hidden"
                    aria-label="Buka menu">

                    ☰

                </button>

            </div>

        </div>

    </div>

</header>

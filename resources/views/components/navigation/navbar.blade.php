<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">

    <div class="app-container">

        <div class="flex h-24 items-center justify-between">

            {{-- Brand --}}
            <a href="{{ route('home') }}" class="group flex items-center gap-4">

                <div
                    class="
                    flex h-14 w-14 items-center justify-center
                    rounded-3xl

                    bg-gradient-to-br
                    from-emerald-500
                    via-emerald-600
                    to-emerald-700

                    text-white

                    shadow-lg
                    shadow-emerald-500/20

                    ring-1
                    ring-emerald-100

                    transition-all duration-300

                    group-hover:-translate-y-0.5
                    group-hover:scale-105">

                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 21h18M5 21V8l7-4 7 4v13" />

                    </svg>

                </div>

                <div>

                    <h1 class="text-xl font-bold tracking-tight text-slate-900">

                        SI UMKM Desa

                    </h1>

                    <p class="mt-0.5 text-sm text-slate-500">

                        Portal Digital Desa Salamnunggal

                    </p>

                </div>

            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden items-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 p-2 md:flex">

                @foreach ([['Beranda', route('home'), 'home'], ['UMKM', route('public.umkms.index'), 'public.umkms.*'], ['Produk', route('public.products.index'), 'public.products.*'], ['Tentang', route('public.about'), 'public.about']] as [$label, $url, $active])
                    <a href="{{ $url }}"
                        class="
                        rounded-xl
                        px-5
                        py-2.5
                        text-sm
                        font-medium
                        transition-all
                        duration-200

                        {{ request()->routeIs($active)
                            ? 'bg-white text-emerald-700 shadow-sm'
                            : 'text-slate-600 hover:bg-white hover:text-slate-900' }}">

                        {{ $label }}

                    </a>
                @endforeach

            </nav>

            {{-- Actions --}}
            <div class="flex items-center gap-3">

                <x-ui.button href="{{ route('login') }}" variant="secondary" size="sm">

                    Login

                </x-ui.button>

                <button
                    class="flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 bg-white transition hover:bg-slate-100 md:hidden">

                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

</header>

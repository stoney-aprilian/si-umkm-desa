<header class="border-b border-slate-200 bg-white">

    <div class="app-container flex h-20 items-center justify-between">

        {{-- ====================================================== --}}
        {{-- Page Title --}}
        {{-- ====================================================== --}}
        <div>

            <div class="flex items-center gap-3">

                <h1 class="text-2xl font-bold tracking-tight text-slate-900">

                    @yield('title', 'Dashboard')

                </h1>

                <span
                    class="hidden rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-emerald-700 md:inline-flex">

                    Owner Panel

                </span>

            </div>

            <p class="mt-1 text-sm text-slate-500">

                Kelola profil UMKM dan produk Anda dengan mudah.

            </p>

        </div>





        {{-- ====================================================== --}}
        {{-- User Information --}}
        {{-- ====================================================== --}}
        <div class="flex items-center gap-4">

            {{-- UMKM --}}
            @if (auth()->user()->umkm)
                <div class="hidden rounded-2xl border border-slate-200 bg-slate-50 px-5 py-3 text-right lg:block">

                    <p class="text-xs font-medium uppercase tracking-[0.15em] text-slate-400">

                        UMKM

                    </p>

                    <p class="mt-1 font-semibold text-slate-900">

                        {{ auth()->user()->umkm->business_name }}

                    </p>

                </div>
            @endif





            {{-- Avatar --}}
            <div class="flex items-center gap-3">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-100 text-base font-bold text-emerald-700">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

                <div class="hidden md:block">

                    <p class="font-semibold text-slate-900">

                        {{ auth()->user()->name }}

                    </p>

                    <div class="mt-1 flex items-center gap-2">

                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                        <span class="text-sm text-slate-500">

                            Owner UMKM

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>

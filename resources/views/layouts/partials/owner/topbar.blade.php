<header class="border-b border-slate-200 bg-white">

    <div class="app-container flex h-20 items-center justify-between">

        <div>

            <h1 class="text-xl font-bold text-slate-900">

                @yield('title', 'Dashboard')

            </h1>

            <p class="mt-1 text-sm text-slate-500">

                Kelola profil UMKM dan produk Anda.

            </p>

        </div>

        <div class="flex items-center gap-4">

            @if (auth()->user()->umkm)

                <div class="hidden rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-right lg:block">

                    <p class="text-xs font-medium uppercase tracking-wide text-slate-400">

                        UMKM

                    </p>

                    <p class="font-semibold text-slate-900">

                        {{ auth()->user()->umkm->name }}

                    </p>

                </div>

            @endif

            <div class="flex items-center gap-3">

                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-100 text-base font-bold text-emerald-700">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

                <div class="hidden md:block">

                    <p class="font-semibold text-slate-900">

                        {{ auth()->user()->name }}

                    </p>

                    <p class="text-sm text-slate-500">

                        Owner

                    </p>

                </div>

            </div>

        </div>

    </div>

</header>

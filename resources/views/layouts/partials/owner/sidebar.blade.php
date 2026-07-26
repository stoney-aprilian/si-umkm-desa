<aside class="flex h-screen w-72 flex-shrink-0 flex-col border-r border-slate-200 bg-white">

    {{-- ====================================================== --}}
    {{-- Branding --}}
    {{-- ====================================================== --}}
    <div class="border-b border-slate-200 px-6 py-6">

        <a href="{{ route('owner.dashboard') }}" class="flex items-center gap-4">

            <div
                class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-600 text-lg font-bold text-white shadow-sm">

                SI

            </div>

            <div>

                <h1 class="text-lg font-bold tracking-tight text-slate-900">

                    SI UMKM Desa

                </h1>

                <p class="text-sm text-slate-500">

                    Portal Owner

                </p>

            </div>

        </a>

    </div>





    {{-- ====================================================== --}}
    {{-- Navigation --}}
    {{-- ====================================================== --}}
    <nav class="flex-1 overflow-y-auto px-4 py-6">

        <div class="space-y-8">

            {{-- ============================= --}}
            {{-- Dashboard --}}
            {{-- ============================= --}}
            <div>

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">

                    Menu

                </p>

                <a href="{{ route('owner.dashboard') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                    {{ request()->routeIs('owner.dashboard')
                        ? 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10l9-7 9 7v10a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1V10z" />

                    </svg>

                    <span class="font-medium">

                        Dashboard

                    </span>

                </a>

            </div>





            {{-- ============================= --}}
            {{-- Management --}}
            {{-- ============================= --}}
            <div>

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">

                    Manajemen

                </p>

                <div class="space-y-2">

                    {{-- Profil UMKM --}}
                    <a href="{{ route('owner.profile.edit') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                        {{ request()->routeIs('owner.profile.*')
                            ? 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 21h18M5 21V8l7-4 7 4v13M9 13h6M9 17h6" />

                        </svg>

                        <span class="font-medium">

                            Profil UMKM

                        </span>

                    </a>





                    {{-- Produk --}}
                    <a href="{{ route('owner.products.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                        {{ request()->routeIs('owner.products.*')
                            ? 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7L12 3 4 7l8 4 8-4zm-8 6L4 9v8l8 4 8-4V9l-8 4z" />

                        </svg>

                        <span class="font-medium">

                            Produk Saya

                        </span>

                    </a>

                </div>

            </div>





            {{-- ============================= --}}
            {{-- Account --}}
            {{-- ============================= --}}
            <div>

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">

                    Akun

                </p>

                <div class="space-y-2">

                    <a href="#"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-400 transition hover:bg-slate-100 hover:text-slate-700">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m6.364-8.364l1.414-1.414M4.222 6.222l1.414 1.414M12 5V3m0 18v-2m8-7h2M2 12h2m13.657 5.657l1.414 1.414M4.222 17.778l1.414-1.414" />

                        </svg>

                        <span class="font-medium">

                            Pengaturan Akun

                        </span>

                        <span
                            class="ml-auto rounded-full bg-slate-100 px-2 py-1 text-[10px] font-semibold uppercase tracking-wider text-slate-500">

                            Soon

                        </span>

                    </a>

                </div>

            </div>

        </div>

    </nav>





    {{-- ====================================================== --}}
    {{-- User Card --}}
    {{-- ====================================================== --}}
    <div class="border-t border-slate-200 p-5">

        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">

            <div class="flex items-center gap-3">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 text-lg font-bold text-emerald-700">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

                <div class="min-w-0">

                    <p class="truncate font-semibold text-slate-900">

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





            <form method="POST" action="{{ route('logout') }}" class="mt-5">

                @csrf

                <x-ui.button type="submit" variant="danger" class="w-full">

                    Keluar

                </x-ui.button>

            </form>

        </div>





        <div class="mt-5 text-center text-xs text-slate-400">

            SI UMKM Desa v1.0

        </div>

    </div>

</aside>

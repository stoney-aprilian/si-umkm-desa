<aside class="flex h-screen w-[300px] shrink-0 flex-col border-r border-slate-200 bg-white">

    {{-- ========================= --}}
    {{-- Brand --}}
    {{-- ========================= --}}
    <div class="border-b border-slate-200 p-6">

        <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-4">

            <div
                class="flex h-14 w-14 items-center justify-center rounded-3xl bg-gradient-to-br from-emerald-500 to-emerald-700 text-xl font-bold text-white shadow-lg shadow-emerald-200 transition-transform duration-300 group-hover:scale-105">

                SI

            </div>

            <div class="min-w-0">

                <h1 class="truncate text-lg font-bold tracking-tight text-slate-900">

                    SI UMKM Desa

                </h1>

                <p class="mt-1 text-sm text-slate-500">

                    Desa Salamnunggal

                </p>

            </div>

        </a>

    </div>

    {{-- ========================= --}}
    {{-- Navigation --}}
    {{-- ========================= --}}
    <nav class="flex-1 overflow-y-auto px-5 py-6">

        <div class="space-y-8">

            {{-- Dashboard --}}
            <div>

                <x-ui.sidebar-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">

                    <x-slot:icon>

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10l9-7 9 7v10a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1V10z" />

                        </svg>

                    </x-slot:icon>

                    Dashboard

                </x-ui.sidebar-link>

            </div>

            {{-- Master Data --}}
            <div>

                <p class="mb-3 px-4 text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">

                    Master Data

                </p>

                <div class="space-y-2">

                    <x-ui.sidebar-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">

                        <x-slot:icon>

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h6l2 2h10v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                            </svg>

                        </x-slot:icon>

                        Kategori

                    </x-ui.sidebar-link>

                    <x-ui.sidebar-link :href="route('admin.umkms.index')" :active="request()->routeIs('admin.umkms.*')">

                        <x-slot:icon>

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 21h18M5 21V9l7-6 7 6v12" />

                            </svg>

                        </x-slot:icon>

                        UMKM

                    </x-ui.sidebar-link>

                    <x-ui.sidebar-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*')">

                        <x-slot:icon>

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7L12 3 4 7l8 4 8-4zM4 9v8l8 4 8-4V9" />

                            </svg>

                        </x-slot:icon>

                        Produk

                    </x-ui.sidebar-link>

                </div>

            </div>

            {{-- System --}}
            <div>

                <p class="mb-3 px-4 text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">

                    Sistem

                </p>

                <div class="space-y-2">

                    <x-ui.sidebar-link href="#" disabled>

                        <x-slot:icon>

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4zm8 4l-2.2-.6a7.7 7.7 0 00-.8-2l1.3-1.9-1.9-1.9-1.9 1.3a7.7 7.7 0 00-2-.8L12 2 9.4 2.1a7.7 7.7 0 00-2 .8L5.5 1.6 3.6 3.5l1.3 1.9a7.7 7.7 0 00-.8 2L2 12l2.1.6a7.7 7.7 0 00.8 2l-1.3 1.9 1.9 1.9 1.9-1.3a7.7 7.7 0 002 .8L12 22l2.6-.1a7.7 7.7 0 002-.8l1.9 1.3 1.9-1.9-1.3-1.9a7.7 7.7 0 00.8-2L22 12z" />

                            </svg>

                        </x-slot:icon>

                        Pengaturan

                    </x-ui.sidebar-link>

                </div>

            </div>

        </div>

    </nav>

    {{-- ========================= --}}
    {{-- User --}}
    {{-- ========================= --}}
    <div class="border-t border-slate-200 p-5">

        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">

            <div class="flex items-center gap-3">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-600 text-lg font-bold text-white">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

                <div class="min-w-0">

                    <p class="truncate font-semibold text-slate-900">

                        {{ auth()->user()->name }}

                    </p>

                    <x-ui.badge variant="secondary" size="sm">

                        {{ ucfirst(auth()->user()->role) }}

                    </x-ui.badge>

                </div>

            </div>

            <form method="POST" action="{{ route('logout') }}" class="mt-5">

                @csrf

                <x-ui.button type="submit" variant="danger" class="w-full">

                    Logout

                </x-ui.button>

            </form>

        </div>

        <p class="mt-4 text-center text-xs text-slate-400">

            SI UMKM Desa • v1.0

        </p>

    </div>

</aside>

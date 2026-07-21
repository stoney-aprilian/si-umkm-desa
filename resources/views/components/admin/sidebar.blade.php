<aside class="flex h-screen w-72 flex-col border-r border-slate-200 bg-white">

    {{-- Branding --}}
    <div class="border-b border-slate-200 px-6 py-6">

        <a
            href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-4">

            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-600 text-xl font-bold text-white shadow-sm">

                SI

            </div>

            <div>

                <h1 class="text-lg font-bold tracking-tight text-slate-900">

                    SI UMKM Desa

                </h1>

                <p class="text-sm text-slate-500">

                    Digital Village Platform

                </p>

            </div>

        </a>

    </div>

    {{-- Navigation --}}
    <nav class="flex-1 space-y-8 overflow-y-auto px-4 py-6">

        {{-- Dashboard --}}
        <div class="space-y-2">

            <a
                href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                {{ request()->routeIs('admin.dashboard')
                    ? 'border border-emerald-200 bg-emerald-50 font-semibold text-emerald-700 shadow-sm'
                    : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                <span class="text-lg">🏠</span>

                Dashboard

            </a>

        </div>

        {{-- Master Data --}}
        <div>

            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">

                Master Data

            </p>

            <div class="space-y-2">

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                    {{ request()->routeIs('admin.categories.*')
                        ? 'border border-emerald-200 bg-emerald-50 font-semibold text-emerald-700 shadow-sm'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                    <span class="text-lg">

                        📂

                    </span>

                    Kategori

                </a>

                <a
                    href="{{ route('admin.umkms.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                    {{ request()->routeIs('admin.umkms.*')
                        ? 'border border-emerald-200 bg-emerald-50 font-semibold text-emerald-700 shadow-sm'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                    <span class="text-lg">

                        🏪

                    </span>

                    UMKM

                </a>

                <a
                    href="{{ route('admin.products.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                    {{ request()->routeIs('admin.products.*')
                        ? 'border border-emerald-200 bg-emerald-50 font-semibold text-emerald-700 shadow-sm'
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                    <span class="text-lg">

                        📦

                    </span>

                    Produk

                </a>

            </div>

        </div>

    </nav>

    {{-- User --}}
    <div class="border-t border-slate-200 p-5">

        <div class="flex items-center gap-3">

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 font-bold text-emerald-700">

                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

            </div>

            <div>

                <p class="font-semibold text-slate-800">

                    {{ auth()->user()->name }}

                </p>

                <p class="text-sm capitalize text-slate-500">

                    {{ auth()->user()->role }}

                </p>

            </div>

        </div>

        <form
            method="POST"
            action="{{ route('logout') }}"
            class="mt-5">

            @csrf

            <button
                class="btn-danger w-full">

                Logout

            </button>

        </form>

        <div class="mt-5 border-t border-slate-100 pt-4 text-center text-xs text-slate-400">

            SI UMKM Desa v1.0

        </div>

    </div>

</aside>

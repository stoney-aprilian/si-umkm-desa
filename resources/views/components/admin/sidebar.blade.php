<aside class="w-64 bg-white border-r border-slate-200 flex flex-col">

    <!-- Logo -->
    <div class="px-6 py-5 border-b">

        <h1 class="text-2xl font-bold text-emerald-600">
            SI UMKM
        </h1>

        <p class="text-sm text-slate-500">
            Sistem Informasi UMKM Desa
        </p>

    </div>

    <!-- Menu -->
    <nav class="flex-1 px-4 py-5 space-y-1">

        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-4 py-3 rounded-lg transition
            {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-100 text-emerald-700 font-semibold' : 'text-slate-600 hover:bg-slate-100' }}">

            <span class="mr-3">🏠</span>
            Dashboard

        </a>

        <p class="px-4 pt-5 pb-2 text-xs font-semibold tracking-widest text-slate-400 uppercase">
            Master Data
        </p>

        <a href="{{ route('admin.categories.index') }}"
            class="flex items-center px-4 py-3 rounded-lg transition
            {{ request()->routeIs('admin.categories.*') ? 'bg-emerald-100 text-emerald-700 font-semibold' : 'text-slate-600 hover:bg-slate-100' }}">

            <span class="mr-3">📂</span>
            Kategori

        </a>

        <a href="#"
            class="flex items-center px-4 py-3 rounded-lg text-slate-400 cursor-not-allowed">

            <span class="mr-3">🏪</span>
            UMKM

        </a>

        <a href="#"
            class="flex items-center px-4 py-3 rounded-lg text-slate-400 cursor-not-allowed">

            <span class="mr-3">📦</span>
            Produk

        </a>

    </nav>

    <!-- User -->
    <div class="border-t px-5 py-5">

        <p class="font-semibold text-slate-700">
            {{ auth()->user()->name }}
        </p>

        <p class="text-sm text-slate-500 capitalize">
            {{ auth()->user()->role }}
        </p>

        <form method="POST"
            action="{{ route('logout') }}"
            class="mt-4">

            @csrf

            <button
                class="w-full rounded-lg bg-red-50 py-2 text-red-600 hover:bg-red-100 transition">

                Logout

            </button>

        </form>

    </div>

</aside>

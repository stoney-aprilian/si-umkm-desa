@php
    $hour = now()->hour;

    $greeting = match (true) {
        $hour < 11 => 'Selamat pagi',
        $hour < 15 => 'Selamat siang',
        $hour < 18 => 'Selamat sore',
        default => 'Selamat malam',
    };
@endphp

<header
    class="sticky top-0 z-40 border-b border-slate-200/70 bg-white/80 backdrop-blur-xl">

    <div
        class="app-container flex h-[72px] items-center justify-between gap-6">

        {{-- Workspace --}}
        <div class="min-w-0">

            <h2
                class="truncate text-lg font-bold tracking-tight text-slate-900">

                {{ $greeting }}, {{ auth()->user()->name }} 👋

            </h2>

            <p
                class="mt-1 text-sm text-slate-500">

                {{ now()->locale('id')->translatedFormat('l, d F Y') }}

            </p>

        </div>

        {{-- Search --}}
        <div
            class="hidden flex-1 justify-center px-4 xl:flex">

            <form
                action="{{ route('admin.search') }}"
                method="GET"
                class="w-full max-w-xl">

                <x-ui.search-bar
                    name="q"
                    :value="request('q')"
                    placeholder="Cari UMKM, produk, kategori..." />

            </form>

        </div>

        {{-- User --}}
        <div
            class="flex items-center gap-4">

            <div
                class="hidden text-right lg:block">

                <p
                    class="text-sm font-semibold text-slate-900">

                    {{ auth()->user()->name }}

                </p>

                <div
                    class="mt-1">

                    <x-ui.badge
                        variant="secondary"
                        size="sm">

                        {{ ucfirst(auth()->user()->role) }}

                    </x-ui.badge>

                </div>

            </div>

            <button
                type="button"
                class="group flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 bg-white font-bold text-emerald-600 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:border-emerald-200 hover:bg-emerald-50 hover:shadow-md">

                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

            </button>

        </div>

    </div>

</header>

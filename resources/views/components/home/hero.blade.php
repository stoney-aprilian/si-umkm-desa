<section class="relative overflow-hidden bg-gradient-to-b from-white via-emerald-50/40 to-white">

    {{-- ====================================================== --}}
    {{-- Background Decoration --}}
    {{-- ====================================================== --}}
    <div class="absolute inset-0 -z-10 overflow-hidden">

        <div class="absolute left-[-10rem] top-[-8rem] h-[28rem] w-[28rem] rounded-full bg-emerald-200/40 blur-3xl">
        </div>

        <div class="absolute right-[-8rem] bottom-[-12rem] h-[34rem] w-[34rem] rounded-full bg-teal-200/40 blur-3xl">
        </div>

        <div class="absolute inset-x-0 top-0 h-40 bg-gradient-to-b from-white to-transparent">
        </div>

    </div>





    <div class="app-container py-20 lg:py-28">

        <div class="grid items-center gap-16 lg:grid-cols-2">

            {{-- ====================================================== --}}
            {{-- Left Content --}}
            {{-- ====================================================== --}}
            <div>

                {{-- Eyebrow --}}
                <div
                    class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-white px-4 py-2 shadow-sm">

                    <div class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100">

                        <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 21h18M5 21V8l7-4 7 4v13" />

                        </svg>

                    </div>

                    <span class="text-sm font-semibold tracking-wide text-emerald-700">

                        Portal Digital UMKM Desa Salamnunggal

                    </span>

                </div>





                {{-- Heading --}}
                <h1 class="mt-8 text-5xl font-extrabold leading-tight tracking-tight text-slate-900 lg:text-6xl">

                    Temukan

                    <span class="block text-emerald-600">

                        UMKM Terbaik

                    </span>

                    dari Desa Salamnunggal

                </h1>





                {{-- Description --}}
                <p class="mt-8 max-w-2xl text-lg leading-8 text-slate-600">

                    Jelajahi berbagai pelaku usaha lokal,
                    produk unggulan,
                    dan potensi ekonomi Desa Salamnunggal
                    melalui satu platform digital yang modern,
                    terpercaya, dan mudah diakses kapan saja.

                </p>

                {{-- ====================================================== --}}
                {{-- CTA --}}
                {{-- ====================================================== --}}
                <div class="mt-10 flex flex-col gap-4 sm:flex-row">

                    <x-ui.button href="{{ route('public.umkms.index') }}" size="lg">

                        Jelajahi UMKM

                    </x-ui.button>

                    <x-ui.button href="{{ route('public.products.index') }}" variant="secondary" size="lg">

                        Lihat Produk

                    </x-ui.button>

                </div>





                {{-- ====================================================== --}}
                {{-- Statistics --}}
                {{-- ====================================================== --}}
                <div class="mt-14 grid grid-cols-3 gap-6 border-t border-slate-200 pt-8">

                    <div>

                        <p class="text-3xl font-extrabold tracking-tight text-slate-900">

                            {{ number_format($statistics['umkms'] ?? 0) }}+

                        </p>

                        <p class="mt-2 text-sm text-slate-500">

                            UMKM Terdaftar

                        </p>

                    </div>





                    <div>

                        <p class="text-3xl font-extrabold tracking-tight text-slate-900">

                            {{ number_format($statistics['products'] ?? 0) }}+

                        </p>

                        <p class="mt-2 text-sm text-slate-500">

                            Produk Lokal

                        </p>

                    </div>





                    <div>

                        <p class="text-3xl font-extrabold tracking-tight text-slate-900">

                            {{ number_format($statistics['categories'] ?? 0) }}

                        </p>

                        <p class="mt-2 text-sm text-slate-500">

                            Kategori

                        </p>

                    </div>

                </div>

            </div>

            {{-- ====================================================== --}}
            {{-- Right Preview --}}
            {{-- ====================================================== --}}
            <div class="relative hidden lg:block">

                <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-2xl">

                    {{-- Header --}}
                    <div class="flex items-center justify-between border-b border-slate-100 px-7 py-5">

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-emerald-600">

                                Dashboard Preview

                            </p>

                            <h3 class="mt-1 text-xl font-bold text-slate-900">

                                Produk Unggulan

                            </h3>

                        </div>

                        <x-ui.badge variant="success">

                            Live

                        </x-ui.badge>

                    </div>





                    {{-- Product List --}}
                    <div class="space-y-4 p-7">

                        @php

                            $heroProducts = collect($featuredProducts ?? [])->take(3);

                        @endphp

                        @forelse($heroProducts as $product)

                            <div
                                class="flex items-center gap-4 rounded-2xl border border-slate-200 p-4 transition-all duration-200 hover:border-emerald-200 hover:bg-emerald-50">

                                {{-- Thumbnail --}}
                                @if (!empty($product->image))
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="h-16 w-16 rounded-2xl object-cover">
                                @else
                                    <div
                                        class="flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600">

                                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7L12 3 4 7l8 4 8-4M4 9l8 4 8-4M4 17l8 4 8-4" />

                                        </svg>

                                    </div>
                                @endif





                                {{-- Content --}}
                                <div class="min-w-0 flex-1">

                                    <h4 class="truncate font-semibold text-slate-900">

                                        {{ $product->name }}

                                    </h4>

                                    <p class="mt-1 truncate text-sm text-slate-500">

                                        {{ $product->umkm->business_name ?? 'UMKM Desa' }}

                                    </p>

                                    @if (!empty($product->price))
                                        <p class="mt-2 font-bold text-emerald-600">

                                            Rp {{ number_format($product->price, 0, ',', '.') }}

                                        </p>
                                    @endif

                                </div>

                            </div>

                        @empty

                            @foreach (range(1, 3) as $i)
                                <div class="flex items-center gap-4 rounded-2xl border border-slate-200 p-4">

                                    <div class="h-16 w-16 rounded-2xl bg-slate-100"></div>

                                    <div class="flex-1">

                                        <div class="h-4 w-36 rounded bg-slate-100"></div>

                                        <div class="mt-3 h-3 w-24 rounded bg-slate-100"></div>

                                    </div>

                                </div>
                            @endforeach

                        @endforelse

                    </div>

                </div>

                {{-- ====================================================== --}}
                {{-- Floating Insight Card --}}
                {{-- ====================================================== --}}
                <div
                    class="absolute -left-10 bottom-12 rounded-3xl border border-white/70 bg-white/90 p-6 shadow-2xl backdrop-blur">

                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">

                        Platform

                    </p>

                    <div class="mt-3 flex items-end gap-2">

                        <span class="text-4xl font-extrabold tracking-tight text-emerald-600">

                            {{ number_format($statistics['umkms'] ?? 0) }}

                        </span>

                        <span class="pb-1 text-sm text-slate-500">

                            UMKM

                        </span>

                    </div>

                    <p class="mt-2 text-sm leading-6 text-slate-500">

                        telah bergabung dalam
                        Sistem Informasi UMKM Desa.

                    </p>

                </div>





                {{-- ====================================================== --}}
                {{-- Floating Badge --}}
                {{-- ====================================================== --}}
                <div
                    class="absolute -right-8 top-16 rounded-3xl border border-emerald-100 bg-emerald-600 px-6 py-5 text-white shadow-xl">

                    <p class="text-xs uppercase tracking-[0.18em] text-emerald-100">

                        Produk

                    </p>

                    <p class="mt-2 text-3xl font-bold">

                        {{ number_format($statistics['products'] ?? 0) }}+

                    </p>

                    <p class="mt-1 text-sm text-emerald-100">

                        Produk Dipublikasikan

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

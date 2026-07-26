@extends('layouts.admin')
@section('title', 'Pencarian')
@section('content')

    <div class="space-y-8">

        {{-- ====================================================== --}}
        {{-- Header --}}
        {{-- ====================================================== --}}
        <x-ui.page-header eyebrow="Global Search" title="Hasil Pencarian"
            subtitle="Menampilkan seluruh hasil yang berkaitan dengan kata kunci &quot;{{ $keyword }}&quot;.">

            <x-ui.badge variant="secondary">

                {{ $umkms->count() + $products->count() + $categories->count() }} Hasil

            </x-ui.badge>

        </x-ui.page-header>



        @if ($umkms->isEmpty() && $products->isEmpty() && $categories->isEmpty())

            <x-ui.card>

                <x-ui.empty-state title="Tidak ada hasil ditemukan"
                    description="Coba gunakan kata kunci lain atau periksa kembali ejaan pencarian Anda.">

                    <x-ui.button href="{{ url()->previous() }}" variant="secondary">

                        Kembali

                    </x-ui.button>

                </x-ui.empty-state>

            </x-ui.card>
        @else
            {{-- ====================================================== --}}
            {{-- UMKM --}}
            {{-- ====================================================== --}}
            @if ($umkms->count())

                <x-ui.card>

                    <x-ui.section-title eyebrow="UMKM" title="Hasil UMKM"
                        subtitle="{{ $umkms->count() }} UMKM ditemukan berdasarkan kata kunci." />

                    <div class="mt-8 space-y-4">

                        @foreach ($umkms as $umkm)
                            <a href="{{ route('admin.umkms.show', $umkm) }}"
                                class="group flex items-start gap-5 rounded-2xl border border-slate-200 bg-white p-5 transition-all duration-200 hover:-translate-y-0.5 hover:border-emerald-200 hover:bg-emerald-50 hover:shadow-md">

                                {{-- Avatar --}}
                                <div
                                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-emerald-100 text-lg font-bold text-emerald-700">

                                    {{ strtoupper(substr($umkm->business_name, 0, 1)) }}

                                </div>

                                {{-- Content --}}
                                <div class="min-w-0 flex-1">

                                    <div class="flex flex-wrap items-center gap-3">

                                        <h3 class="text-lg font-semibold text-slate-900">

                                            {{ $umkm->business_name }}

                                        </h3>

                                        @if ($umkm->category)
                                            <x-ui.badge variant="success">

                                                {{ $umkm->category->name }}

                                            </x-ui.badge>
                                        @endif

                                    </div>

                                    <p class="mt-2 text-sm leading-6 text-slate-500">

                                        {{ $umkm->address ?: 'Alamat belum tersedia.' }}

                                    </p>

                                </div>

                                {{-- Arrow --}}
                                <div class="flex items-center text-slate-300 transition group-hover:text-emerald-600">

                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />

                                    </svg>

                                </div>

                            </a>
                        @endforeach

                    </div>

                </x-ui.card>

            @endif

            {{-- ====================================================== --}}
            {{-- Produk --}}
            {{-- ====================================================== --}}
            @if ($products->count())

                <x-ui.card>

                    <x-ui.section-title eyebrow="Produk" title="Hasil Produk"
                        subtitle="{{ $products->count() }} produk ditemukan berdasarkan kata kunci." />

                    <div class="mt-8 space-y-4">

                        @foreach ($products as $product)
                            <a href="{{ route('admin.products.show', $product) }}"
                                class="group flex items-start gap-5 rounded-2xl border border-slate-200 bg-white p-5 transition-all duration-200 hover:-translate-y-0.5 hover:border-emerald-200 hover:bg-emerald-50 hover:shadow-md">

                                {{-- Thumbnail --}}
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="h-16 w-16 rounded-2xl border border-slate-200 object-cover">
                                @else
                                    <div
                                        class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V7a2 2 0 00-2-2h-3V3H9v2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4" />

                                        </svg>

                                    </div>
                                @endif

                                {{-- Content --}}
                                <div class="min-w-0 flex-1">

                                    <div class="flex flex-wrap items-center gap-3">

                                        <h3 class="text-lg font-semibold text-slate-900">

                                            {{ $product->name }}

                                        </h3>

                                        @if ($product->is_featured)
                                            <x-ui.badge variant="warning">

                                                Unggulan

                                            </x-ui.badge>
                                        @endif

                                    </div>

                                    @if ($product->umkm)
                                        <p class="mt-2 text-sm text-slate-500">

                                            {{ $product->umkm->business_name }}

                                        </p>
                                    @endif

                                    @if ($product->price)
                                        <p class="mt-2 font-semibold text-emerald-600">

                                            Rp {{ number_format($product->price, 0, ',', '.') }}

                                        </p>
                                    @endif

                                </div>

                                <div class="flex items-center text-slate-300 transition group-hover:text-emerald-600">

                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />

                                    </svg>

                                </div>

                            </a>
                        @endforeach

                    </div>

                </x-ui.card>

            @endif



            {{-- ====================================================== --}}
            {{-- Kategori --}}
            {{-- ====================================================== --}}
            @if ($categories->count())

                <x-ui.card>

                    <x-ui.section-title eyebrow="Kategori" title="Hasil Kategori"
                        subtitle="{{ $categories->count() }} kategori ditemukan." />

                    <div class="mt-8 flex flex-wrap gap-3">

                        @foreach ($categories as $category)
                            <x-ui.badge variant="success">

                                {{ $category->name }}

                            </x-ui.badge>
                        @endforeach

                    </div>

                </x-ui.card>

            @endif

        @endif

    </div>

@endsection

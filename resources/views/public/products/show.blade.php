@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.public')

@section('title', $product->name)

@section('meta_description', Str::limit(strip_tags($product->description ?? ''), 160))

@section('og_image', $product->image ? asset('storage/' . $product->image) : asset('images/og-image.jpg'))

@section('content')

    {{-- ====================================================== --}}
    {{-- Product Hero --}}
    {{-- ====================================================== --}}
    <section class="py-20">

        <div class="app-container">

            <div class="grid items-center gap-12 lg:grid-cols-2">

                {{-- ====================================================== --}}
                {{-- Product Image --}}
                {{-- ====================================================== --}}
                <div>

                    <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-xl">

                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" loading="lazy"
                                class="aspect-square w-full object-cover">
                        @else
                            <div class="flex aspect-square items-center justify-center bg-slate-100 text-slate-400">

                                <div class="text-center">

                                    <svg class="mx-auto h-14 w-14" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7L12 3 4 7l8 4 8-4M4 9l8 4 8-4V9l-8 4z" />

                                    </svg>

                                    <p class="mt-4">

                                        Gambar produk belum tersedia

                                    </p>

                                </div>

                            </div>
                        @endif

                    </div>

                </div>





                {{-- ====================================================== --}}
                {{-- Product Information --}}
                {{-- ====================================================== --}}
                <div>

                    @if ($product->umkm)
                        <x-ui.badge variant="secondary">

                            {{ $product->umkm->business_name }}

                        </x-ui.badge>
                    @endif





                    <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-slate-900 lg:text-5xl">

                        {{ $product->name }}

                    </h1>





                    @if ($product->price)
                        <div class="mt-8">

                            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-400">

                                Harga Produk

                            </p>

                            <p class="mt-3 text-5xl font-extrabold tracking-tight text-emerald-600">

                                Rp {{ number_format($product->price, 0, ',', '.') }}

                            </p>

                        </div>
                    @endif





                    <div class="mt-10">

                        <h2 class="text-xl font-bold text-slate-900">

                            Deskripsi Produk

                        </h2>

                        <p class="mt-4 leading-8 text-slate-600">

                            {{ $product->description ?: 'Belum ada deskripsi produk.' }}

                        </p>

                    </div>





                    <div class="mt-10 flex flex-wrap gap-3">

                        @if ($product->umkm?->phone)
                            <x-ui.button href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->umkm->phone) }}"
                                target="_blank">

                                Hubungi WhatsApp

                            </x-ui.button>
                        @endif





                        @if ($product->umkm)
                            <x-ui.button href="{{ route('public.umkms.show', $product->umkm) }}" variant="secondary">

                                Lihat Profil UMKM

                            </x-ui.button>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- ====================================================== --}}
    {{-- Informasi UMKM --}}
    {{-- ====================================================== --}}
    <section class="bg-slate-50 py-20">

        <div class="app-container">

            <x-ui.section-title title="Tentang Pelaku UMKM"
                subtitle="Informasi mengenai UMKM yang menghasilkan produk ini." />





            <div class="mt-12 grid gap-6 md:grid-cols-2">

                {{-- Nama UMKM --}}
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Nama UMKM

                    </p>

                    <p class="mt-3 text-lg font-semibold text-slate-900">

                        {{ $product->umkm?->business_name ?? '-' }}

                    </p>

                </div>





                {{-- Kategori --}}
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Kategori Usaha

                    </p>

                    <p class="mt-3 text-lg font-semibold text-slate-900">

                        {{ $product->umkm?->category?->name ?? '-' }}

                    </p>

                </div>





                {{-- Alamat --}}
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Alamat

                    </p>

                    <p class="mt-3 leading-7 text-slate-700">

                        {{ $product->umkm?->address ?? '-' }}

                    </p>

                </div>





                {{-- Wilayah --}}
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Wilayah

                    </p>

                    <p class="mt-3 leading-7 text-slate-700">

                        {{ collect([$product->umkm?->village, $product->umkm?->district, $product->umkm?->regency])->filter()->implode(', ') }}

                    </p>

                </div>

            </div>





            @if ($product->umkm)
                <div class="mt-10">

                    <x-ui.button href="{{ route('public.umkms.show', $product->umkm) }}" variant="secondary">

                        Lihat Profil Lengkap UMKM

                    </x-ui.button>

                </div>
            @endif

        </div>

    </section>





    {{-- ====================================================== --}}
    {{-- Explore CTA --}}
    {{-- ====================================================== --}}
    <section class="pb-24">

        <div class="app-container">

            <div class="rounded-[2rem] bg-gradient-to-r from-emerald-600 to-teal-600 px-10 py-12 text-white">

                <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                    <div>

                        <h2 class="text-3xl font-bold">

                            Temukan Produk Lokal Lainnya

                        </h2>

                        <p class="mt-3 max-w-2xl leading-8 text-emerald-100">

                            Jelajahi berbagai produk unggulan lainnya dari UMKM
                            Desa Salamnunggal dan dukung perkembangan usaha lokal.

                        </p>

                    </div>





                    <div class="flex flex-wrap gap-3">

                        <x-ui.button href="{{ route('public.products.index') }}" variant="secondary">

                            Semua Produk

                        </x-ui.button>

                        @if ($product->umkm)
                            <x-ui.button href="{{ route('public.umkms.show', $product->umkm) }}">

                                Kunjungi UMKM

                            </x-ui.button>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection

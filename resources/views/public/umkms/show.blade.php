@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.public')

@section('title', $umkm->business_name)

@section('meta_description', Str::limit(strip_tags($umkm->description ?? ''), 160))

@section('og_image', $umkm->banner ? asset('storage/' . $umkm->banner) : asset('images/og-image.jpg'))

@section('content')

    {{-- ====================================================== --}}
    {{-- Hero Profile --}}
    {{-- ====================================================== --}}
    <section class="relative">

        <div class="relative h-[24rem] overflow-hidden lg:h-[30rem]">

            {{-- Banner --}}
            @if ($umkm->banner)
                <img src="{{ asset('storage/' . $umkm->banner) }}" alt="{{ $umkm->business_name }}" loading="lazy"
                    class="h-full w-full object-cover">
            @else
                <div class="h-full bg-gradient-to-br from-emerald-600 via-emerald-700 to-teal-700">
                </div>
            @endif





            {{-- Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/35 to-transparent">
            </div>





            {{-- Content --}}
            <div class="absolute inset-x-0 bottom-0">

                <div class="app-container pb-14">

                    <div class="max-w-3xl">

                        <x-ui.badge variant="success">

                            {{ $umkm->category?->name ?? 'UMKM Desa' }}

                        </x-ui.badge>

                        <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-white lg:text-6xl">

                            {{ $umkm->business_name }}

                        </h1>

                        <p class="mt-5 flex items-center gap-3 text-lg text-white/90">

                            <svg class="h-6 w-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0L6.343 16.657A8 8 0 1117.657 16.657z" />

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />

                            </svg>

                            <span>

                                {{ collect([$umkm->village, $umkm->district, $umkm->regency])->filter()->implode(', ') }}

                            </span>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>





    {{-- ====================================================== --}}
    {{-- Identity --}}
    {{-- ====================================================== --}}
    <section class="relative -mt-12 pb-20">

        <div class="app-container">

            <div class="grid gap-8 lg:grid-cols-4">

                {{-- Logo --}}
                <div>

                    <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-4 shadow-xl">

                        @if ($umkm->logo)
                            <img src="{{ asset('storage/' . $umkm->logo) }}" alt="{{ $umkm->business_name }}"
                                class="aspect-square w-full rounded-[1.5rem] object-cover">
                        @else
                            <div
                                class="flex aspect-square items-center justify-center rounded-[1.5rem] bg-slate-100 text-slate-400">

                                Logo UMKM

                            </div>
                        @endif

                    </div>

                </div>





                {{-- Identity --}}
                <div class="lg:col-span-3">

                    <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">

                        <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                            <div>

                                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-emerald-600">

                                    Profil UMKM

                                </p>

                                <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-900">

                                    {{ $umkm->business_name }}

                                </h2>

                                <div class="mt-4 flex flex-wrap items-center gap-3">

                                    <x-ui.badge variant="secondary">

                                        {{ $umkm->category?->name ?? 'Belum Berkategori' }}

                                    </x-ui.badge>

                                </div>

                            </div>

                            @if ($umkm->phone)
                                <x-ui.button href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $umkm->phone) }}"
                                    target="_blank">

                                    Hubungi WhatsApp

                                </x-ui.button>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>





    {{-- ====================================================== --}}
    {{-- Informasi UMKM --}}
    {{-- ====================================================== --}}
    <section class="pb-20">

        <div class="app-container">

            <x-ui.section-title title="Informasi UMKM"
                subtitle="Informasi umum mengenai usaha, kontak, dan lokasi pelaku UMKM." />





            <div class="mt-12 grid gap-6 md:grid-cols-2">

                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Kategori Usaha

                    </p>

                    <p class="mt-3 text-lg font-semibold text-slate-900">

                        {{ $umkm->category?->name ?? '-' }}

                    </p>

                </div>





                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Nomor Telepon

                    </p>

                    <p class="mt-3 text-lg font-semibold text-slate-900">

                        {{ $umkm->phone ?: '-' }}

                    </p>

                </div>





                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Alamat

                    </p>

                    <p class="mt-3 leading-7 text-slate-700">

                        {{ $umkm->address ?: '-' }}

                    </p>

                </div>





                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                    <p class="text-sm font-medium text-slate-500">

                        Wilayah

                    </p>

                    <p class="mt-3 leading-7 text-slate-700">

                        {{ collect([$umkm->village, $umkm->district, $umkm->regency])->filter()->implode(', ') }}

                    </p>

                </div>

            </div>

        </div>

    </section>
    {{-- ====================================================== --}}
    {{-- Tentang UMKM --}}
    {{-- ====================================================== --}}
    <section class="pb-20">

        <div class="app-container">

            <x-ui.section-title title="Tentang UMKM" subtitle="Profil singkat mengenai usaha dan potensi yang dimiliki." />

            <div class="mt-10 rounded-3xl border border-slate-200 bg-white p-8 shadow-sm lg:p-10">

                @if ($umkm->description)
                    <div class="prose prose-slate max-w-none leading-8">

                        {!! nl2br(e($umkm->description)) !!}

                    </div>
                @else
                    <p class="leading-8 text-slate-500">

                        Belum terdapat deskripsi mengenai UMKM ini.

                    </p>
                @endif

            </div>

        </div>

    </section>





    {{-- ====================================================== --}}
    {{-- Produk UMKM --}}
    {{-- ====================================================== --}}
    <section class="bg-slate-50 py-20">

        <div class="app-container">

            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

                <x-ui.section-title title="Produk UMKM" subtitle="Produk-produk yang dipublikasikan oleh pelaku UMKM." />

                @if ($umkm->products->count())
                    <x-ui.button
                        href="{{ route('public.products.index', [
                            'umkm' => $umkm->slug,
                        ]) }}"
                        variant="secondary">

                        Lihat Semua Produk

                    </x-ui.button>
                @endif

            </div>





            @if ($umkm->products->count())

                <div class="mt-12 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">

                    @foreach ($umkm->products->take(6) as $product)
                        <x-product.card :product="$product" />
                    @endforeach

                </div>
            @else
                <div class="mt-12 rounded-3xl border border-dashed border-slate-300 bg-white px-8 py-16 text-center">

                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-slate-100 text-slate-400">

                        <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7L12 3 4 7l8 4 8-4M4 9l8 4 8-4V9l-8 4z" />

                        </svg>

                    </div>

                    <h3 class="mt-6 text-xl font-bold text-slate-900">

                        Belum Ada Produk

                    </h3>

                    <p class="mx-auto mt-3 max-w-lg leading-7 text-slate-500">

                        Produk akan ditampilkan setelah pelaku UMKM menambahkan data produk.

                    </p>

                </div>

            @endif

        </div>

    </section>





    {{-- ====================================================== --}}
    {{-- Lokasi --}}
    {{-- ====================================================== --}}
    @if ($umkm->maps)
        <section class="py-20">

            <div class="app-container">

                <x-ui.section-title title="Lokasi UMKM" subtitle="Temukan lokasi UMKM melalui Google Maps." />

                <div class="mt-10 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                    <iframe src="{{ $umkm->maps }}" loading="lazy" allowfullscreen class="h-[450px] w-full border-0">
                    </iframe>

                </div>

            </div>

        </section>
    @endif





    {{-- ====================================================== --}}
    {{-- CTA --}}
    {{-- ====================================================== --}}
    <section class="pb-24">

        <div class="app-container">

            <div class="rounded-[2rem] bg-gradient-to-r from-emerald-600 to-teal-600 px-10 py-12 text-white">

                <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                    <div>

                        <h2 class="text-3xl font-bold">

                            Temukan UMKM Lokal Lainnya

                        </h2>

                        <p class="mt-3 max-w-2xl leading-8 text-emerald-100">

                            Jelajahi berbagai UMKM lainnya di Desa Salamnunggal
                            dan temukan beragam produk lokal yang berkualitas.

                        </p>

                    </div>

                    <div class="flex flex-wrap gap-3">

                        <x-ui.button href="{{ route('public.umkms.index') }}" variant="secondary">

                            Semua UMKM

                        </x-ui.button>

                        <x-ui.button href="{{ route('public.products.index') }}">

                            Semua Produk

                        </x-ui.button>

                    </div>

                </div>

            </div>

        </div>

    </section>

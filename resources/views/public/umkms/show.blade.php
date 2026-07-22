@extends('layouts.public')

@section('title', $umkm->business_name)

@section('content')

    {{-- Hero --}}
    <section class="bg-slate-100">

        <div class="relative h-72 overflow-hidden">

            @if ($umkm->banner)

                <img
                    src="{{ asset('storage/' . $umkm->banner) }}"
                    alt="{{ $umkm->business_name }}"
                    class="h-full w-full object-cover">

            @else

                <div class="flex h-full items-center justify-center bg-gradient-to-r from-emerald-500 to-emerald-700">

                    <span class="text-2xl font-bold tracking-tight text-white">

                        {{ $umkm->business_name }}

                    </span>

                </div>

            @endif

        </div>

    </section>

    {{-- Business Information --}}
    <section class="py-12">

        <div class="app-container">

            <div class="grid gap-10 lg:grid-cols-3">

                {{-- Business Logo --}}
                <div>

                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                        @if ($umkm->logo)

                            <img
                                src="{{ asset('storage/' . $umkm->logo) }}"
                                alt="{{ $umkm->business_name }}"
                                class="aspect-square h-60 w-full object-cover">

                        @else

                            <div class="flex aspect-square h-60 items-center justify-center bg-slate-100">

                                <span class="text-sm text-slate-400">

                                    Logo UMKM

                                </span>

                            </div>

                        @endif

                    </div>

                </div>

                {{-- Business Details --}}
                <div class="lg:col-span-2">

                    <x-ui.badge>

                        {{ $umkm->category->name }}

                    </x-ui.badge>

                    <h1 class="mt-4 text-4xl font-bold tracking-tight text-slate-900">

                        {{ $umkm->business_name }}

                    </h1>

                    <div class="mt-8 grid gap-6 text-slate-600 md:grid-cols-2">

                        <div>

                            <p class="text-sm font-medium text-slate-500">

                                Alamat

                            </p>

                            <p class="mt-1 text-slate-900">

                                {{ $umkm->address }}

                            </p>

                        </div>

                        <div>

                            <p class="text-sm font-medium text-slate-500">

                                Wilayah

                            </p>

                            <p class="mt-1 text-slate-900">

                                {{ collect([
                                    $umkm->village,
                                    $umkm->district,
                                    $umkm->regency,
                                ])->filter()->implode(', ') }}

                            </p>

                        </div>

                        <div>

                            <p class="text-sm font-medium text-slate-500">

                                Telepon

                            </p>

                            <p class="mt-1 text-slate-900">

                                {{ $umkm->phone }}

                            </p>

                        </div>

                    </div>

                    <div class="mt-8">

                        <a
                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $umkm->phone) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center rounded-xl bg-emerald-600 px-6 py-3 font-medium text-white transition-colors duration-200 hover:bg-emerald-700">

                            Hubungi via WhatsApp

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- About Business --}}
    <section class="pb-16">

        <div class="app-container">

            <x-ui.section-title
                title="Tentang UMKM"
                subtitle="Informasi mengenai usaha." />

            <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">

                <p class="leading-8 text-slate-700">

                    {{ $umkm->description ?: 'Belum ada deskripsi.' }}

                </p>

            </div>

        </div>

    </section>

    {{-- Products --}}
    <section class="pb-16">

        <div class="app-container">

            <x-ui.section-title
                title="Produk"
                subtitle="Produk yang dimiliki UMKM ini." />

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                @forelse ($umkm->products as $product)

                    <x-product.card
                        :product="$product" />

                @empty

                    <div class="md:col-span-2 lg:col-span-3">

                        <x-ui.empty-state
                            title="Belum Ada Produk"
                            description="UMKM ini belum menambahkan produk." />

                    </div>

                @endforelse

            </div>

        </div>

    </section>

    {{-- Location --}}
    @if ($umkm->maps_url)

        <section class="pb-20">

            <div class="app-container">

                <x-ui.section-title
                    title="Lokasi"
                    subtitle="Temukan lokasi UMKM." />

                <div class="overflow-hidden rounded-2xl border border-slate-200 shadow-sm">

                    <iframe
                        src="{{ $umkm->maps_url }}"
                        class="h-[450px] w-full"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen>

                    </iframe>

                </div>

            </div>

        </section>

    @endif

@endsection

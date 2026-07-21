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
                <span class="text-2xl font-semibold text-white">
                    {{ $umkm->business_name }}
                </span>
            </div>
        @endif

    </div>

</section>

{{-- Information --}}
<section class="py-12">

    <div class="mx-auto max-w-7xl px-6">

        <div class="grid gap-10 lg:grid-cols-3">

            {{-- Left --}}
            <div>

                <div class="overflow-hidden rounded-2xl border bg-white shadow-sm">

                    @if($umkm->logo)

                        <img
                            src="{{ asset('storage/'.$umkm->logo) }}"
                            class="h-60 w-full object-cover">

                    @else

                        <div class="flex h-60 items-center justify-center bg-slate-100">

                            <span class="text-slate-400">
                                Logo UMKM
                            </span>

                        </div>

                    @endif

                </div>

            </div>

            {{-- Right --}}
            <div class="lg:col-span-2">

                <x-ui.badge>

                    {{ $umkm->category->name }}

                </x-ui.badge>

                <h1 class="mt-4 text-4xl font-bold text-slate-800">

                    {{ $umkm->business_name }}

                </h1>

                <div class="mt-6 space-y-3 text-slate-600">

                    <p>

                        <strong>Alamat :</strong>

                        {{ $umkm->address }}

                    </p>

                    <p>

                        <strong>Wilayah :</strong>

                        {{ collect([
                            $umkm->village,
                            $umkm->district,
                            $umkm->regency
                        ])->filter()->implode(', ') }}

                    </p>

                    <p>

                        <strong>Telepon :</strong>

                        {{ $umkm->phone }}

                    </p>

                </div>

                <div class="mt-8">

                    <a
                        href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $umkm->phone) }}"
                        target="_blank"
                        class="inline-flex rounded-xl bg-emerald-600 px-6 py-3 font-medium text-white transition hover:bg-emerald-700">

                        Hubungi via WhatsApp

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- Description --}}
<section class="pb-16">

    <div class="mx-auto max-w-7xl px-6">

        <x-ui.section-title
            title="Tentang UMKM"
            subtitle="Informasi mengenai usaha." />

        <div class="rounded-2xl border bg-white p-8 shadow-sm">

            <p class="leading-8 text-slate-700">

                {{ $umkm->description ?: 'Belum ada deskripsi.' }}

            </p>

        </div>

    </div>

</section>

{{-- Products --}}
<section class="pb-16">

    <div class="mx-auto max-w-7xl px-6">

        <x-ui.section-title
            title="Produk"
            subtitle="Produk yang dimiliki UMKM ini." />

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

            @forelse($umkm->products as $product)

                <x-product.card
                    :product="$product"/>

            @empty

                <x-ui.empty-state
                    title="Belum Ada Produk"
                    description="UMKM ini belum menambahkan produk." />

            @endforelse

        </div>

    </div>

</section>

{{-- Maps --}}
@if($umkm->maps_url)

<section class="pb-20">

    <div class="mx-auto max-w-7xl px-6">

        <x-ui.section-title
            title="Lokasi"
            subtitle="Temukan lokasi UMKM." />

        <div class="overflow-hidden rounded-2xl border shadow-sm">

            <iframe
                src="{{ $umkm->maps_url }}"
                width="100%"
                height="450"
                style="border:0;"
                loading="lazy"
                allowfullscreen>

            </iframe>

        </div>

    </div>

</section>

@endif

@endsection

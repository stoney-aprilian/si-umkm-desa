@extends('layouts.public')

@section('title', $product->name)

@section('content')

    {{-- Product Hero --}}
    <section class="bg-slate-50 py-16">

        <div class="app-container">

            <div class="grid gap-12 lg:grid-cols-2">

                {{-- Product Image --}}
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    @if ($product->image)

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="aspect-square h-full w-full object-cover">

                    @else

                        <div class="flex aspect-square items-center justify-center bg-slate-100">

                            <span class="text-sm text-slate-400">

                                Tidak ada gambar produk

                            </span>

                        </div>

                    @endif

                </div>

                {{-- Product Information --}}
                <div class="flex flex-col justify-center">

                    <p class="text-sm font-semibold uppercase tracking-wide text-emerald-600">

                        {{ $product->umkm->business_name }}

                    </p>

                    <h1 class="mt-3 text-4xl font-bold tracking-tight text-slate-900">

                        {{ $product->name }}

                    </h1>

                    @if ($product->price)

                        <p class="mt-6 text-3xl font-bold text-emerald-600">

                            Rp {{ number_format($product->price, 0, ',', '.') }}

                        </p>

                    @endif

                    <div class="mt-8 space-y-3">

                        <h2 class="text-lg font-semibold text-slate-900">

                            Deskripsi

                        </h2>

                        <p class="leading-8 text-slate-600">

                            {{ $product->description ?: 'Belum ada deskripsi produk.' }}

                        </p>

                    </div>

                    <div class="mt-10 flex flex-wrap gap-4">

                        <a
                            href="{{ route('public.umkms.show', $product->umkm) }}"
                            class="inline-flex items-center justify-center rounded-xl border border-emerald-600 px-6 py-3 font-medium text-emerald-600 transition-colors duration-200 hover:bg-emerald-50">

                            Lihat UMKM

                        </a>

                        <a
                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->umkm->phone) }}"
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

    {{-- Business Information --}}
    <section class="pb-20">

        <div class="app-container">

            <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">

                <h2 class="text-2xl font-semibold text-slate-900">

                    Informasi UMKM

                </h2>

                <div class="mt-6 grid gap-6 text-slate-600 md:grid-cols-2">

                    <div>

                        <p class="text-sm font-medium text-slate-500">

                            Nama UMKM

                        </p>

                        <p class="mt-1 font-medium text-slate-900">

                            {{ $product->umkm->business_name }}

                        </p>

                    </div>

                    <div>

                        <p class="text-sm font-medium text-slate-500">

                            Kategori

                        </p>

                        <p class="mt-1 font-medium text-slate-900">

                            {{ $product->umkm->category->name }}

                        </p>

                    </div>

                    <div>

                        <p class="text-sm font-medium text-slate-500">

                            Alamat

                        </p>

                        <p class="mt-1 text-slate-900">

                            {{ $product->umkm->address }}

                        </p>

                    </div>

                    <div>

                        <p class="text-sm font-medium text-slate-500">

                            Wilayah

                        </p>

                        <p class="mt-1 text-slate-900">

                            {{ collect([
                                $product->umkm->village,
                                $product->umkm->district,
                                $product->umkm->regency,
                            ])->filter()->implode(', ') }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection

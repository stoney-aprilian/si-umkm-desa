@extends('layouts.public')

@section('title', $product->name)

@section('content')

{{-- Hero --}}
<section class="bg-slate-50 py-16">

    <div class="mx-auto max-w-7xl px-6">

        <div class="grid gap-12 lg:grid-cols-2">

            {{-- Gambar Produk --}}
            <div class="overflow-hidden rounded-2xl border bg-white shadow-sm">

                @if ($product->image)

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="h-full w-full object-cover">

                @else

                    <div class="flex h-96 items-center justify-center bg-slate-100">

                        <span class="text-slate-400">
                            Tidak ada gambar
                        </span>

                    </div>

                @endif

            </div>

            {{-- Informasi Produk --}}
            <div>

                <p class="text-sm font-medium text-emerald-600">

                    {{ $product->umkm->business_name }}

                </p>

                <h1 class="mt-3 text-4xl font-bold text-slate-800">

                    {{ $product->name }}

                </h1>

                @if($product->price)

                    <p class="mt-6 text-3xl font-bold text-emerald-600">

                        Rp {{ number_format($product->price, 0, ',', '.') }}

                    </p>

                @endif

                <div class="mt-8">

                    <h2 class="text-lg font-semibold text-slate-800">

                        Deskripsi

                    </h2>

                    <p class="mt-3 leading-8 text-slate-600">

                        {{ $product->description ?: 'Belum ada deskripsi produk.' }}

                    </p>

                </div>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a
                        href="{{ route('public.umkms.show', $product->umkm) }}"
                        class="rounded-xl border border-emerald-600 px-6 py-3 font-medium text-emerald-600 transition hover:bg-emerald-50">

                        Lihat UMKM

                    </a>

                    <a
                        href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->umkm->phone) }}"
                        target="_blank"
                        class="rounded-xl bg-emerald-600 px-6 py-3 font-medium text-white transition hover:bg-emerald-700">

                        Hubungi via WhatsApp

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- Informasi UMKM --}}
<section class="pb-20">

    <div class="mx-auto max-w-7xl px-6">

        <div class="rounded-2xl border bg-white p-8 shadow-sm">

            <h2 class="text-2xl font-semibold text-slate-800">

                Informasi UMKM

            </h2>

            <div class="mt-6 space-y-4 text-slate-600">

                <p>

                    <strong>Nama UMKM:</strong>

                    {{ $product->umkm->business_name }}

                </p>

                <p>

                    <strong>Kategori:</strong>

                    {{ $product->umkm->category->name }}

                </p>

                <p>

                    <strong>Alamat:</strong>

                    {{ $product->umkm->address }}

                </p>

                <p>

                    <strong>Wilayah:</strong>

                    {{ collect([
                        $product->umkm->village,
                        $product->umkm->district,
                        $product->umkm->regency
                    ])->filter()->implode(', ') }}

                </p>

            </div>

        </div>

    </div>

</section>

@endsection

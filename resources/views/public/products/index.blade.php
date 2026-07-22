@extends('layouts.public')

@section('title', 'Produk UMKM')

@section('content')

    <section class="bg-slate-50 py-16">

        <div class="app-container">

            {{-- Page Header --}}
            <x-ui.section-title
                title="Produk UMKM"
                subtitle="Temukan berbagai produk unggulan dari UMKM Desa." />

            {{-- Filter --}}
            <div class="mt-8">

                <x-ui.filter-bar
                    :action="route('public.products.index')"
                    :categories="$categories"
                    searchPlaceholder="Cari nama produk..." />

            </div>

            {{-- Active Filter --}}
            @if (request()->filled('search') || request()->filled('category'))

                <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">

                    Menampilkan hasil berdasarkan filter yang dipilih.

                </div>

            @endif

            {{-- Product Grid --}}
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                @forelse ($products as $product)

                    <x-product.card :product="$product" />

                @empty

                    <div class="sm:col-span-2 lg:col-span-3">

                        <x-ui.empty-state
                            title="Produk Tidak Ditemukan"
                            description="Tidak ada produk yang sesuai dengan pencarian atau kategori yang dipilih." />

                    </div>

                @endforelse

            </div>

            {{-- Pagination --}}
            @if ($products->hasPages())

                <div class="mt-10">

                    {{ $products->links() }}

                </div>

            @endif

        </div>

    </section>

@endsection

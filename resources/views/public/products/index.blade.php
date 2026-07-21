@extends('layouts.public')

@section('title', 'Produk UMKM')

@section('content')

<section class="bg-slate-50 py-16">

    <div class="mx-auto max-w-7xl px-6">

        <x-ui.section-title
            title="Produk UMKM"
            subtitle="Temukan berbagai produk unggulan dari UMKM Desa." />

        <div class="mt-8">

            <x-ui.filter-bar
                :action="route('public.products.index')"
                :categories="$categories"
                searchPlaceholder="Cari nama produk..." />

        </div>

        @if(request('search') || request('category'))

            <div class="mt-6 text-sm text-slate-600">

                Menampilkan hasil pencarian.

            </div>

        @endif

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @forelse($products as $product)

                <x-product.card :product="$product" />

            @empty

                <div class="sm:col-span-2 lg:col-span-3">

                    <x-ui.empty-state
                        title="Produk Tidak Ditemukan"
                        description="Tidak ada produk yang sesuai dengan pencarian atau kategori yang dipilih." />

                </div>

            @endforelse

        </div>

        @if($products->hasPages())

            <div class="mt-10">

                {{ $products->links() }}

            </div>

        @endif

    </div>

</section>

@endsection

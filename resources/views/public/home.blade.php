@extends('layouts.public')

@section('title', 'Beranda')

@section(
    'meta_description',
    'Jelajahi UMKM Desa Salamnunggal, temukan produk unggulan, kategori usaha, dan informasi lengkap pelaku UMKM lokal dalam satu platform.'
)

@section('og_image', asset('images/og-image.jpg'))

@section('content')

    {{-- ====================================================== --}}
    {{-- Hero --}}
    {{-- ====================================================== --}}
    <x-home.hero />



    {{-- ====================================================== --}}
    {{-- Search --}}
    {{-- ====================================================== --}}
    <section
        id="search"
        class="relative -mt-10 z-10">

        <div class="app-container">

            <x-ui.search-bar
                placeholder="Cari UMKM, produk, atau kategori..." />

        </div>

    </section>



    {{-- ====================================================== --}}
    {{-- Statistics --}}
    {{-- ====================================================== --}}
    <section
        id="statistics"
        class="py-20">

        <x-home.statistics
            :statistics="$statistics"
            :categories="$categories" />

    </section>



    {{-- ====================================================== --}}
    {{-- Categories --}}
    {{-- ====================================================== --}}
    <section
        id="categories"
        class="bg-white py-20">

        <x-home.categories
            :categories="$categories" />

    </section>



    {{-- ====================================================== --}}
    {{-- Featured UMKM --}}
    {{-- ====================================================== --}}
    <section
        id="umkms"
        class="py-20">

        <x-home.featured-umkms
            :umkms="$latestUmkms" />

    </section>



    {{-- ====================================================== --}}
    {{-- Featured Products --}}
    {{-- ====================================================== --}}
    <section
        id="products"
        class="bg-white py-20">

        <x-home.featured-products
            :products="$featuredProducts" />

    </section>



    {{-- ====================================================== --}}
    {{-- CTA --}}
    {{-- ====================================================== --}}
    <section
        class="py-24">

        <div class="app-container">

            <div
                class="overflow-hidden rounded-[2rem] bg-gradient-to-br from-emerald-600 via-emerald-700 to-emerald-800 px-8 py-14 text-white shadow-xl md:px-14">

                <div
                    class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                    <div class="max-w-2xl">

                        <p
                            class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-emerald-100">

                            UMKM Desa Salamnunggal

                        </p>

                        <h2
                            class="text-3xl font-bold tracking-tight md:text-4xl">

                            Dukung Produk Lokal,
                            Majukan Ekonomi Desa.

                        </h2>

                        <p
                            class="mt-5 leading-7 text-emerald-100">

                            Temukan berbagai UMKM, produk unggulan,
                            serta potensi ekonomi Desa Salamnunggal
                            melalui satu platform digital yang mudah
                            diakses kapan saja.

                        </p>

                    </div>

                    <div
                        class="flex flex-col gap-3 sm:flex-row">

                        <x-ui.button
                            href="{{ route('public.umkms.index') }}"
                            variant="secondary">

                            Jelajahi UMKM

                        </x-ui.button>

                        <x-ui.button
                            href="{{ route('public.products.index') }}">

                            Lihat Produk

                        </x-ui.button>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection

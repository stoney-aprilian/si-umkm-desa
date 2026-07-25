@extends('layouts.public')


@section('title', 'Beranda')


@section(
    'meta_description',
    'Jelajahi UMKM Desa Salamnunggal, temukan produk unggulan, kategori usaha, dan informasi lengkap pelaku UMKM lokal dalam satu platform.'
)


@section('og_image', asset('images/og-image.jpg'))



@section('content')


<div class="space-y-24">


    {{-- Hero --}}
    <x-home.hero />



    {{-- Search --}}
    <section class="public-section">

        <x-ui.search-bar />

    </section>



    {{-- Statistics --}}
    <x-home.statistics
        :statistics="$statistics"
        :categories="$categories" />



    {{-- Categories --}}
    <x-home.categories
        :categories="$categories" />



    {{-- Featured UMKM --}}
    <x-home.featured-umkms
        :umkms="$latestUmkms" />



    {{-- Featured Products --}}
    <x-home.featured-products
        :products="$featuredProducts" />



    {{-- CTA --}}
    <section class="public-section">

        <div class="public-cta">


            <div class="public-cta-inner">


                <div>

                    <h2 class="public-cta-title">

                        Kenali UMKM Desa Salamnunggal

                    </h2>


                    <p class="public-cta-description">

                        Temukan usaha lokal, produk unggulan,
                        dan potensi ekonomi desa dalam satu platform digital.

                    </p>


                </div>



                <a
                    href="{{ route('public.umkms.index') }}"
                    class="btn-secondary">


                    Jelajahi UMKM

                </a>


            </div>


        </div>

    </section>


</div>


@endsection

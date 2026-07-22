@extends('layouts.public')

@section('title', 'Beranda')

@section('content')

    <div class="space-y-24">

        {{-- Hero --}}
        <x-home.hero />

        {{-- Statistics --}}
        <x-home.statistics
            :statistics="$statistics"
            :categories="$categories" />

        {{-- Search --}}
        <x-ui.search-bar />

        {{-- Categories --}}
        <x-home.categories
            :categories="$categories" />

        {{-- Featured UMKM --}}
        <x-home.featured-umkms
            :umkms="$featuredUmkms" />

        {{-- Featured Products --}}
        <x-home.featured-products
            :products="$featuredProducts" />

    </div>

@endsection

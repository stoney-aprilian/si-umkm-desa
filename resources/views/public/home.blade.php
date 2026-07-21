@extends('layouts.public')

@section('title', 'Beranda')

@section('content')

<div class="space-y-24">

    <x-home.hero />

    <x-home.statistics
        :statistics="$statistics"
        :categories="$categories" />

    <x-ui.search-bar />

    <x-home.categories
        :categories="$categories" />

    <x-home.featured-umkms
        :umkms="$featuredUmkms" />

    <x-home.featured-products
        :products="$featuredProducts" />

</div>

@endsection

<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="h-full">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">


    <title>
        @hasSection('title')
            @yield('title') • {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>


    {{-- SEO --}}
    <meta
        name="description"
        content="@yield(
            'meta_description',
            'Sistem Informasi UMKM Desa untuk mengenalkan UMKM lokal, produk unggulan, dan potensi ekonomi desa secara digital.'
        )">


    <meta
        name="keywords"
        content="UMKM Desa, Produk Lokal, Desa Digital, Ekonomi Desa">


    <meta
        name="author"
        content="{{ config('app.name') }}">


    <meta
        name="theme-color"
        content="#059669">


    {{-- Canonical --}}
    <link
        rel="canonical"
        href="{{ url()->current() }}">


    {{-- Favicon --}}
    <link
        rel="icon"
        href="{{ asset('favicon.ico') }}">


    {{-- Open Graph --}}
    <meta
        property="og:title"
        content="@yield('title', config('app.name'))">


    <meta
        property="og:description"
        content="@yield(
            'meta_description',
            'Platform digital informasi UMKM Desa.'
        )">


    <meta
        property="og:type"
        content="website">


    <meta
        property="og:locale"
        content="id_ID">


    <meta
        property="og:url"
        content="{{ url()->current() }}">


    <meta
        property="og:image"
        content="@yield(
            'og_image',
            asset('images/og-image.jpg')
        )">


    {{-- Twitter --}}
    <meta
        name="twitter:card"
        content="summary_large_image">


    <meta
        name="twitter:title"
        content="@yield('title', config('app.name'))">


    <meta
        name="twitter:description"
        content="@yield(
            'meta_description',
            'Platform digital informasi UMKM Desa.'
        )">


    <meta
        name="twitter:image"
        content="@yield(
            'og_image',
            asset('images/og-image.jpg')
        )">


    {{-- Font --}}
    <link
        rel="preconnect"
        href="https://fonts.bunny.net">


    <link
        href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800"
        rel="stylesheet">


    {{-- Assets --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])


    @stack('styles')

</head>


<body class="public-layout min-h-screen font-sans antialiased">


    <div class="flex min-h-screen flex-col">


        {{-- Navigation --}}
        <x-navigation.navbar />


        {{-- Global Feedback --}}
        @includeWhen(
            View::exists('components.flash-message'),
            'components.flash-message'
        )


        {{-- Page Content --}}
        <main
            class="public-main flex-1 overflow-x-hidden"
            id="main-content">

            @yield('content')

        </main>


        {{-- Footer --}}
        <x-navigation.footer />


    </div>


    @stack('scripts')


</body>

</html>

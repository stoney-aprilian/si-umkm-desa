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
        content="@yield('meta_description', 'Sistem Informasi UMKM Desa untuk memperkenalkan UMKM lokal, produk unggulan, dan potensi desa secara digital.')">

    <meta
        name="keywords"
        content="UMKM, Desa, Produk Lokal, Digitalisasi UMKM">

    <meta
        name="author"
        content="{{ config('app.name') }}">

    {{-- Open Graph --}}
    <meta
        property="og:title"
        content="@yield('title', config('app.name'))">

    <meta
        property="og:description"
        content="@yield('meta_description', 'Sistem Informasi UMKM Desa')">

    <meta
        property="og:type"
        content="website">

    <meta
        property="og:locale"
        content="id_ID">

    {{-- Fonts --}}
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

<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased">

    <div class="flex min-h-screen flex-col">

        {{-- Navbar --}}
        <x-navigation.navbar />

        {{-- Flash Message --}}
        @includeWhen(
            View::exists('components.flash-message'),
            'components.flash-message'
        )

        {{-- Main Content --}}
        <main class="flex-1 overflow-x-hidden">

            @yield('content')

        </main>

        {{-- Footer --}}
        <x-navigation.footer />

    </div>

    @stack('scripts')

</body>

</html>

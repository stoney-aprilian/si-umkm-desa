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

    <title>{{ config('app.name', 'SI UMKM Desa') }}</title>

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

</head>

<body class="min-h-screen bg-slate-100 font-sans text-slate-800 antialiased">

    <div class="flex min-h-screen flex-col">

        {{-- Navigation --}}
        @include('layouts.navigation')

        @isset($header)

            {{-- Page Header --}}
            <header class="border-b border-slate-200 bg-white">

                <div class="app-container py-6">

                    {{ $header }}

                </div>

            </header>

        @endisset

        {{-- Page Content --}}
        <main class="flex-1 overflow-x-hidden">

            {{ $slot }}

        </main>

    </div>

</body>

</html>

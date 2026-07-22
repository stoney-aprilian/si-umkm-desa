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

    <div class="flex min-h-screen items-center justify-center px-4 py-8">

        <div class="w-full max-w-md">

            {{-- Logo --}}
            <div class="mb-8 flex justify-center">

                <a
                    href="/"
                    class="transition-opacity duration-200 hover:opacity-80">

                    <x-application-logo class="h-20 w-20" />

                </a>

            </div>

            {{-- Auth Card --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-xl">

                {{ $slot }}

            </div>

        </div>

    </div>

</body>

</html>

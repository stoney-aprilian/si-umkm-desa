<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

            @yield('title') • Owner Panel • {{ config('app.name') }}

        @else

            Owner Panel • {{ config('app.name') }}

        @endif

    </title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800"
        rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

    @stack('styles')

</head>

<body class="bg-slate-100 text-slate-800 antialiased">

<div class="flex min-h-screen">

    {{-- Sidebar Owner --}}
    @include('components.owner.sidebar')

    <div class="flex min-h-screen flex-1 flex-col">

        {{-- Topbar Owner --}}
        @include('components.owner.topbar')

        <main class="flex-1">

            <div class="app-container py-8">

                @includeWhen(
                    View::exists('components.owner.flash-message'),
                    'components.owner.flash-message'
                )

                @yield('content')

            </div>

        </main>

        {{-- Footer --}}
        @include('components.owner.footer')

    </div>

</div>

@stack('scripts')

</body>

</html>

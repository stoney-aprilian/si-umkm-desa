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
            @yield('title') • Owner Panel • {{ config('app.name') }}
        @else
            Owner Panel • {{ config('app.name') }}
        @endif
    </title>

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

<body class="min-h-screen bg-slate-100 font-sans text-slate-800 antialiased">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('layouts.partials.admin.sidebar')

        <div class="flex min-h-screen flex-1 flex-col">

            {{-- Topbar --}}
            @include('layouts.partials.admin.topbar')

            {{-- Main Content --}}
            <main class="flex-1 overflow-x-hidden">

                <div class="app-container space-y-6 py-8">

                    {{-- Flash Message --}}
                    @includeWhen(
                        View::exists('layouts.partials.admin.flash-message'),
                        'layouts.partials.admin.flash-message'
                    )

                    {{-- Page Content --}}
                    @yield('content')

                </div>

            </main>

            {{-- Footer --}}
            @include('layouts.partials.admin.footer')

        </div>

    </div>

    @stack('scripts')

</body>

</html>

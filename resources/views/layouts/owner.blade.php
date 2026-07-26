<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="h-full scroll-smooth">

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

<body
    class="min-h-screen bg-slate-50 font-sans antialiased text-slate-800 selection:bg-emerald-200 selection:text-emerald-900">

    <div class="flex min-h-screen overflow-hidden">

        {{-- Sidebar --}}
        @include('layouts.partials.owner.sidebar')





        {{-- Main Layout --}}
        <div
            class="flex min-h-screen min-w-0 flex-1 flex-col">

            {{-- Topbar --}}
            @include('layouts.partials.owner.topbar')





            {{-- Main Content --}}
            <main
                class="min-h-0 flex-1 overflow-y-auto overflow-x-hidden">

                <div class="app-container py-8">

                    {{-- Flash Message --}}
                    @includeWhen(
                        View::exists('layouts.partials.owner.flash-message'),
                        'layouts.partials.owner.flash-message'
                    )

                    {{-- Page Content --}}
                    @yield('content')

                </div>

            </main>





            {{-- Footer --}}
            @include('layouts.partials.owner.footer')

        </div>

    </div>

    @stack('scripts')

</body>

</html>

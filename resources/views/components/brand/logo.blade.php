@props([
    'size' => 'md',
    'subtitle' => 'Portal Digital Desa Salamnunggal',
    'showSubtitle' => true,
])

@php

$sizes = [

    'sm' => [
        'wrapper' => 'gap-3',
        'logo' => 'h-10 w-10 rounded-2xl text-base',
        'title' => 'text-base',
        'subtitle' => 'text-xs',
    ],

    'md' => [
        'wrapper' => 'gap-3',
        'logo' => 'h-12 w-12 rounded-2xl text-lg',
        'title' => 'text-lg',
        'subtitle' => 'text-xs',
    ],

    'lg' => [
        'wrapper' => 'gap-4',
        'logo' => 'h-14 w-14 rounded-3xl text-xl',
        'title' => 'text-xl',
        'subtitle' => 'text-sm',
    ],

];

$config = $sizes[$size] ?? $sizes['md'];

@endphp

<div class="flex items-center {{ $config['wrapper'] }}">

    {{-- Logo --}}
    <div
        class="
            flex
            {{ $config['logo'] }}
            items-center
            justify-center

            bg-gradient-to-br
            from-emerald-500
            via-emerald-600
            to-emerald-700

            font-black
            tracking-tight
            text-white

            shadow-lg
            shadow-emerald-500/20

            ring-1
            ring-emerald-400/20
        ">

        SI

    </div>

    {{-- Text --}}
    <div>

        <h1 class="{{ $config['title'] }} font-bold tracking-tight text-slate-900">

            SI UMKM Desa

        </h1>

        @if($showSubtitle)

            <p class="{{ $config['subtitle'] }} text-slate-500">

                {{ $subtitle }}

            </p>

        @endif

    </div>

</div>

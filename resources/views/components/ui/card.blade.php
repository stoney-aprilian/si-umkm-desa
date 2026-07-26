@props([
    'padding' => 'md',
    'variant' => 'default',
    'hover' => false,
])

@php

    $paddingClasses = [

        'none' => '',

        'sm' => 'p-4',

        'md' => 'p-6',

        'lg' => 'p-8',

    ];

    $variants = [

        'default' => 'bg-white border border-slate-200',

        'subtle' => 'bg-slate-50 border border-slate-200',

        'transparent' => 'bg-transparent border border-slate-200',

    ];

    $classes = collect([

        'overflow-hidden',

        'rounded-2xl',

        'shadow-sm',

        'transition-all',

        'duration-200',

        $hover
            ? 'hover:-translate-y-1 hover:shadow-lg'
            : '',

        $variants[$variant] ?? $variants['default'],

    ])->filter()->implode(' ');

@endphp

<div
    {{ $attributes->merge([
        'class' => $classes,
    ]) }}>

    @isset($header)

        <div class="border-b border-slate-200 px-6 py-5">

            {{ $header }}

        </div>

    @endisset

    @if ($padding !== 'none')

        <div class="{{ $paddingClasses[$padding] ?? $paddingClasses['md'] }}">

            {{ $slot }}

        </div>

    @else

        {{ $slot }}

    @endif

    @isset($footer)

        <div class="border-t border-slate-200 bg-slate-50 px-6 py-5">

            {{ $footer }}

        </div>

    @endisset

</div>

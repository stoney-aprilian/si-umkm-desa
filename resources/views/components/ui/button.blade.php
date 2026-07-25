@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'type' => 'button',
])


@php

    $variants = [

        'primary' =>
            'bg-emerald-600 text-white hover:bg-emerald-700 focus:ring-emerald-500 shadow-sm',

        'secondary' =>
            'border border-slate-300 bg-white text-slate-700 hover:bg-slate-50 hover:border-slate-400 focus:ring-slate-400',

        'danger' =>
            'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500 shadow-sm',

        'outline' =>
            'border border-emerald-600 bg-white text-emerald-700 hover:bg-emerald-50 focus:ring-emerald-500',

        'ghost' =>
            'bg-transparent text-slate-700 hover:bg-slate-100 focus:ring-slate-400',

    ];


    $sizes = [

        'xs' =>
            'px-2.5 py-1.5 text-xs',

        'sm' =>
            'px-3 py-2 text-sm',

        'md' =>
            'px-4 py-2.5 text-sm',

        'lg' =>
            'px-5 py-3 text-base',

    ];


    $classes = trim(

        'inline-flex items-center justify-center gap-2 rounded-xl font-medium transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:pointer-events-none disabled:opacity-50'

        . ' '

        . ($variants[$variant] ?? $variants['primary'])

        . ' '

        . ($sizes[$size] ?? $sizes['md'])

    );

@endphp



@if ($href)

    <a
        href="{{ $href }}"
        {{ $attributes->merge([
            'class' => $classes,
        ]) }}>

        {{ $slot }}

    </a>

@else

    <button
        type="{{ $type }}"
        {{ $attributes->merge([
            'class' => $classes,
        ]) }}>

        {{ $slot }}

    </button>

@endif

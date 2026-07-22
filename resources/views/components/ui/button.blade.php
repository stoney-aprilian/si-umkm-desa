@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'type' => 'button',
])

@php
    $variants = [
        'primary' => 'btn-primary',
        'secondary' => 'btn-secondary',
        'danger' => 'btn-danger',

        'outline' =>
            'inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white text-slate-700 shadow-sm transition hover:bg-slate-50 hover:border-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2',

        'ghost' =>
            'inline-flex items-center justify-center rounded-xl bg-transparent text-slate-700 transition hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2',
    ];

    $sizes = [
        'xs' => 'px-2.5 py-1.5 text-xs',
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-2.5 text-sm',
        'lg' => 'px-5 py-3 text-base',
    ];

    $classes = trim(
        ($variants[$variant] ?? $variants['primary'])
        . ' '
        . ($sizes[$size] ?? $sizes['md'])
        . ' disabled:cursor-not-allowed disabled:opacity-50'
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

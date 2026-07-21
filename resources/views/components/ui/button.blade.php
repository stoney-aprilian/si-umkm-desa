@props([
    'variant' => 'primary',
    'href' => null,
    'type' => 'button',
])

@php
    $variants = [
        'primary' => 'btn-primary',
        'secondary' => 'btn-secondary',
        'danger' => 'btn-danger',
        'outline' => 'border border-slate-300 bg-white text-slate-700 hover:bg-slate-50',
        'ghost' => 'bg-transparent text-slate-700 hover:bg-slate-100',
    ];

    $classes = $variants[$variant] ?? $variants['primary'];
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

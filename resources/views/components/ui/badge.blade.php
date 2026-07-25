@props([
    'variant' => 'primary',
])


@php
    $variants = [

        'primary' =>
            'border border-emerald-200 bg-emerald-100 text-emerald-700',

        'success' =>
            'border border-emerald-200 bg-emerald-100 text-emerald-700',

        'secondary' =>
            'border border-slate-200 bg-slate-100 text-slate-700',

        'warning' =>
            'border border-amber-200 bg-amber-100 text-amber-700',

        'danger' =>
            'border border-red-200 bg-red-100 text-red-700',

        'info' =>
            'border border-sky-200 bg-sky-100 text-sky-700',

    ];
@endphp


<span
    role="status"

    {{ $attributes->merge([
        'class' =>
            'inline-flex items-center whitespace-nowrap rounded-full border px-3 py-1 text-xs font-semibold',
            $variants[$variant] ?? $variants['primary'],
    ]) }}>


    {{ $slot }}


</span>

@props([
    'variant' => 'primary',
])

@php
    $variants = [
        'primary'   => 'bg-emerald-100 text-emerald-700',
        'success'   => 'bg-emerald-100 text-emerald-700',
        'secondary' => 'bg-slate-100 text-slate-700',
        'warning'   => 'bg-amber-100 text-amber-700',
        'danger'    => 'bg-red-100 text-red-700',
        'info'       => 'bg-sky-100 text-sky-700',
    ];
@endphp

<span
    {{ $attributes->class([
        'inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold whitespace-nowrap',
        $variants[$variant] ?? $variants['primary'],
    ]) }}>

    {{ $slot }}

</span>

@props([
    'variant' => 'primary',
    'size' => 'md',
    'dot' => false,
])

@php

    $variants = [

        'primary' => 'border-emerald-200 bg-emerald-50 text-emerald-700',

        'secondary' => 'border-slate-200 bg-slate-100 text-slate-700',

        'success' => 'border-green-200 bg-green-50 text-green-700',

        'warning' => 'border-amber-200 bg-amber-50 text-amber-700',

        'danger' => 'border-red-200 bg-red-50 text-red-700',

        'info' => 'border-sky-200 bg-sky-50 text-sky-700',

    ];

    $sizes = [

        'sm' => 'px-2 py-0.5 text-[11px]',

        'md' => 'px-3 py-1 text-xs',

        'lg' => 'px-4 py-1.5 text-sm',

    ];

@endphp

<span
    role="status"

    {{ $attributes->merge([
        'class' => implode(' ', [

            'inline-flex',

            'items-center',

            'gap-1.5',

            'whitespace-nowrap',

            'rounded-full',

            'border',

            'font-semibold',

            $sizes[$size] ?? $sizes['md'],

            $variants[$variant] ?? $variants['primary'],

        ]),
    ]) }}>

    @if ($dot)

        <span
            class="h-1.5 w-1.5 rounded-full bg-current">

        </span>

    @endif

    {{ $slot }}

</span>

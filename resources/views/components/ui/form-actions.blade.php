@props([
    'align' => 'end',
    'border' => true,
    'background' => true,
    'padding' => true,
])

@php

    $justify = match ($align) {

        'start' => 'sm:justify-start',

        'center' => 'sm:justify-center',

        'between' => 'sm:justify-between',

        default => 'sm:justify-end',

    };

@endphp

<div
    {{ $attributes->merge([
        'class' => implode(' ', array_filter([

            'flex',

            'flex-col-reverse',

            'gap-3',

            'sm:flex-row',

            'sm:items-center',

            $justify,

            $border ? 'border-t border-slate-200' : '',

            $background ? 'bg-slate-50' : '',

            $padding ? 'px-6 py-5' : '',

        ])),
    ]) }}>

    {{ $slot }}

</div>

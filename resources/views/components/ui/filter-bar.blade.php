@props([
    'align' => 'between',
    'stack' => true,
])

@php

    $justify = match ($align) {

        'start' => 'lg:justify-start',

        'center' => 'lg:justify-center',

        'end' => 'lg:justify-end',

        default => 'lg:justify-between',

    };

@endphp

<div
    {{ $attributes->merge([
        'class' => implode(' ', array_filter([

            'flex',

            $stack
                ? 'flex-col lg:flex-row'
                : 'flex-row',

            'gap-4',

            'lg:items-end',

            $justify,

        ])),
    ]) }}>

    {{ $slot }}

</div>

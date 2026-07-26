@props([
    'align' => 'start',
    'direction' => 'row',

    'gap' => '3',
    'wrap' => true,

    'items' => 'center',
])

@php

    $justify = match ($align) {

        'center' => 'justify-center',

        'end' => 'justify-end',

        'between' => 'justify-between',

        default => 'justify-start',

    };

    $directionClass = match ($direction) {

        'column' => 'flex-col',

        'responsive' => 'flex-col sm:flex-row',

        default => 'flex-row',

    };

    $itemsClass = match ($items) {

        'start' => 'items-start',

        'end' => 'items-end',

        'stretch' => 'items-stretch',

        default => 'items-center',

    };

    $gapClass = match ($gap) {

        '1' => 'gap-1',

        '2' => 'gap-2',

        '4' => 'gap-4',

        '5' => 'gap-5',

        '6' => 'gap-6',

        default => 'gap-3',

    };

@endphp

<div
    {{ $attributes->merge([
        'class' => implode(' ', [

            'flex',

            $directionClass,

            $itemsClass,

            $justify,

            $gapClass,

            $wrap ? 'flex-wrap' : 'flex-nowrap',

        ]),
    ]) }}>

    {{ $slot }}

</div>

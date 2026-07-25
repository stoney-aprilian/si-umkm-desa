@props([
    'align' => 'start',
    'direction' => 'row',
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
        default => 'flex-row',
    };
@endphp


<div
    {{ $attributes->merge([
        'class' =>
            "flex {$directionClass} flex-wrap items-center gap-3 {$justify}",
    ]) }}>

    {{ $slot }}

</div>

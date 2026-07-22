@props([
    'align' => 'start',
])

@php
    $justify = match ($align) {
        'center' => 'justify-center',
        'end' => 'justify-end',
        'between' => 'justify-between',
        default => 'justify-start',
    };
@endphp

<div
    {{
        $attributes->merge([
            'class' => "flex flex-wrap items-center gap-3 {$justify}",
        ])
    }}>

    {{ $slot }}

</div>

@props([
    'name' => 'search',
    'value' => request('search'),
    'placeholder' => 'Cari...',
])

@php
    $searchIcon = <<<'HTML'
<svg xmlns="http://www.w3.org/2000/svg"
     class="h-5 w-5"
     fill="none"
     viewBox="0 0 24 24"
     stroke="currentColor"
     aria-hidden="true">
    <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0a7 7 0 0114 0z"/>
</svg>
HTML;
@endphp

<div
    role="search"
    aria-label="Pencarian"

    {{ $attributes->merge([
        'class' => 'flex-1',
    ]) }}>

    <x-ui.input
        type="search"
        :name="$name"
        :value="$value"
        :placeholder="$placeholder"
        :prefix="$searchIcon"
        autocomplete="off"
        spellcheck="false" />

</div>

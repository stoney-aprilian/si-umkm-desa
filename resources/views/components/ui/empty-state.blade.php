@props([
    'title' => 'Belum ada data',
    'description' => 'Data akan ditampilkan di sini ketika sudah tersedia.',
    'variant' => 'default',
])

@php

    $variants = [

        'default' => [
            'icon' => 'bg-slate-100 text-slate-400',
        ],

        'search' => [
            'icon' => 'bg-blue-50 text-blue-500',
        ],

        'warning' => [
            'icon' => 'bg-amber-50 text-amber-500',
        ],

        'error' => [
            'icon' => 'bg-red-50 text-red-500',
        ],

    ];

    $style = $variants[$variant] ?? $variants['default'];

@endphp

<div
    role="status"

    {{ $attributes->merge([
        'class' => 'flex flex-col items-center justify-center rounded-2xl px-8 py-12 text-center',
    ]) }}>

    <div
        class="flex h-20 w-20 items-center justify-center rounded-full {{ $style['icon'] }}">

        @isset($icon)

            {{ $icon }}

        @else

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-9 w-9"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M9.75 9.75h4.5m-4.5 3h4.5m-6.75 6h9A2.25 2.25 0 0018.75 16.5v-9A2.25 2.25 0 0016.5 5.25h-9A2.25 2.25 0 005.25 7.5v9A2.25 2.25 0 007.5 18.75z"/>

            </svg>

        @endisset

    </div>

    <h3
        class="mt-6 text-xl font-semibold tracking-tight text-slate-900">

        {{ $title }}

    </h3>

    <p
        class="mt-3 max-w-lg text-sm leading-6 text-slate-500">

        {{ $description }}

    </p>

    @if (trim($slot))

        <div
            class="mt-8 flex flex-wrap justify-center gap-3">

            {{ $slot }}

        </div>

    @endif

</div>

@props([
    'title',
    'description' => null,

    'href' => '#',

    'variant' => 'primary',

    'external' => false,
])

@php

$variants = [

    'primary' => [
        'icon' => 'bg-emerald-100 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white',
        'ring' => 'group-hover:border-emerald-200',
        'arrow' => 'text-emerald-600',
    ],

    'secondary' => [
        'icon' => 'bg-slate-100 text-slate-600 group-hover:bg-slate-800 group-hover:text-white',
        'ring' => 'group-hover:border-slate-300',
        'arrow' => 'text-slate-600',
    ],

    'warning' => [
        'icon' => 'bg-amber-100 text-amber-600 group-hover:bg-amber-500 group-hover:text-white',
        'ring' => 'group-hover:border-amber-200',
        'arrow' => 'text-amber-600',
    ],

    'danger' => [
        'icon' => 'bg-red-100 text-red-600 group-hover:bg-red-600 group-hover:text-white',
        'ring' => 'group-hover:border-red-200',
        'arrow' => 'text-red-600',
    ],

];

$style = $variants[$variant] ?? $variants['primary'];

@endphp

<a
    href="{{ $href }}"
    @if($external)
        target="_blank"
        rel="noopener noreferrer"
    @endif

    {{ $attributes->merge([
        'class' =>
            "group block rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg {$style['ring']}",
    ]) }}>

    <div class="flex items-start justify-between gap-5">

        <div class="min-w-0 flex-1">

            <div
                class="flex h-14 w-14 items-center justify-center rounded-2xl transition-all duration-300 {{ $style['icon'] }}">

                @isset($icon)

                    {{ $icon }}

                @else

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4"/>

                    </svg>

                @endisset

            </div>

            <h3
                class="mt-5 text-lg font-bold tracking-tight text-slate-900">

                {{ $title }}

            </h3>

            @if($description)

                <p
                    class="mt-2 text-sm leading-6 text-slate-500">

                    {{ $description }}

                </p>

            @endif

        </div>

        <div
            class="mt-1 transition-all duration-300 group-hover:translate-x-1 {{ $style['arrow'] }}">

            <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"/>

            </svg>

        </div>

    </div>

</a>    

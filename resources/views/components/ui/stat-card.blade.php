@props([
    'title',
    'value',

    'description' => null,

    'variant' => 'emerald',

    'trend' => null,
])

@php

    $variants = [

        'emerald' => [
            'icon' => 'bg-emerald-50 text-emerald-600',
            'trend' => 'text-emerald-600',
        ],

        'blue' => [
            'icon' => 'bg-blue-50 text-blue-600',
            'trend' => 'text-blue-600',
        ],

        'amber' => [
            'icon' => 'bg-amber-50 text-amber-600',
            'trend' => 'text-amber-600',
        ],

        'red' => [
            'icon' => 'bg-red-50 text-red-600',
            'trend' => 'text-red-600',
        ],

        'slate' => [
            'icon' => 'bg-slate-100 text-slate-600',
            'trend' => 'text-slate-600',
        ],

    ];

    $style = $variants[$variant] ?? $variants['emerald'];

@endphp

<div
    {{ $attributes->merge([
        'class' => 'group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:shadow-lg',
    ]) }}>

    <div class="flex items-start justify-between gap-5">

        <div class="min-w-0 flex-1">

            <p class="text-sm font-medium text-slate-500">

                {{ $title }}

            </p>

            <p class="mt-2 text-3xl font-bold tracking-tight tabular-nums text-slate-900">

                {{ $value }}

            </p>

            @if ($description)

                <p class="mt-2 text-sm leading-6 text-slate-500">

                    {{ $description }}

                </p>

            @endif

            @if ($trend)

                <div class="mt-3 flex items-center gap-2">

                    <span class="text-sm font-semibold {{ $style['trend'] }}">

                        {{ $trend }}

                    </span>

                </div>

            @endif

        </div>

        @isset($icon)

            <div
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl {{ $style['icon'] }}">

                {{ $icon }}

            </div>

        @endisset

    </div>

    @if (trim($slot))

        <div class="mt-5 border-t border-slate-100 pt-4">

            {{ $slot }}

        </div>

    @endif

</div>

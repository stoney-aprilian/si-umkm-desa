@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'href' => null,

    'block' => false,
    'loading' => false,
    'disabled' => false,

    'target' => null,
    'rel' => null,
])

@php

    $disabled = $disabled || $loading;

    $variants = [
        'primary' => 'bg-emerald-600 text-white
        shadow-md shadow-emerald-600/20
        hover:bg-emerald-700
        hover:shadow-lg hover:shadow-emerald-600/25
        hover:-translate-y-0.5
        active:translate-y-0
        focus:ring-emerald-500',

        'secondary' => 'border border-slate-200
        bg-slate-50
        text-slate-700
        shadow-sm
        hover:bg-white
        hover:border-slate-300
        hover:shadow-md
        hover:-translate-y-0.5
        active:translate-y-0
        focus:ring-slate-400',

        'danger' => 'bg-rose-600 text-white
        shadow-md shadow-rose-600/20
        hover:bg-rose-700
        hover:shadow-lg hover:shadow-rose-600/25
        hover:-translate-y-0.5
        active:translate-y-0
        focus:ring-rose-500',

        'outline' => 'border border-emerald-300
        bg-white
        text-emerald-700
        hover:bg-emerald-50
        hover:border-emerald-400
        hover:-translate-y-0.5
        active:translate-y-0
        focus:ring-emerald-500',

        'ghost' => 'bg-transparent
        text-slate-700
        hover:bg-slate-100
        hover:text-slate-900
        focus:ring-slate-400',
    ];

    $sizes = [
        'xs' => 'h-8 px-3 text-xs',

        'sm' => 'h-10 px-4 text-sm',

        'md' => 'h-11 px-6 text-sm',

        'lg' => 'h-12 px-7 text-base',

        'xl' => 'h-14 px-8 text-base',
    ];

    $classes = collect([
        'inline-flex items-center justify-center gap-2',

        'rounded-2xl',

        'font-semibold',

        'whitespace-nowrap',

        'transition-all duration-300 ease-out',

        'focus:outline-none',

        'focus:ring-2',

        'focus:ring-offset-2',

        'select-none',

        'disabled:pointer-events-none',

        'disabled:opacity-60',

        'disabled:grayscale',

        $block ? 'w-full' : '',

        $variants[$variant] ?? $variants['primary'],

        $sizes[$size] ?? $sizes['md'],
    ])
        ->filter()
        ->implode(' ');

@endphp


@if ($href)

    <a href="{{ $disabled ? '#' : $href }}" target="{{ $target }}"
        rel="{{ $rel ?? ($target === '_blank' ? 'noopener noreferrer' : null) }}"
        aria-disabled="{{ $disabled ? 'true' : 'false' }}" @if ($disabled) tabindex="-1" @endif
        {{ $attributes->merge([
            'class' => $classes,
        ]) }}>

        @if ($loading)
            <svg class="h-4 w-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">

                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />

                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />

            </svg>
        @endif

        {{ $slot }}

    </a>
@else
    <button type="{{ $type }}" @disabled($disabled)
        {{ $attributes->merge([
            'class' => $classes,
        ]) }}>

        @if ($loading)
            <svg class="h-4 w-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">

                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                    stroke-width="4" />

                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />

            </svg>
        @endif

        {{ $slot }}

    </button>

@endif

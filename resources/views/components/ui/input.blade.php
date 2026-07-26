@props([
    'type' => 'text',

    'invalid' => false,
    'readonly' => false,

    'prefix' => null,
    'suffix' => null,
])

@php

    $hasPrefix = filled($prefix);

    $hasSuffix = filled($suffix);

    $classes = collect([

        'block',

        'w-full',

        'h-11',

        'rounded-xl',

        'border',

        'bg-white',

        'px-4',

        'text-sm',

        'text-slate-900',

        'placeholder:text-slate-400',

        'shadow-sm',

        'transition-all',

        'duration-200',

        'focus:outline-none',

        'focus:ring-2',

        'focus:ring-emerald-500/20',

        'focus:border-emerald-500',

        'disabled:cursor-not-allowed',

        'disabled:bg-slate-100',

        'disabled:text-slate-500',

        'read-only:bg-slate-50',

        'read-only:text-slate-600',

        $invalid
            ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20'
            : 'border-slate-300',

        $hasPrefix ? 'pl-11' : '',

        $hasSuffix ? 'pr-11' : '',

    ])->filter()->implode(' ');

@endphp

@if ($hasPrefix || $hasSuffix)

    <div class="relative">

        @if ($hasPrefix)

            <div
                class="pointer-events-none absolute inset-y-0 left-0 flex w-11 items-center justify-center text-slate-400">

                {!! $prefix !!}

            </div>

        @endif

        <input
            type="{{ $type }}"
            @readonly($readonly)

            {{ $attributes->merge([
                'class' => $classes,
            ]) }}>

        @if ($hasSuffix)

            <div
                class="absolute inset-y-0 right-0 flex w-11 items-center justify-center text-slate-400">

                {!! $suffix !!}

            </div>

        @endif

    </div>

@else

    <input
        type="{{ $type }}"
        @readonly($readonly)

        {{ $attributes->merge([
            'class' => $classes,
        ]) }}>

@endif

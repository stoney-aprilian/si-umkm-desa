@props([
    'rows' => 4,

    'invalid' => false,
    'readonly' => false,
])

@php

    $classes = collect([

        'block',

        'w-full',

        'min-h-[7rem]',

        'rounded-xl',

        'border',

        'bg-white',

        'px-4',

        'py-3',

        'text-sm',

        'text-slate-900',

        'leading-6',

        'placeholder:text-slate-400',

        'shadow-sm',

        'transition-all',

        'duration-200',

        'resize-y',

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

    ])->filter()->implode(' ');

@endphp

<textarea
    rows="{{ $rows }}"
    @readonly($readonly)

    {{ $attributes->merge([
        'class' => $classes,
    ]) }}
>{{ $slot }}</textarea>

@props([
    'invalid' => false,
])

@php

    $classes = collect([

        'block',

        'w-full',

        'h-11',

        'rounded-xl',

        'border',

        'bg-white',

        'px-4',

        'pr-10',

        'text-sm',

        'text-slate-900',

        'shadow-sm',

        'transition-all',

        'duration-200',

        'appearance-none',

        'focus:outline-none',

        'focus:ring-2',

        'focus:ring-emerald-500/20',

        'focus:border-emerald-500',

        'disabled:cursor-not-allowed',

        'disabled:bg-slate-100',

        'disabled:text-slate-500',

        $invalid
            ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20'
            : 'border-slate-300',

    ])->filter()->implode(' ');

@endphp

<div class="relative">

    <select
        {{ $attributes->merge([
            'class' => $classes,
        ]) }}>

        {{ $slot }}

    </select>

    <div
        class="pointer-events-none absolute inset-y-0 right-0 flex w-10 items-center justify-center text-slate-400">

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            aria-hidden="true">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"/>

        </svg>

    </div>

</div>

@props([
    'href',
    'active' => false,

    'icon' => null,

    'badge' => null,

    'disabled' => false,
])

@php

    $baseClasses = implode(' ', [

        'group',

        'relative',

        'flex',

        'items-center',

        'justify-between',

        'gap-3',

        'rounded-2xl',

        'px-4',

        'py-3',

        'text-sm',

        'font-medium',

        'transition-all',

        'duration-200',

    ]);

    $stateClasses = $disabled

        ? 'cursor-not-allowed opacity-50'

        : ($active

            ? 'bg-emerald-50 text-emerald-700 shadow-sm ring-1 ring-emerald-100'

            : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900');

@endphp

<a
    href="{{ $disabled ? '#' : $href }}"

    @if($disabled)
        aria-disabled="true"
    @endif

    {{ $attributes->merge([
        'class' => "{$baseClasses} {$stateClasses}",
    ]) }}>

    {{-- Active Indicator --}}
    @if($active)

        <span
            class="absolute left-0 top-1/2 h-8 w-1 -translate-y-1/2 rounded-r-full bg-emerald-600">

        </span>

    @endif

    <div class="flex min-w-0 items-center gap-3">

        {{-- Icon --}}
        @if($icon)

            <div
                class="flex h-10 w-10 items-center justify-center rounded-xl transition-all duration-200

                {{ $active
                    ? 'bg-emerald-100 text-emerald-600'
                    : 'bg-slate-100 text-slate-500 group-hover:bg-emerald-50 group-hover:text-emerald-600'
                }}">

                {{ $icon }}

            </div>

        @endif

        {{-- Label --}}
        <span
            class="truncate">

            {{ $slot }}

        </span>

    </div>

    {{-- Badge --}}
    @if($badge)

        <x-ui.badge
            size="sm"
            variant="{{ $active ? 'primary' : 'secondary' }}">

            {{ $badge }}

        </x-ui.badge>

    @endif

</a>

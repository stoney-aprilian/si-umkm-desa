@props([
    'active' => false,
])

@php
    $classes = $active
        ? 'block w-full rounded-xl bg-emerald-50 px-4 py-2 text-left text-sm font-medium text-emerald-700 transition-colors duration-200'
        : 'block w-full rounded-xl px-4 py-2 text-left text-sm font-medium text-slate-600 transition-colors duration-200 hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2';
@endphp

<a
    {{
        $attributes->class([
            $classes,
        ])
    }}>
    {{ $slot }}
</a>

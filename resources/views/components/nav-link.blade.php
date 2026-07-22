@props([
    'active' => false,
])

@php
    $classes = $active
        ? 'inline-flex items-center rounded-xl bg-emerald-50 px-4 py-2 text-sm font-medium text-emerald-700 transition-colors duration-200'
        : 'inline-flex items-center rounded-xl px-4 py-2 text-sm font-medium text-slate-600 transition-colors duration-200 hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2';
@endphp

<a
    {{
        $attributes->class([
            $classes,
        ])
    }}>
    {{ $slot }}
</a>

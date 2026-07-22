<a
    {{
        $attributes->class([
            'block w-full rounded-xl px-4 py-2.5 text-left text-sm font-medium text-slate-700 transition-colors duration-200 hover:bg-emerald-50 hover:text-emerald-700 focus:bg-emerald-50 focus:text-emerald-700 focus:outline-none',
        ])
    }}>
    {{ $slot }}
</a>

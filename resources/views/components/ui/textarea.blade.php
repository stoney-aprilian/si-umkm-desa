@props([
    'rows' => 4,
])


<textarea
    rows="{{ $rows }}"
    {{ $attributes->merge([
        'class' =>
            'block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 shadow-sm transition resize-y
            focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20
            disabled:cursor-not-allowed disabled:bg-slate-100 disabled:text-slate-500'
    ]) }}
>{{ $slot }}</textarea>

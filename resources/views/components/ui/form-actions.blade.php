<div
    {{ $attributes->merge([
        'class' =>
            'flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 sm:flex-row sm:items-center sm:justify-end'
    ]) }}>

    {{ $slot }}

</div>

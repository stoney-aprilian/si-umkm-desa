@props([
    'name',
    'label' => null,
    'checked' => false,
    'value' => 1,
])

<label
    class="inline-flex cursor-pointer items-center gap-3 text-sm transition">

    <input
        type="checkbox"
        name="{{ $name }}"
        value="{{ $value }}"
        @checked(old($name, $checked))
        {{
            $attributes->class([
                'h-4 w-4 rounded border-slate-300 text-emerald-600 shadow-sm transition focus:ring-2 focus:ring-emerald-500 focus:ring-offset-0 disabled:cursor-not-allowed disabled:opacity-50',
            ])
        }}>

    @if ($label)

        <span class="select-none text-slate-700">

            {{ $label }}

        </span>

    @else

        <span class="select-none text-slate-700">

            {{ $slot }}

        </span>

    @endif

</label>

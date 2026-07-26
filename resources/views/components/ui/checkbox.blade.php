@props([
    'name',

    'label' => null,
    'description' => null,

    'checked' => false,
    'value' => 1,

    'invalid' => false,
])

<div {{ $attributes->except('class')->merge() }}>

    {{-- Always submit false when unchecked --}}
    <input
        type="hidden"
        name="{{ $name }}"
        value="0">

    <label
        class="flex cursor-pointer items-start gap-3 rounded-lg transition hover:bg-slate-50">

        <input
            type="checkbox"
            name="{{ $name }}"
            value="{{ $value }}"
            @checked(old($name, $checked))

            @class([
                'mt-0.5 h-5 w-5 rounded border shadow-sm transition',
                'border-slate-300 text-emerald-600 focus:ring-2 focus:ring-emerald-500 focus:ring-offset-0' => !$invalid,
                'border-red-500 text-red-600 focus:ring-2 focus:ring-red-500 focus:ring-offset-0' => $invalid,
                'disabled:cursor-not-allowed disabled:opacity-50',
            ])>

        <div class="min-w-0">

            @if ($label)

                <p class="font-medium text-slate-700">

                    {{ $label }}

                </p>

            @elseif (trim($slot))

                <p class="font-medium text-slate-700">

                    {{ $slot }}

                </p>

            @endif

            @if ($description)

                <p class="mt-1 text-sm leading-5 text-slate-500">

                    {{ $description }}

                </p>

            @endif

        </div>

    </label>

</div>

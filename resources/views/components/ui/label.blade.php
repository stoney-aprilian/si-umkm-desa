@props([
    'for' => null,
    'required' => false,
    'optional' => false,
    'description' => null,
])

<label
    @if ($for)
        for="{{ $for }}"
    @endif

    {{ $attributes->merge([
        'class' => 'block',
    ]) }}>

    <div class="flex items-center gap-2">

        <span class="text-sm font-medium leading-6 tracking-normal text-slate-700">

            {{ $slot }}

        </span>

        @if ($required)

            <span
                class="text-red-600"
                aria-hidden="true">

                *

            </span>

            <span class="sr-only">

                wajib diisi

            </span>

        @elseif ($optional)

            <span
                class="text-xs font-medium text-slate-400">

                (Opsional)

            </span>

        @endif

    </div>

    @if ($description)

        <p class="mt-1 text-sm leading-5 text-slate-500">

            {{ $description }}

        </p>

    @endif

</label>

@props([
    'for' => null,
    'required' => false,
])


<label
    @if ($for)
        for="{{ $for }}"
    @endif

    {{ $attributes->merge([
        'class' => 'mb-2 block text-sm font-medium text-slate-700',
    ]) }}>


    {{ $slot }}



    @if ($required)

        <span
            class="ml-1 text-red-500"
            aria-hidden="true">

            *

        </span>


        <span class="sr-only">
            wajib diisi
        </span>

    @endif


</label>

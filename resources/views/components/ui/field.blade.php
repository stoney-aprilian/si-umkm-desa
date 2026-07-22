@props([
    'name' => null,
    'helper' => null,
])

<div
    {{ $attributes->merge([
        'class' => 'space-y-2.5',
    ]) }}>

    {{ $slot }}

    @error($name)

        <p
            class="flex items-center gap-1 text-sm font-medium text-red-600">

            {{ $message }}

        </p>

    @else

        @if ($helper)

            <p class="text-sm leading-6 text-slate-500">

                {{ $helper }}

            </p>

        @endif

    @enderror

</div>

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
            role="alert"
            class="flex items-center gap-1 text-sm font-medium text-red-600">

            <svg
                class="h-4 w-4 shrink-0"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 9v3m0 4h.01M10.29 3.86l-8.82 15A2 2 0 003.18 22h17.64a2 2 0 001.71-3.14l-8.82-15a2 2 0 00-3.42 0z"/>

            </svg>

            {{ $message }}

        </p>

    @enderror



    @if ($helper)

        <p class="text-sm leading-6 text-slate-500">

            {{ $helper }}

        </p>

    @endif


</div>

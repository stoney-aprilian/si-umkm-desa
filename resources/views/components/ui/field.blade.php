@props([
    'name' => null,

    'label' => null,
    'description' => null,

    'helper' => null,

    'required' => false,
    'optional' => false,
])

<div
    {{ $attributes->merge([
        'class' => 'space-y-2',
    ]) }}>

    @if ($label)

        <x-ui.label
            :for="$name"
            :required="$required"
            :optional="$optional"
            :description="$description">

            {{ $label }}

        </x-ui.label>

    @endif

    {{ $slot }}

    @error($name)

        <div
            role="alert"
            class="flex items-start gap-2 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="mt-0.5 h-4 w-4 shrink-0"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 9v3m0 4h.01M10.29 3.86l-8.82 15A2 2 0 003.18 22h17.64a2 2 0 001.71-3.14l-8.82-15a2 2 0 00-3.42 0z" />

            </svg>

            <span>{{ $message }}</span>

        </div>

    @enderror

    @if ($helper)

        <p class="text-sm leading-6 text-slate-500">

            {{ $helper }}

        </p>

    @endif

</div>

@props([
    'name' => null,
    'helper' => null,
])

<div {{ $attributes->merge(['class' => 'space-y-2']) }}>

    {{ $slot }}

    @if ($helper)
        <p class="text-sm text-slate-500">
            {{ $helper }}
        </p>
    @endif

    @if ($name)
        @error($name)
            <p class="text-sm font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror
    @endif

</div>

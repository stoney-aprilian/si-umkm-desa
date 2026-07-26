@props([
    'stack' => true,
])

<div
    {{ $attributes->merge([
        'class' => 'rounded-2xl border border-slate-200 bg-white p-4 shadow-sm',
    ]) }}>

    <div
        class="{{ $stack ? 'flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between' : 'flex items-center justify-between gap-4' }}">

        <div
            class="flex min-w-0 flex-1 flex-col gap-4 sm:flex-row sm:items-center">

            @isset($start)

                {{ $start }}

            @else

                {{ $slot }}

            @endisset

        </div>

        @isset($end)

            <div
                class="flex flex-wrap items-center justify-end gap-3">

                {{ $end }}

            </div>

        @endisset

    </div>

</div>

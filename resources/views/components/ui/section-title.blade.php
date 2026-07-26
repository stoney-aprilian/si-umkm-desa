@props([
    'title',
    'subtitle' => null,

    'eyebrow' => null,
])

<div
    {{ $attributes->merge([
        'class' => 'flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between',
    ]) }}>

    <div class="min-w-0">

        @if ($eyebrow)

            <p
                class="mb-2 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-600">

                {{ $eyebrow }}

            </p>

        @endif

        <h2
            class="text-2xl font-bold tracking-tight text-slate-900">

            {{ $title }}

        </h2>

        @if ($subtitle)

            <p
                class="mt-2 max-w-3xl text-sm leading-6 text-slate-500">

                {{ $subtitle }}

            </p>

        @endif

    </div>

    @if (trim($slot))

        <div
            class="flex w-full flex-col gap-3 sm:w-auto sm:flex-row sm:justify-end">

            {{ $slot }}

        </div>

    @endif

</div>

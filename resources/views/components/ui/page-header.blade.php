@props([
    'title',
    'subtitle' => null,
])

<div
    {{
        $attributes->class([
            'flex flex-col gap-4 md:flex-row md:items-center md:justify-between',
        ])
    }}>

    <div>

        <h1 class="text-3xl font-bold tracking-tight text-slate-900">

            {{ $title }}

        </h1>

        @if ($subtitle)

            <p class="mt-2 text-sm leading-6 text-slate-500">

                {{ $subtitle }}

            </p>

        @endif

    </div>

    @if (trim($slot))

        <x-ui.action-group align="end">

            {{ $slot }}

        </x-ui.action-group>

    @endif

</div>

@props([
    'title',
    'subtitle' => null,
])

<div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

    <div>

        <h2 class="text-3xl font-bold tracking-tight text-slate-900">

            {{ $title }}

        </h2>

        @if ($subtitle)

            <p class="mt-2 max-w-2xl text-base leading-7 text-slate-600">

                {{ $subtitle }}

            </p>

        @endif

    </div>

    @if (trim($slot))

        <div class="shrink-0">

            {{ $slot }}

        </div>

    @endif

</div>

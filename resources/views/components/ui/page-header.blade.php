@props([
    'title',
    'subtitle' => null,
])

<div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            {{ $title }}
        </h1>

        @if($subtitle)

            <p class="mt-2 text-slate-500">
                {{ $subtitle }}
            </p>

        @endif

    </div>

    @if(trim($slot))

        <div class="flex items-center gap-2">

            {{ $slot }}

        </div>

    @endif

</div>

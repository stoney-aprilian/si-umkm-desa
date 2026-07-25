@props([
    'title',
    'subtitle' => null,
])


<div
    {{ $attributes->merge([
        'class' =>
            'flex flex-col gap-4 md:flex-row md:items-center md:justify-between',
    ]) }}>


    <div>

        <h1 class="text-2xl font-bold tracking-tight text-slate-900 md:text-3xl">

            {{ $title }}

        </h1>


        @if ($subtitle)

            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">

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

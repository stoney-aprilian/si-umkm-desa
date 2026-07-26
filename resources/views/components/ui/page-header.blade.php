@props([
    'title',
    'subtitle' => null,

    'divider' => false,
])

<div
    {{ $attributes->merge([
        'class' => 'space-y-6',
    ]) }}>

    @isset($breadcrumb)

        <div>

            {{ $breadcrumb }}

        </div>

    @endisset

    <div
        class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

        <div class="min-w-0 flex-1">

            <h1
                class="text-3xl font-bold tracking-tight text-slate-900">

                {{ $title }}

            </h1>

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

    @if ($divider)

        <div
            class="border-b border-slate-200">

        </div>

    @endif

</div>

@props([
    'title',
    'value',
    'description' => null,
])


<div
    {{ $attributes->merge([
        'class' =>
            'group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg',
    ]) }}>


    <div class="flex items-start justify-between gap-4">


        <div>

            <p class="text-sm font-medium text-slate-500">

                {{ $title }}

            </p>


            <p class="mt-2 text-3xl font-bold tracking-tight text-slate-900">

                {{ $value }}

            </p>



            @if ($description)

                <p class="mt-2 text-sm leading-5 text-slate-500">

                    {{ $description }}

                </p>

            @endif


        </div>



        @isset($icon)

            <div
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">

                {{ $icon }}

            </div>

        @endisset


    </div>



    @if (trim($slot))

        <div class="mt-4">

            {{ $slot }}

        </div>

    @endif


</div>

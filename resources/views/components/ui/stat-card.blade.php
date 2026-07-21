@props([
    'title',
    'value',
])

<div
    class="group app-card transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

    <div class="flex items-start justify-between gap-4">

        <div>

            <p class="text-sm font-medium text-slate-500">

                {{ $title }}

            </p>

            <h3 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">

                {{ $value }}

            </h3>

        </div>

        @isset($icon)

            <div
                class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">

                {{ $icon }}

            </div>

        @endisset

    </div>

    @if (trim($slot))

        <div class="mt-4 text-sm text-slate-500">

            {{ $slot }}

        </div>

    @endif

</div>

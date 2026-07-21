@props([
    'title' => 'Belum ada data',
    'description' => 'Data akan ditampilkan di sini ketika sudah tersedia.',
])

<div class="app-card py-12 text-center">

    <div
        class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-slate-100">

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-8 w-8 text-slate-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.8"
                d="M9.75 9.75h4.5m-4.5 3h4.5m-6.75 6h9A2.25 2.25 0 0018.75 16.5v-9A2.25 2.25 0 0016.5 5.25h-9A2.25 2.25 0 005.25 7.5v9A2.25 2.25 0 007.5 18.75z" />

        </svg>

    </div>

    <h3 class="mt-6 text-lg font-semibold text-slate-900">

        {{ $title }}

    </h3>

    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">

        {{ $description }}

    </p>

    @if (trim($slot))

        <div class="mt-6">

            {{ $slot }}

        </div>

    @endif

</div>

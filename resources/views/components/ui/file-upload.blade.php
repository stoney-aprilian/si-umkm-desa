@props([
    'id',
    'name',

    'label' => null,
    'description' => null,

    'preview' => null,

    'accept' => 'image/*',
])

<div class="space-y-3">

    @if ($label)

        <x-ui.label
            :for="$id"
            :description="$description">

            {{ $label }}

        </x-ui.label>

    @endif

    @if ($preview)

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50">

            <img
                src="{{ asset('storage/' . $preview) }}"
                alt="{{ $label ?? 'Preview gambar' }}"
                class="h-48 w-full object-cover"
                onerror="this.style.display='none'">

        </div>

    @endif

    <label
        for="{{ $id }}"
        class="group flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-8 text-center transition-all duration-200 hover:border-emerald-400 hover:bg-emerald-50">

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="mb-3 h-10 w-10 text-slate-400 transition group-hover:text-emerald-600"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            aria-hidden="true">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.8"
                d="M3 15.75V18a2.25 2.25 0 002.25 2.25h13.5A2.25 2.25 0 0021 18v-2.25M7.5 9L12 4.5M12 4.5L16.5 9M12 4.5V15"/>

        </svg>

        <p class="text-sm font-semibold text-slate-700">

            Klik untuk memilih gambar

        </p>

        <p class="mt-1 text-sm text-slate-500">

            atau seret gambar ke area ini

        </p>

        <p class="mt-3 text-xs text-slate-400">

            Format yang didukung:
            {{ strtoupper(str_replace(['image/', ','], ['', ' •'], $accept)) }}

        </p>

        <input
            id="{{ $id }}"
            name="{{ $name }}"
            type="file"
            accept="{{ $accept }}"
            class="sr-only">

    </label>

    @error($name)

        <div
            role="alert"
            class="flex items-start gap-2 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="mt-0.5 h-4 w-4 shrink-0"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 9v3m0 4h.01M10.29 3.86l-8.82 15A2 2 0 003.18 22h17.64a2 2 0 001.71-3.14l-8.82-15a2 2 0 00-3.42 0z"/>

            </svg>

            <span>

                {{ $message }}

            </span>

        </div>

    @enderror

</div>

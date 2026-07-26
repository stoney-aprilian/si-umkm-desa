{{-- ========================= --}}
{{-- Success --}}
{{-- ========================= --}}
@if (session('success'))

<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 5000)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    class="mb-8 flex items-start justify-between gap-5 rounded-2xl border border-emerald-200 bg-emerald-50 p-5 shadow-sm">

    <div class="flex items-start gap-4">

        <div
            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600">

            <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"/>

            </svg>

        </div>

        <div>

            <h3 class="font-semibold text-emerald-900">

                Berhasil

            </h3>

            <p class="mt-1 text-sm leading-6 text-emerald-700">

                {{ session('success') }}

            </p>

        </div>

    </div>

    <button
        type="button"
        @click="show=false"
        class="rounded-xl p-2 text-emerald-500 transition hover:bg-emerald-100 hover:text-emerald-700">

        <svg
            class="h-5 w-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"/>

        </svg>

    </button>

</div>

@endif

{{-- ========================= --}}
{{-- Error --}}
{{-- ========================= --}}
@if (session('error'))

<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 6000)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    class="mb-8 flex items-start justify-between gap-5 rounded-2xl border border-rose-200 bg-rose-50 p-5 shadow-sm">

    <div class="flex items-start gap-4">

        <div
            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-rose-100 text-rose-600">

            <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 9v2m0 4h.01M12 3C7.03 3 3 7.03 3 12s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9z"/>

            </svg>

        </div>

        <div>

            <h3 class="font-semibold text-rose-900">

                Terjadi Kesalahan

            </h3>

            <p class="mt-1 text-sm leading-6 text-rose-700">

                {{ session('error') }}

            </p>

        </div>

    </div>

    <button
        type="button"
        @click="show=false"
        class="rounded-xl p-2 text-rose-500 transition hover:bg-rose-100 hover:text-rose-700">

        <svg
            class="h-5 w-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"/>

        </svg>

    </button>

</div>

@endif

{{-- ========================= --}}
{{-- Validation --}}
{{-- ========================= --}}
@if ($errors->any())

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    class="mb-8 rounded-2xl border border-amber-200 bg-amber-50 p-5 shadow-sm">

    <div class="flex items-start justify-between gap-4">

        <div class="flex items-start gap-4">

            <div
                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-amber-100 text-amber-600">

                <svg
                    class="h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 9v2m0 4h.01M10.29 3.86l-7 12A2 2 0 005 19h14a2 2 0 001.71-3.14l-7-12a2 2 0 00-3.42 0z"/>

                </svg>

            </div>

            <div>

                <h3 class="font-semibold text-amber-900">

                    Periksa kembali data Anda

                </h3>

                <p class="mt-1 text-sm text-amber-700">

                    {{ $errors->count() }}
                    {{ Str::plural('kesalahan', $errors->count()) }}
                    ditemukan. Silakan perbaiki data berikut.

                </p>

            </div>

        </div>

        <button
            type="button"
            @click="show=false"
            class="rounded-xl p-2 text-amber-500 transition hover:bg-amber-100 hover:text-amber-700">

            <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"/>

            </svg>

        </button>

    </div>

    <ul class="mt-5 space-y-2">

        @foreach ($errors->all() as $error)

            <li class="flex items-start gap-3 text-sm text-amber-800">

                <span
                    class="mt-2 h-2 w-2 shrink-0 rounded-full bg-amber-500">

                </span>

                <span>

                    {{ $error }}

                </span>

            </li>

        @endforeach

    </ul>

</div>

@endif

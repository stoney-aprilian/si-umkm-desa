{{-- Success --}}
@if (session('success'))

<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 5000)"
    x-show="show"
    x-transition.opacity.duration.300ms
    class="mb-6 flex items-start justify-between rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 shadow-sm">

    <div class="flex items-start gap-4">

        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

            <svg class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"/>

            </svg>

        </div>

        <div>

            <h3 class="font-semibold text-emerald-900">

                Berhasil

            </h3>

            <p class="mt-1 text-sm text-emerald-700">

                {{ session('success') }}

            </p>

        </div>

    </div>

    <button
        type="button"
        @click="show = false"
        class="rounded-lg p-1 text-emerald-500 transition hover:bg-emerald-100 hover:text-emerald-700">

        <svg class="h-5 w-5"
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


{{-- Error --}}
@if (session('error'))

<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 6000)"
    x-show="show"
    x-transition.opacity.duration.300ms
    class="mb-6 flex items-start justify-between rounded-2xl border border-red-200 bg-red-50 px-5 py-4 shadow-sm">

    <div class="flex items-start gap-4">

        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-100 text-red-600">

            <svg class="h-5 w-5"
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

            <h3 class="font-semibold text-red-900">

                Terjadi Kesalahan

            </h3>

            <p class="mt-1 text-sm text-red-700">

                {{ session('error') }}

            </p>

        </div>

    </div>

    <button
        type="button"
        @click="show = false"
        class="rounded-lg p-1 text-red-500 transition hover:bg-red-100 hover:text-red-700">

        <svg class="h-5 w-5"
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


{{-- Validation Errors --}}
@if ($errors->any())

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition.opacity.duration.300ms
    class="mb-6 rounded-2xl border border-amber-200 bg-amber-50 px-5 py-4 shadow-sm">

    <div class="mb-4 flex items-start justify-between">

        <div class="flex items-start gap-4">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

                <svg class="h-5 w-5"
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

                    Terdapat beberapa data yang perlu diperbaiki.

                </p>

            </div>

        </div>

        <button
            type="button"
            @click="show = false"
            class="rounded-lg p-1 text-amber-500 transition hover:bg-amber-100 hover:text-amber-700">

            <svg class="h-5 w-5"
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

    <ul class="space-y-2 text-sm text-amber-800">

        @foreach($errors->all() as $error)

            <li class="flex items-start gap-2">

                <span class="mt-1 h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                <span>{{ $error }}</span>

            </li>

        @endforeach

    </ul>

</div>

@endif

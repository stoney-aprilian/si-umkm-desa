@if (session('success'))

    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition
        class="mb-6 flex items-start justify-between rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4">

        <div class="flex items-start gap-3">

            <div class="mt-0.5 text-lg">

                ✅

            </div>

            <div>

                <h3 class="font-semibold text-emerald-800">

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
            class="text-emerald-500 transition hover:text-emerald-700">

            ✕

        </button>

    </div>

@endif


@if (session('error'))

    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition
        class="mb-6 flex items-start justify-between rounded-2xl border border-red-200 bg-red-50 px-5 py-4">

        <div class="flex items-start gap-3">

            <div class="mt-0.5 text-lg">

                ❌

            </div>

            <div>

                <h3 class="font-semibold text-red-800">

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
            class="text-red-500 transition hover:text-red-700">

            ✕

        </button>

    </div>

@endif


@if ($errors->any())

    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition
        class="mb-6 rounded-2xl border border-amber-200 bg-amber-50 px-5 py-4">

        <div class="mb-3 flex items-center justify-between">

            <div class="flex items-center gap-3">

                <span class="text-lg">

                    ⚠️

                </span>

                <h3 class="font-semibold text-amber-800">

                    Periksa kembali data yang Anda masukkan

                </h3>

            </div>

            <button
                type="button"
                @click="show = false"
                class="text-amber-500 transition hover:text-amber-700">

                ✕

            </button>

        </div>

        <ul class="list-inside list-disc space-y-1 text-sm text-amber-700">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

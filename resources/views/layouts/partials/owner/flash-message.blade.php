@if (session('success'))
    <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-5 shadow-sm">

        <div class="flex items-start justify-between gap-4">

            <div class="flex gap-4">

                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />

                    </svg>

                </div>

                <div>

                    <h3 class="font-semibold text-emerald-800">

                        Berhasil

                    </h3>

                    <p class="mt-1 text-sm leading-6 text-emerald-700">

                        {{ session('success') }}

                    </p>

                </div>

            </div>





            <button type="button" onclick="this.closest('div.rounded-2xl').remove()"
                class="rounded-lg p-1 text-emerald-500 transition hover:bg-emerald-100 hover:text-emerald-700">

                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />

                </svg>

            </button>

        </div>

    </div>
@endif







@if (session('error'))
    <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 p-5 shadow-sm">

        <div class="flex items-start justify-between gap-4">

            <div class="flex gap-4">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-rose-100 text-rose-600">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M12 3C7.03 3 3 7.03 3 12s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9z" />

                    </svg>

                </div>

                <div>

                    <h3 class="font-semibold text-rose-800">

                        Terjadi Kesalahan

                    </h3>

                    <p class="mt-1 text-sm leading-6 text-rose-700">

                        {{ session('error') }}

                    </p>

                </div>

            </div>





            <button type="button" onclick="this.closest('div.rounded-2xl').remove()"
                class="rounded-lg p-1 text-rose-500 transition hover:bg-rose-100 hover:text-rose-700">

                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />

                </svg>

            </button>

        </div>

    </div>
@endif

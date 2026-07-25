@if (session('success'))

    <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4">

        <div class="flex items-start justify-between gap-4">

            <div>

                <h3 class="font-semibold text-emerald-800">

                    Berhasil

                </h3>

                <p class="mt-1 text-sm text-emerald-700">

                    {{ session('success') }}

                </p>

            </div>

            <button
                type="button"
                onclick="this.closest('div.rounded-xl').remove()"
                class="text-lg font-bold leading-none text-emerald-600 hover:text-emerald-800">

                &times;

            </button>

        </div>

    </div>

@endif

@if (session('error'))

    <div class="rounded-xl border border-red-200 bg-red-50 px-5 py-4">

        <div class="flex items-start justify-between gap-4">

            <div>

                <h3 class="font-semibold text-red-800">

                    Terjadi Kesalahan

                </h3>

                <p class="mt-1 text-sm text-red-700">

                    {{ session('error') }}

                </p>

            </div>

            <button
                type="button"
                onclick="this.closest('div.rounded-xl').remove()"
                class="text-lg font-bold leading-none text-red-600 hover:text-red-800">

                &times;

            </button>

        </div>

    </div>

@endif

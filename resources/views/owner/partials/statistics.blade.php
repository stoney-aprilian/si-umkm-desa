<div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

    {{-- ====================================================== --}}
    {{-- Total Produk --}}
    {{-- ====================================================== --}}
    <x-ui.card class="transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg">

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">

                    Total Produk

                </p>

                <h3 class="mt-3 text-3xl font-bold tracking-tight text-slate-900">

                    {{ number_format($stats['products']) }}

                </h3>

            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-slate-700">

                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7L12 3 4 7l8 4 8-4zm-8 6L4 9v8l8 4 8-4V9l-8 4z" />

                </svg>

            </div>

        </div>

    </x-ui.card>





    {{-- ====================================================== --}}
    {{-- Produk Aktif --}}
    {{-- ====================================================== --}}
    <x-ui.card class="transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg">

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">

                    Produk Dipublikasikan

                </p>

                <h3 class="mt-3 text-3xl font-bold tracking-tight text-emerald-600">

                    {{ number_format($stats['active_products']) }}

                </h3>

            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700">

                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />

                </svg>

            </div>

        </div>

    </x-ui.card>





    {{-- ====================================================== --}}
    {{-- Produk Nonaktif --}}
    {{-- ====================================================== --}}
    <x-ui.card class="transition duration-200 hover:-translate-y-1 hover:border-amber-200 hover:shadow-lg">

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">

                    Produk Nonaktif

                </p>

                <h3 class="mt-3 text-3xl font-bold tracking-tight text-amber-600">

                    {{ number_format($stats['inactive_products']) }}

                </h3>

            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-100 text-amber-700">

                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />

                </svg>

            </div>

        </div>

    </x-ui.card>

</div>

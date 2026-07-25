<div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

    <x-ui.card>

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">

                    Total Produk

                </p>

                <h3 class="mt-2 text-3xl font-bold text-slate-900">

                    {{ $stats['products'] }}

                </h3>

            </div>

            <div class="rounded-lg bg-emerald-100 p-3">

                📦

            </div>

        </div>

    </x-ui.card>

    <x-ui.card>

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">

                    Produk Aktif

                </p>

                <h3 class="mt-2 text-3xl font-bold text-emerald-600">

                    {{ $stats['active_products'] }}

                </h3>

            </div>

            <div class="rounded-lg bg-emerald-100 p-3">

                ✅

            </div>

        </div>

    </x-ui.card>

    <x-ui.card>

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">

                    Produk Nonaktif

                </p>

                <h3 class="mt-2 text-3xl font-bold text-amber-600">

                    {{ $stats['inactive_products'] }}

                </h3>

            </div>

            <div class="rounded-lg bg-amber-100 p-3">

                ⏸️

            </div>

        </div>

    </x-ui.card>

</div>

<x-ui.card>

    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-lg font-semibold text-slate-900">

                Produk Terbaru

            </h2>

            <p class="mt-2 text-sm text-slate-500">

                Lima produk terbaru milik UMKM Anda.

            </p>

        </div>

        @if ($recentProducts->isNotEmpty())

            <x-ui.button
                size="sm"
                variant="secondary"
                :href="route('owner.products.index')">

                Lihat Semua

            </x-ui.button>

        @endif

    </div>

    @if ($recentProducts->isEmpty())

        <div class="mt-8 rounded-lg border border-dashed border-slate-300 px-6 py-12 text-center">

            <p class="text-sm text-slate-500">

                Belum ada produk yang ditambahkan.

            </p>

            <div class="mt-4">

                <x-ui.button
                    :href="route('owner.products.create')">

                    Tambah Produk

                </x-ui.button>

            </div>

        </div>

    @else

        <div class="mt-6 overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-200">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">

                            Produk

                        </th>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">

                            Harga

                        </th>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">

                            Status

                        </th>

                        <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-500">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-200 bg-white">

                    @foreach ($recentProducts as $product)

                        <tr>

                            <td class="px-4 py-4">

                                <div class="flex items-center gap-4">

                                    @if ($product->image)

                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="h-12 w-12 rounded-lg object-cover">

                                    @else

                                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-slate-100 text-xs text-slate-400">

                                            —

                                        </div>

                                    @endif

                                    <div>

                                        <p class="font-medium text-slate-900">

                                            {{ $product->name }}

                                        </p>

                                    </div>

                                </div>

                            </td>

                            <td class="px-4 py-4 text-slate-700">

                                Rp {{ number_format($product->price, 0, ',', '.') }}

                            </td>

                            <td class="px-4 py-4">

                                @if ($product->is_active)

                                    <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">

                                        Aktif

                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-slate-200 px-3 py-1 text-xs font-semibold text-slate-700">

                                        Nonaktif

                                    </span>

                                @endif

                            </td>

                            <td class="px-4 py-4 text-right">

                                <x-ui.button
                                    size="sm"
                                    variant="secondary"
                                    :href="route('owner.products.edit', $product->slug)">

                                    Edit

                                </x-ui.button>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @endif

</x-ui.card>

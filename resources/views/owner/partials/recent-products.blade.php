<x-ui.card>

    {{-- ====================================================== --}}
    {{-- Header --}}
    {{-- ====================================================== --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

        <div>

            <h2 class="text-xl font-semibold tracking-tight text-slate-900">

                Produk Terbaru

            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500">

                Lima produk terbaru yang telah Anda tambahkan.

            </p>

        </div>

        @if ($recentProducts->isNotEmpty())
            <x-ui.button size="sm" variant="secondary" :href="route('owner.products.index')">

                Lihat Semua

            </x-ui.button>
        @endif

    </div>





    {{-- ====================================================== --}}
    {{-- Empty State --}}
    {{-- ====================================================== --}}
    @if ($recentProducts->isEmpty())

        <div class="mt-8 rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-6 py-12 text-center">

            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100">

                <svg class="h-7 w-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7L12 3 4 7l8 4 8-4zm-8 6L4 9v8l8 4 8-4V9l-8 4z" />

                </svg>

            </div>

            <h3 class="mt-5 text-lg font-semibold text-slate-900">

                Belum Ada Produk

            </h3>

            <p class="mt-2 text-sm leading-6 text-slate-500">

                Mulailah menambahkan produk agar dapat ditampilkan
                pada portal SI UMKM Desa.

            </p>

            <div class="mt-6">

                <x-ui.button :href="route('owner.products.create')">

                    Tambah Produk

                </x-ui.button>

            </div>

        </div>





        {{-- ====================================================== --}}
        {{-- Table --}}
        {{-- ====================================================== --}}
    @else
        <div class="mt-8 overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-200">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                            Produk

                        </th>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                            Harga

                        </th>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                            Status

                        </th>

                        <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">

                            Aksi

                        </th>

                    </tr>

                </thead>





                <tbody class="divide-y divide-slate-200 bg-white">

                    @foreach ($recentProducts as $product)
                        <tr class="transition hover:bg-slate-50">

                            {{-- Produk --}}
                            <td class="px-4 py-4">

                                <div class="flex items-center gap-4">

                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="h-14 w-14 rounded-xl border border-slate-200 object-cover">
                                    @else
                                        <div
                                            class="flex h-14 w-14 items-center justify-center rounded-xl border border-slate-200 bg-slate-100">

                                            <svg class="h-6 w-6 text-slate-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 7L12 3 4 7l8 4 8-4zm-8 6L4 9v8l8 4 8-4V9l-8 4z" />

                                            </svg>

                                        </div>
                                    @endif

                                    <div>

                                        <p class="font-semibold text-slate-900">

                                            {{ $product->name }}

                                        </p>

                                    </div>

                                </div>

                            </td>





                            {{-- Harga --}}
                            <td class="px-4 py-4 font-medium text-slate-700">

                                @if ($product->price)
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                @else
                                    -
                                @endif

                            </td>





                            {{-- Status --}}
                            <td class="px-4 py-4">

                                @if ($product->is_active)
                                    <span
                                        class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">

                                        Aktif

                                    </span>
                                @else
                                    <span
                                        class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">

                                        Nonaktif

                                    </span>
                                @endif

                            </td>





                            {{-- Action --}}
                            <td class="px-4 py-4 text-right">

                                <x-ui.button size="sm" variant="secondary" :href="route('owner.products.edit', $product->slug)">

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

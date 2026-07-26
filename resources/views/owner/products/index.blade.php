@extends('layouts.owner')

@section('title', 'Produk Saya')

@section('content')

    <div class="space-y-8">

        {{-- ====================================================== --}}
        {{-- Page Header --}}
        {{-- ====================================================== --}}
        <x-ui.page-header title="Produk Saya" subtitle="Kelola seluruh produk yang dimiliki oleh UMKM Anda.">

            <x-slot:actions>

                <x-ui.button :href="route('owner.products.create')">

                    Tambah Produk

                </x-ui.button>

            </x-slot:actions>

        </x-ui.page-header>





        {{-- ====================================================== --}}
        {{-- Product List --}}
        {{-- ====================================================== --}}
        <x-ui.card padding="false" class="overflow-hidden">

            {{-- Search --}}
            <div class="border-b border-slate-200 p-6">

                <form action="{{ route('owner.products.index') }}" method="GET">

                    <x-ui.input name="search" :value="$search" placeholder="Cari nama produk..." />

                </form>

            </div>





            {{-- Empty State --}}
            @if ($products->isEmpty())

                <div class="px-8 py-20">

                    <x-ui.empty-state title="Belum Ada Produk"
                        description="Tambahkan produk pertama agar dapat ditampilkan pada portal SI UMKM Desa.">

                        <x-slot:actions>

                            <x-ui.button :href="route('owner.products.create')">

                                Tambah Produk

                            </x-ui.button>

                        </x-slot:actions>

                    </x-ui.empty-state>

                </div>





                {{-- Table --}}
            @else
                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-slate-200">

                        <thead class="bg-slate-50">

                            <tr>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Produk

                                </th>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Harga

                                </th>

                                <th
                                    class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Status

                                </th>

                                <th
                                    class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Aksi

                                </th>

                            </tr>

                        </thead>





                        <tbody class="divide-y divide-slate-200 bg-white">

                            @foreach ($products as $product)
                                <tr class="transition hover:bg-slate-50">

                                    {{-- Produk --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-4">

                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}"
                                                    class="h-16 w-16 rounded-xl border border-slate-200 object-cover">
                                            @else
                                                <div
                                                    class="flex h-16 w-16 items-center justify-center rounded-xl border border-slate-200 bg-slate-100 text-slate-400">

                                                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M20 7L12 3 4 7l8 4 8-4zm-8 6L4 9v8l8 4 8-4V9l-8 4z" />

                                                    </svg>

                                                </div>
                                            @endif

                                            <div>

                                                <p class="font-semibold text-slate-900">

                                                    {{ $product->name }}

                                                </p>

                                                @if ($product->description)
                                                    <p class="mt-1 text-sm text-slate-500">

                                                        {{ \Illuminate\Support\Str::limit($product->description, 80) }}

                                                    </p>
                                                @endif

                                            </div>

                                        </div>

                                    </td>





                                    {{-- Harga --}}
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-slate-700">

                                        @if ($product->price)
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif

                                    </td>





                                    {{-- Status --}}
                                    <td class="px-6 py-4 text-center">

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





                                    {{-- Actions --}}
                                    <td class="px-6 py-4">

                                        <div class="flex justify-end gap-2">

                                            <x-ui.button size="sm" variant="secondary" :href="route('owner.products.edit', $product->slug)">

                                                Edit

                                            </x-ui.button>

                                            <form action="{{ route('owner.products.destroy', $product->slug) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <x-ui.button size="sm" type="submit" variant="danger">

                                                    Hapus

                                                </x-ui.button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>





                {{-- Pagination --}}
                @if ($products->hasPages())
                    <div class="border-t border-slate-200 px-6 py-4">

                        {{ $products->links() }}

                    </div>
                @endif

            @endif

        </x-ui.card>

    </div>

@endsection

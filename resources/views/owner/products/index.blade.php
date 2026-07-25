@extends('layouts.owner')

@section('title', 'Produk')

@section('content')

    <div class="space-y-6">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h1 class="text-2xl font-bold text-slate-800">

                    Produk

                </h1>

                <p class="mt-1 text-sm text-slate-500">

                    Kelola seluruh produk UMKM Anda.

                </p>

            </div>

            <x-ui.button
                :href="route('owner.products.create')">

                + Tambah Produk

            </x-ui.button>

        </div>

        <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 p-4">

                <form
                    method="GET"
                    action="{{ route('owner.products.index') }}">

                    <x-ui.input
                        name="search"
                        placeholder="Cari produk..."
                        :value="$search" />

                </form>

            </div>

            @if ($products->isEmpty())

                <div class="px-6 py-16 text-center">

                    <p class="text-lg font-medium text-slate-700">

                        Belum ada produk.

                    </p>

                    <p class="mt-2 text-sm text-slate-500">

                        Tambahkan produk pertama untuk UMKM Anda.

                    </p>

                </div>

            @else

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-slate-200">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    Produk
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    Harga
                                </th>

                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    Status
                                </th>

                                <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100 bg-white">

                            @foreach ($products as $product)

                                <tr class="hover:bg-slate-50">

                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-4">

                                            @if ($product->image)

                                                <img
                                                    src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}"
                                                    class="h-16 w-16 rounded-lg border object-cover">

                                            @else

                                                <div class="flex h-16 w-16 items-center justify-center rounded-lg border bg-slate-100 text-xs text-slate-400">

                                                    No Image

                                                </div>

                                            @endif

                                            <div>

                                                <p class="font-semibold text-slate-800">

                                                    {{ $product->name }}

                                                </p>

                                                @if ($product->description)

                                                    <p class="mt-1 text-sm text-slate-500">

                                                        {{ Str::limit($product->description, 80) }}

                                                    </p>

                                                @endif

                                            </div>

                                        </div>

                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">

                                        Rp {{ number_format($product->price, 0, ',', '.') }}

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        @if ($product->is_active)

                                            <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-medium text-emerald-700">

                                                Aktif

                                            </span>

                                        @else

                                            <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700">

                                                Nonaktif

                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-end gap-2">

                                            <x-ui.button
                                                :href="route('owner.products.edit', $product->slug)"
                                                color="warning">

                                                Edit

                                            </x-ui.button>

                                            <form
                                                action="{{ route('owner.products.destroy', $product->slug) }}"
                                                method="POST"
                                                onsubmit="return confirm('Hapus produk ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <x-ui.button
                                                    type="submit"
                                                    color="danger">

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

                <div class="border-t border-slate-200 px-6 py-4">

                    {{ $products->links() }}

                </div>

            @endif

        </div>

    </div>

@endsection

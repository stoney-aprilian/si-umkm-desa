@extends('layouts.admin')

@section('title', 'Data Produk')

@section('content')

<div class="space-y-6">

    <div class="flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Data Produk
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola seluruh produk UMKM.
            </p>
        </div>

        <a href="{{ route('admin.products.create') }}"
            class="px-5 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700">

            + Tambah Produk

        </a>

    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm">

        <div class="p-5 border-b">

            <form method="GET">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari produk..."
                    class="w-full rounded-lg border-slate-300">

            </form>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-5 py-3 text-left">No</th>
                        <th class="px-5 py-3 text-left">Produk</th>
                        <th class="px-5 py-3 text-left">UMKM</th>
                        <th class="px-5 py-3 text-right">Harga</th>
                        <th class="px-5 py-3 text-center">Unggulan</th>
                        <th class="px-5 py-3 text-center">Status</th>
                        <th class="px-5 py-3 text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($products as $product)

                    <tr class="border-t">

                        <td class="px-5 py-4">
                            {{ $loop->iteration + ($products->currentPage()-1) * $products->perPage() }}
                        </td>

                        <td class="px-5 py-4">
                            <div class="font-semibold">
                                {{ $product->name }}
                            </div>

                            <div class="text-sm text-slate-500">
                                {{ Str::limit($product->description,50) }}
                            </div>
                        </td>

                        <td class="px-5 py-4">
                            {{ $product->umkm->business_name ?? '-' }}
                        </td>

                        <td class="px-5 py-4 text-right">
                            Rp {{ number_format($product->price ?? 0,0,',','.') }}
                        </td>

                        <td class="px-5 py-4 text-center">

                            @if($product->is_featured)
                                ⭐
                            @else
                                -
                            @endif

                        </td>

                        <td class="px-5 py-4 text-center">

                            @if($product->is_active)

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                    Aktif
                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                    Nonaktif
                                </span>

                            @endif

                        </td>

                        <td class="px-5 py-4">

                            <div class="flex justify-center gap-4">

                                <a href="{{ route('admin.products.edit',$product) }}"
                                    class="text-blue-600 hover:underline">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('admin.products.destroy',$product) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="text-red-600 hover:underline">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center py-10 text-slate-500">

                            Belum ada produk.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        @if($products->hasPages())

            <div class="p-5 border-t">

                {{ $products->links() }}

            </div>

        @endif

    </div>

</div>

@endsection

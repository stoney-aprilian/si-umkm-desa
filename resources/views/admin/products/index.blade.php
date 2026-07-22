@extends('layouts.admin')

@section('title', 'Manajemen Produk')

@section('content')

<div class="space-y-8">

    {{-- Page Header --}}
    <x-ui.page-header
        title="Manajemen Produk"
        subtitle="Kelola seluruh produk UMKM yang ditampilkan pada website.">

        <x-ui.button
            href="{{ route('admin.products.create') }}">

            + Tambah Produk

        </x-ui.button>

    </x-ui.page-header>

    {{-- Summary --}}
    <div class="grid gap-4 md:grid-cols-3">

        <x-ui.card>

            <p class="text-sm text-gray-500">
                Total Produk
            </p>

            <h2 class="mt-2 text-3xl font-bold text-gray-900">
                {{ $products->total() }}
            </h2>

        </x-ui.card>

        <x-ui.card>

            <p class="text-sm text-gray-500">
                Produk Ditampilkan
            </p>

            <h2 class="mt-2 text-3xl font-bold text-green-600">
                {{ $products->where('is_active', true)->count() }}
            </h2>

        </x-ui.card>

        <x-ui.card>

            <p class="text-sm text-gray-500">
                Produk Unggulan
            </p>

            <h2 class="mt-2 text-3xl font-bold text-amber-500">
                {{ $products->where('is_featured', true)->count() }}
            </h2>

        </x-ui.card>

    </div>

    {{-- Search --}}
    <x-ui.card>

        <x-ui.filter-bar
            :action="route('admin.products.index')">

            <x-ui.search-bar
                name="search"
                :value="request('search')"
                placeholder="Cari nama produk..." />

            <x-ui.button
                type="submit">

                Cari

            </x-ui.button>

            @if(request()->filled('search'))

                <x-ui.button
                    variant="secondary"
                    :href="route('admin.products.index')">

                    Reset

                </x-ui.button>

            @endif

        </x-ui.filter-bar>

    </x-ui.card>

    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert-success">

            {{ session('success') }}

        </div>

    @endif

    {{-- Table --}}
    <x-ui.card class="overflow-hidden">

        <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">

            <div>

                <h2 class="text-lg font-semibold text-gray-900">

                    Daftar Produk

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Menampilkan
                    <span class="font-medium">{{ $products->count() }}</span>
                    dari
                    <span class="font-medium">{{ $products->total() }}</span>
                    produk.

                </p>

            </div>

        </div>

        <div class="table-wrapper">

            <table class="table-app">

                <thead>

                    <tr>

                        <th class="w-16">
                            No
                        </th>

                        <th>
                            Produk
                        </th>

                        <th>
                            UMKM
                        </th>

                        <th class="text-right w-40">
                            Harga
                        </th>

                        <th class="text-center w-36">
                            Unggulan
                        </th>

                        <th class="text-center w-36">
                            Status
                        </th>

                        <th class="text-center w-44">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($products as $product)

                        <tr>

                            <td>

                                {{
                                    ($products->currentPage() - 1) * $products->perPage()
                                    + $loop->iteration
                                }}

                            </td>

                            <td>

                                <div class="font-semibold text-gray-900">

                                    {{ $product->name }}

                                </div>

                                <div class="mt-1 text-xs text-gray-500">

                                    {{ Str::limit($product->description, 60) }}

                                </div>

                            </td>

                            <td>

                                {{ $product->umkm->business_name ?? '-' }}

                            </td>

                            <td class="text-right font-medium">

                                Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}

                            </td>

                            <td class="text-center">

                                @if($product->is_featured)

                                    <x-ui.badge variant="warning">

                                        Unggulan

                                    </x-ui.badge>

                                @else

                                    <span class="text-gray-400">-</span>

                                @endif

                            </td>

                            <td class="text-center">

                                <x-ui.badge
                                    :variant="$product->is_active ? 'success' : 'danger'">

                                    {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}

                                </x-ui.badge>

                            </td>

                            <td>

                                <x-ui.action-group>

                                    <x-ui.button
                                        variant="secondary"
                                        :href="route('admin.products.edit', $product)">

                                        Edit

                                    </x-ui.button>

                                    <form
                                        action="{{ route('admin.products.destroy', $product) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <x-ui.button
                                            type="submit"
                                            variant="danger">

                                            Hapus

                                        </x-ui.button>

                                    </form>

                                </x-ui.action-group>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="py-14">

                                <x-ui.empty-state
                                    title="Belum Ada Produk"
                                    description="Tambahkan produk pertama agar katalog UMKM mulai terisi." />

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </x-ui.card>

    {{-- Pagination --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

        <p class="text-sm text-gray-500">

            Halaman {{ $products->currentPage() }}
            dari {{ $products->lastPage() }}

        </p>

        {{ $products->links() }}

    </div>

</div>

@endsection

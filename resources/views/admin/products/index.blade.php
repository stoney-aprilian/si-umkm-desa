@extends('layouts.admin')

@section('title', 'Manajemen Produk')


@section('content')

    <div class="space-y-8">

        {{-- ====================================================== --}}
        {{-- Header --}}
        {{-- ====================================================== --}}
        <x-ui.page-header title="Manajemen Produk"
            subtitle="Kelola seluruh produk UMKM yang dipublikasikan pada Sistem Informasi UMKM Desa.">

            <x-ui.button href="{{ route('admin.products.create') }}">

                Tambah Produk

            </x-ui.button>

        </x-ui.page-header>



        {{-- ====================================================== --}}
        {{-- Statistics --}}
        {{-- ====================================================== --}}
        <section>

            <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

                <x-ui.stat-card title="Total Produk" :value="$statistics['total']" description="Seluruh produk terdaftar">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V7a2 2 0 00-2-2h-3V3H9v2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>



                <x-ui.stat-card title="Produk Aktif" :value="$statistics['active']" description="Ditampilkan pada website">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>



                <x-ui.stat-card title="Produk Nonaktif" :value="$statistics['inactive']" description="Tidak dipublikasikan">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 18.364A9 9 0 005.636 5.636" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>



                <x-ui.stat-card title="Produk Unggulan" :value="$statistics['featured']" description="Produk pilihan desa">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.977 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.977-2.89a1 1 0 00-1.176 0l-3.977 2.89c-.785.57-1.84-.197-1.54-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.543 10.1c-.783-.57-.38-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.518-4.674z" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>

            </div>

        </section>



        {{-- ====================================================== --}}
        {{-- Toolbar --}}
        {{-- ====================================================== --}}
        <x-ui.toolbar>

            <form action="{{ route('admin.products.index') }}" method="GET"
                class="flex w-full flex-col gap-3 lg:flex-row lg:items-center">

                <div class="flex-1">

                    <x-ui.search-bar name="search" :value="$search" placeholder="Cari produk atau nama UMKM..." />

                </div>

                <div class="flex items-center gap-3">

                    @if (request()->filled('search'))
                        <x-ui.button href="{{ route('admin.products.index') }}" variant="ghost">

                            Reset

                        </x-ui.button>
                    @endif

                    <x-ui.button type="submit">

                        Cari

                    </x-ui.button>

                </div>

            </form>

        </x-ui.toolbar>

        {{-- ====================================================== --}}
        {{-- Daftar Produk --}}
        {{-- ====================================================== --}}
        <x-ui.card padding="false">

            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

                <div>

                    <h2 class="text-lg font-semibold text-slate-900">

                        Daftar Produk

                    </h2>

                    <p class="mt-1 text-sm text-slate-500">

                        Menampilkan

                        <span class="font-semibold text-slate-700">

                            {{ $products->count() }}

                        </span>

                        dari

                        <span class="font-semibold text-slate-700">

                            {{ $products->total() }}

                        </span>

                        produk.

                    </p>

                </div>

                <x-ui.badge variant="secondary">

                    {{ $products->total() }} Produk

                </x-ui.badge>

            </div>



            @if ($products->count())

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-slate-200">

                        <thead class="bg-slate-50">

                            <tr>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Produk

                                </th>

                                <th
                                    class="w-60 px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    UMKM

                                </th>

                                <th
                                    class="w-40 px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Harga

                                </th>

                                <th
                                    class="w-36 px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Unggulan

                                </th>

                                <th
                                    class="w-36 px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Status

                                </th>

                                <th
                                    class="w-48 px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Aksi

                                </th>

                            </tr>

                        </thead>



                        <tbody class="divide-y divide-slate-100 bg-white">

                            @foreach ($products as $product)
                                <tr class="transition hover:bg-slate-50">

                                    {{-- Produk --}}
                                    <td class="px-6 py-5">

                                        <div class="flex items-center gap-4">

                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}"
                                                    class="h-16 w-16 rounded-2xl border border-slate-200 object-cover">
                                            @else
                                                <div
                                                    class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                                    <svg class="h-7 w-7" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M20 13V7a2 2 0 00-2-2h-3V3H9v2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4" />

                                                    </svg>

                                                </div>
                                            @endif



                                            <div>

                                                <h3 class="font-semibold text-slate-900">

                                                    {{ $product->name }}

                                                </h3>

                                                <p class="mt-1 text-xs leading-5 text-slate-500">

                                                    {{ Str::limit($product->description, 70) ?: 'Belum ada deskripsi.' }}

                                                </p>

                                            </div>

                                        </div>

                                    </td>



                                    {{-- UMKM --}}
                                    <td class="px-6 py-5">

                                        @if ($product->umkm)
                                            <div>

                                                <p class="font-medium text-slate-900">

                                                    {{ $product->umkm->business_name }}

                                                </p>

                                                <p class="mt-1 text-xs text-slate-500">

                                                    {{ $product->umkm->category?->name ?? 'Tanpa Kategori' }}

                                                </p>

                                            </div>
                                        @else
                                            <span class="text-sm text-slate-400">

                                                -

                                            </span>
                                        @endif

                                    </td>



                                    {{-- Harga --}}
                                    <td class="px-6 py-5 text-right">

                                        <span class="text-base font-bold text-slate-900">

                                            Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}

                                        </span>

                                    </td>



                                    {{-- Unggulan --}}
                                    <td class="px-6 py-5 text-center">

                                        @if ($product->is_featured)
                                            <x-ui.badge variant="warning">

                                                Unggulan

                                            </x-ui.badge>
                                        @else
                                            <x-ui.badge variant="secondary">

                                                Biasa

                                            </x-ui.badge>
                                        @endif

                                    </td>



                                    {{-- Status --}}
                                    <td class="px-6 py-5 text-center">

                                        <x-ui.badge :variant="$product->is_active ? 'success' : 'danger'">

                                            {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}

                                        </x-ui.badge>

                                    </td>



                                    {{-- Aksi --}}
                                    <td class="px-6 py-5">

                                        <div class="flex items-center justify-center gap-2">

                                            <x-ui.button href="{{ route('admin.products.edit', $product) }}"
                                                variant="ghost" size="sm">

                                                Edit

                                            </x-ui.button>

                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <x-ui.button type="submit" variant="danger" size="sm">

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
            @else
                <div class="py-12">

                    <x-ui.empty-state title="Belum Ada Produk"
                        description="Tambahkan produk pertama agar katalog UMKM Desa mulai tersedia.">

                        <x-ui.button href="{{ route('admin.products.create') }}">

                            Tambah Produk

                        </x-ui.button>

                    </x-ui.empty-state>

                </div>

            @endif

        </x-ui.card>

        {{-- ====================================================== --}}
        {{-- Pagination --}}
        {{-- ====================================================== --}}
        <section>

            <div
                class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white px-6 py-5 shadow-sm md:flex-row md:items-center md:justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-700">

                        Menampilkan

                        <span class="font-semibold text-slate-900">

                            {{ $products->firstItem() ?? 0 }}

                        </span>

                        –

                        <span class="font-semibold text-slate-900">

                            {{ $products->lastItem() ?? 0 }}

                        </span>

                        dari

                        <span class="font-semibold text-slate-900">

                            {{ $products->total() }}

                        </span>

                        produk

                    </p>

                    <p class="mt-1 text-xs text-slate-500">

                        Halaman

                        {{ $products->currentPage() }}

                        dari

                        {{ $products->lastPage() }}

                    </p>

                </div>

                <div>

                    {{ $products->onEachSide(1)->links() }}

                </div>

            </div>

        </section>

    </div>

@endsection

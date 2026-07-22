@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <x-ui.page-header
        title="Manajemen Kategori"
        subtitle="Kelola seluruh kategori UMKM yang digunakan untuk mengelompokkan produk dan pelaku usaha.">

        <x-ui.button
            href="{{ route('admin.categories.create') }}">

            + Tambah Kategori

        </x-ui.button>

    </x-ui.page-header>

    {{-- Statistic --}}
    <div class="grid gap-4 md:grid-cols-3">

        <x-ui.card>
            <p class="text-sm text-gray-500">
                Total Kategori
            </p>

            <h2 class="mt-2 text-3xl font-bold text-gray-900">
                {{ $categories->total() }}
            </h2>
        </x-ui.card>

        <x-ui.card>
            <p class="text-sm text-gray-500">
                Kategori Aktif
            </p>

            <h2 class="mt-2 text-3xl font-bold text-green-600">
                {{ $categories->where('is_active', true)->count() }}
            </h2>
        </x-ui.card>

        <x-ui.card>
            <p class="text-sm text-gray-500">
                Kategori Nonaktif
            </p>

            <h2 class="mt-2 text-3xl font-bold text-red-500">
                {{ $categories->where('is_active', false)->count() }}
            </h2>
        </x-ui.card>

    </div>

    {{-- Search --}}
    <x-ui.card>

        <x-ui.filter-bar
            :action="route('admin.categories.index')">

            <x-ui.search-bar
                name="search"
                :value="$search"
                placeholder="Cari nama kategori..." />

            <x-ui.button
                type="submit">

                Cari

            </x-ui.button>

            @if(request()->filled('search'))

                <x-ui.button
                    variant="secondary"
                    :href="route('admin.categories.index')">

                    Reset

                </x-ui.button>

            @endif

        </x-ui.filter-bar>

    </x-ui.card>

    {{-- Success --}}
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

                    Daftar Kategori

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Menampilkan
                    <span class="font-medium">{{ $categories->count() }}</span>
                    dari
                    <span class="font-medium">{{ $categories->total() }}</span>
                    kategori.

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
                            Kategori
                        </th>

                        <th class="w-36">
                            Status
                        </th>

                        <th class="w-44 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                        <tr>

                            <td>

                                {{
                                    ($categories->currentPage() - 1) * $categories->perPage()
                                    + $loop->iteration
                                }}

                            </td>

                            <td>

                                <div class="font-semibold text-gray-900">

                                    {{ $category->name }}

                                </div>

                                <div class="mt-1 text-xs text-gray-500">

                                    {{ $category->slug }}

                                </div>

                            </td>

                            <td>

                                <x-ui.badge
                                    :variant="$category->is_active ? 'success' : 'danger'">

                                    {{ $category->is_active ? 'Aktif' : 'Nonaktif' }}

                                </x-ui.badge>

                            </td>

                            <td>

                                <x-ui.action-group>

                                    <x-ui.button
                                        variant="secondary"
                                        :href="route('admin.categories.edit', $category)">

                                        Edit

                                    </x-ui.button>

                                    <form
                                        action="{{ route('admin.categories.destroy', $category) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

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
                                colspan="4"
                                class="py-14">

                                <x-ui.empty-state
                                    title="Belum Ada Kategori"
                                    description="Mulai dengan menambahkan kategori pertama agar UMKM dapat dikelompokkan dengan lebih baik." />

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

            Halaman {{ $categories->currentPage() }}
            dari {{ $categories->lastPage() }}

        </p>

        {{ $categories->links() }}

    </div>

</div>

@endsection

@extends('layouts.admin')

@section('title', 'Manajemen UMKM')

@section('content')

<div class="space-y-8">

    {{-- Page Header --}}
    <x-ui.page-header
        title="Manajemen UMKM"
        subtitle="Kelola seluruh data UMKM yang terdaftar pada Portal UMKM Desa.">

        <x-ui.button
            href="{{ route('admin.umkms.create') }}">

            + Tambah UMKM

        </x-ui.button>

    </x-ui.page-header>

    {{-- Summary --}}
    <div class="grid gap-4 md:grid-cols-3">

        <x-ui.card>

            <p class="text-sm text-gray-500">
                Total UMKM
            </p>

            <h2 class="mt-2 text-3xl font-bold text-gray-900">
                {{ $umkms->total() }}
            </h2>

        </x-ui.card>

        <x-ui.card>

            <p class="text-sm text-gray-500">
                UMKM Aktif
            </p>

            <h2 class="mt-2 text-3xl font-bold text-green-600">
                {{ $umkms->where('is_active', true)->count() }}
            </h2>

        </x-ui.card>

        <x-ui.card>

            <p class="text-sm text-gray-500">
                UMKM Nonaktif
            </p>

            <h2 class="mt-2 text-3xl font-bold text-red-500">
                {{ $umkms->where('is_active', false)->count() }}
            </h2>

        </x-ui.card>

    </div>

    {{-- Search --}}
    <x-ui.card>

        <x-ui.filter-bar
            :action="route('admin.umkms.index')">

            <x-ui.search-bar
                name="search"
                :value="request('search')"
                placeholder="Cari nama UMKM..." />

            <x-ui.button
                type="submit">

                Cari

            </x-ui.button>

            @if(request()->filled('search'))

                <x-ui.button
                    variant="secondary"
                    :href="route('admin.umkms.index')">

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

                    Daftar UMKM

                </h2>

                <p class="mt-1 text-sm text-gray-500">

                    Menampilkan
                    <span class="font-medium">{{ $umkms->count() }}</span>
                    dari
                    <span class="font-medium">{{ $umkms->total() }}</span>
                    UMKM.

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
                            UMKM
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Pemilik
                        </th>

                        <th class="w-36 text-center">
                            Status
                        </th>

                        <th class="w-44 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($umkms as $umkm)

                        <tr>

                            <td>

                                {{
                                    ($umkms->currentPage() - 1) * $umkms->perPage()
                                    + $loop->iteration
                                }}

                            </td>

                            <td>

                                <div class="font-semibold text-gray-900">

                                    {{ $umkm->business_name }}

                                </div>

                                <div class="mt-1 text-xs text-gray-500">

                                    {{ $umkm->phone ?: '-' }}

                                </div>

                            </td>

                            <td>

                                {{ $umkm->category->name ?? '-' }}

                            </td>

                            <td>

                                {{ $umkm->user->name ?? '-' }}

                            </td>

                            <td class="text-center">

                                <x-ui.badge
                                    :variant="$umkm->is_active ? 'success' : 'danger'">

                                    {{ $umkm->is_active ? 'Aktif' : 'Nonaktif' }}

                                </x-ui.badge>

                            </td>

                            <td>

                                <x-ui.action-group>

                                    <x-ui.button
                                        variant="secondary"
                                        :href="route('admin.umkms.edit', $umkm)">

                                        Edit

                                    </x-ui.button>

                                    <form
                                        action="{{ route('admin.umkms.destroy', $umkm) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus UMKM ini?')">

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
                                colspan="6"
                                class="py-14">

                                <x-ui.empty-state
                                    title="Belum Ada Data UMKM"
                                    description="Tambahkan UMKM pertama agar produk dapat mulai dipublikasikan di website." />

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

            Halaman {{ $umkms->currentPage() }}
            dari {{ $umkms->lastPage() }}

        </p>

        {{ $umkms->links() }}

    </div>

</div>

@endsection

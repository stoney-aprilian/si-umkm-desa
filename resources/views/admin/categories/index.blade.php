@extends('layouts.admin')

@section('title', 'Manajemen Kategori')


@section('content')

    <div class="space-y-8">

        {{-- ====================================================== --}}
        {{-- Header --}}
        {{-- ====================================================== --}}
        <x-ui.page-header title="Manajemen Kategori"
            subtitle="Kelola seluruh kategori usaha yang digunakan sebagai dasar pengelompokan UMKM dan produk di dalam sistem.">

            <x-ui.button href="{{ route('admin.categories.create') }}">

                Tambah Kategori

            </x-ui.button>

        </x-ui.page-header>



        {{-- ====================================================== --}}
        {{-- Statistics --}}
        {{-- ====================================================== --}}
        <section>

            <div class="grid gap-5 md:grid-cols-3">

                <x-ui.stat-card title="Total Kategori" :value="$totalCategories" description="Kategori yang tersimpan">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7h6l2 2h10v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>



                <x-ui.stat-card title="Kategori Aktif" :value="$activeCategories" description="Siap digunakan">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>



                <x-ui.stat-card title="Kategori Nonaktif" :value="$inactiveCategories" description="Tidak ditampilkan">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01M12 3C7.03 3 3 7.03 3 12s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9z" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>

            </div>

        </section>



        {{-- ====================================================== --}}
        {{-- Toolbar --}}
        {{-- ====================================================== --}}
        <x-ui.toolbar>

            <form action="{{ route('admin.categories.index') }}" method="GET"
                class="flex w-full flex-col gap-3 lg:flex-row lg:items-center">

                <div class="flex-1">

                    <x-ui.search-bar name="search" :value="$search" placeholder="Cari nama kategori..." />

                </div>

                <div class="flex items-center gap-3">

                    @if (request()->filled('search'))
                        <x-ui.button href="{{ route('admin.categories.index') }}" variant="ghost">

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
        {{-- Categories Table --}}
        {{-- ====================================================== --}}
        <x-ui.card padding="false">

            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

                <div>

                    <h2 class="text-lg font-semibold text-slate-900">

                        Daftar Kategori

                    </h2>

                    <p class="mt-1 text-sm text-slate-500">

                        Menampilkan
                        <span class="font-semibold text-slate-700">
                            {{ $categories->count() }}
                        </span>

                        dari

                        <span class="font-semibold text-slate-700">
                            {{ $categories->total() }}
                        </span>

                        kategori.

                    </p>

                </div>

                <x-ui.badge variant="secondary">

                    {{ $categories->total() }} Data

                </x-ui.badge>

            </div>



            @if ($categories->count())

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-slate-200">

                        <thead class="bg-slate-50">

                            <tr>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Kategori

                                </th>

                                <th
                                    class="w-44 px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Status

                                </th>

                                <th
                                    class="w-48 px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Aksi

                                </th>

                            </tr>

                        </thead>



                        <tbody class="divide-y divide-slate-100 bg-white">

                            @foreach ($categories as $category)
                                <tr class="transition hover:bg-slate-50">

                                    {{-- Nama --}}
                                    <td class="px-6 py-5">

                                        <div class="flex items-start gap-4">

                                            <div
                                                class="flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">

                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 7h6l2 2h10v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                                                </svg>

                                            </div>

                                            <div>

                                                <h3 class="font-semibold text-slate-900">

                                                    {{ $category->name }}

                                                </h3>

                                                <p class="mt-1 font-mono text-xs text-slate-500">

                                                    /{{ $category->slug }}

                                                </p>

                                            </div>

                                        </div>

                                    </td>



                                    {{-- Status --}}
                                    <td class="px-6 py-5">

                                        <x-ui.badge :variant="$category->is_active ? 'success' : 'danger'">

                                            {{ $category->is_active ? 'Aktif' : 'Nonaktif' }}

                                        </x-ui.badge>

                                    </td>



                                    {{-- Action --}}
                                    <td class="px-6 py-5">

                                        <div class="flex items-center justify-center gap-2">

                                            <x-ui.button size="sm" variant="ghost"
                                                href="{{ route('admin.categories.edit', $category) }}">

                                                Edit

                                            </x-ui.button>

                                            <form action="{{ route('admin.categories.destroy', $category) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <x-ui.button type="submit" size="sm" variant="danger">

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

                    <x-ui.empty-state title="Belum Ada Kategori"
                        description="Tambahkan kategori pertama untuk mulai mengelompokkan UMKM dan produk.">

                        <x-ui.button href="{{ route('admin.categories.create') }}">

                            Tambah Kategori

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

                            {{ $categories->firstItem() ?? 0 }}

                        </span>

                        –

                        <span class="font-semibold text-slate-900">

                            {{ $categories->lastItem() ?? 0 }}

                        </span>

                        dari

                        <span class="font-semibold text-slate-900">

                            {{ $categories->total() }}

                        </span>

                        kategori

                    </p>

                    <p class="mt-1 text-xs text-slate-500">

                        Halaman

                        {{ $categories->currentPage() }}

                        dari

                        {{ $categories->lastPage() }}

                    </p>

                </div>



                <div>

                    {{ $categories->onEachSide(1)->links() }}

                </div>

            </div>

        </section>

    </div>

@endsection

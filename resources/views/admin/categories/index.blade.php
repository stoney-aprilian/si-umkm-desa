@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')

<div class="space-y-6">

    <x-ui.page-header
        title="Manajemen Kategori"
        subtitle="Kelola seluruh kategori UMKM.">

        <x-ui.button
            href="{{ route('admin.categories.create') }}">

            + Tambah Kategori

        </x-ui.button>

    </x-ui.page-header>

    <x-ui.filter-bar
        :action="route('admin.categories.index')">

        <x-ui.search-bar
            name="search"
            :value="$search"
            placeholder="Cari kategori..." />

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

    @if(session('success'))

        <div class="alert-success">

            {{ session('success') }}

        </div>

    @endif

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

                            <div class="font-semibold">

                                {{ $category->name }}

                            </div>

                            <div class="text-sm text-slate-500">

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
                            class="py-12">

                            <x-ui.empty-state
                                title="Belum ada kategori"
                                description="Tambahkan kategori pertama untuk mulai mengelola UMKM." />

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div>

        {{ $categories->links() }}

    </div>

</div>

@endsection

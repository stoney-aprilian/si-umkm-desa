@extends('layouts.admin')

@section('title', 'Manajemen Kategori')


@section('content')

<div class="space-y-8">


    {{-- Header --}}
    <x-ui.page-header

        title="Manajemen Kategori"

        subtitle="Kelola kategori usaha yang digunakan untuk mengelompokkan UMKM dan produk.">


        <x-ui.button

            href="{{ route('admin.categories.create') }}">

            Tambah Kategori

        </x-ui.button>


    </x-ui.page-header>





    {{-- Statistics --}}
    <div class="grid gap-6 md:grid-cols-3">


        <x-ui.card>


            <p class="text-sm font-medium text-slate-500">

                Total Kategori

            </p>


            <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">

                {{ $totalCategories }}

            </p>


        </x-ui.card>





        <x-ui.card>


            <p class="text-sm font-medium text-slate-500">

                Kategori Aktif

            </p>


            <p class="mt-3 text-3xl font-bold tracking-tight text-emerald-600">

                {{ $activeCategories }}

            </p>


        </x-ui.card>





        <x-ui.card>


            <p class="text-sm font-medium text-slate-500">

                Kategori Nonaktif

            </p>


            <p class="mt-3 text-3xl font-bold tracking-tight text-rose-600">

                {{ $inactiveCategories }}

            </p>


        </x-ui.card>



    </div>





    {{-- Search --}}
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

                href="{{ route('admin.categories.index') }}">


                Reset


            </x-ui.button>


        @endif



    </x-ui.filter-bar>






    {{-- Table --}}
    <x-ui.card

        padding="false"

        class="overflow-hidden">



        <div class="border-b border-slate-200 px-6 py-5">


            <h2 class="text-lg font-semibold text-slate-900">

                Daftar Kategori

            </h2>


            <p class="mt-1 text-sm text-slate-500">


                Menampilkan

                <span class="font-medium text-slate-700">

                    {{ $categories->count() }}

                </span>


                dari


                <span class="font-medium text-slate-700">

                    {{ $categories->total() }}

                </span>


                kategori.


            </p>


        </div>





        <div class="table-wrapper">


            <table class="table-app">


                <thead>


                    <tr>


                        <th class="w-20">

                            No

                        </th>


                        <th>

                            Nama Kategori

                        </th>


                        <th class="w-40">

                            Status

                        </th>


                        <th class="w-48 text-center">

                            Aksi

                        </th>


                    </tr>


                </thead>





                <tbody>


                    @forelse($categories as $category)


                        <tr>


                            <td>


                                {{
                                    ($categories->currentPage() - 1)
                                    * $categories->perPage()
                                    + $loop->iteration
                                }}


                            </td>





                            <td>


                                <div class="font-semibold text-slate-900">

                                    {{ $category->name }}

                                </div>


                                <div class="mt-1 text-xs text-slate-500">

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


                                <div class="flex justify-center gap-2">


                                    <x-ui.button

                                        size="sm"

                                        variant="secondary"

                                        href="{{ route('admin.categories.edit', $category) }}">


                                        Edit


                                    </x-ui.button>





                                    <form

                                        action="{{ route('admin.categories.destroy', $category) }}"

                                        method="POST"


                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">


                                        @csrf

                                        @method('DELETE')



                                        <x-ui.button

                                            size="sm"

                                            type="submit"

                                            variant="danger">


                                            Hapus


                                        </x-ui.button>


                                    </form>


                                </div>


                            </td>


                        </tr>


                    @empty


                        <tr>


                            <td

                                colspan="4"

                                class="py-14">


                                <x-ui.empty-state

                                    title="Belum Ada Kategori"

                                    description="Tambahkan kategori pertama untuk mulai mengelompokkan UMKM dan produk." />


                            </td>


                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>



    </x-ui.card>






    {{-- Pagination --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">


        <p class="text-sm text-slate-500">


            Halaman

            <span class="font-medium text-slate-700">

                {{ $categories->currentPage() }}

            </span>


            dari


            <span class="font-medium text-slate-700">

                {{ $categories->lastPage() }}

            </span>


        </p>



        {{ $categories->links() }}


    </div>



</div>

@endsection

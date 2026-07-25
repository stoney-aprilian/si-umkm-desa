@extends('layouts.admin')

@section('title', 'Manajemen Produk')


@section('content')

<div class="space-y-8">


    {{-- Header --}}
    <x-ui.page-header
        title="Manajemen Produk"
        subtitle="Kelola seluruh produk UMKM yang ditampilkan pada website.">

        <x-ui.button
            href="{{ route('admin.products.create') }}">

            + Tambah Produk

        </x-ui.button>

    </x-ui.page-header>




    {{-- Statistics --}}
    <section>

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">


            <x-ui.stat-card
                title="Total Produk"
                :value="$statistics['total']"
                description="Seluruh produk terdaftar">


                <x-slot:icon>

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 13V7a2 2 0 00-2-2h-3V3H9v2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4"/>

                    </svg>

                </x-slot:icon>


            </x-ui.stat-card>



            <x-ui.stat-card
                title="Produk Aktif"
                :value="$statistics['active']"
                description="Produk yang tampil">


                <x-slot:icon>

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"/>

                    </svg>

                </x-slot:icon>


            </x-ui.stat-card>



            <x-ui.stat-card
                title="Produk Nonaktif"
                :value="$statistics['inactive']"
                description="Produk disembunyikan">


                <x-slot:icon>

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728A9 9 0 015.636 5.636"/>

                    </svg>

                </x-slot:icon>


            </x-ui.stat-card>



            <x-ui.stat-card
                title="Produk Unggulan"
                :value="$statistics['featured']"
                description="Produk pilihan desa">


                <x-slot:icon>

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.977 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.977-2.89a1 1 0 00-1.176 0l-3.977 2.89c-.785.57-1.84-.197-1.54-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.543 10.1c-.783-.57-.38-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.518-4.674z"/>

                    </svg>

                </x-slot:icon>


            </x-ui.stat-card>


        </div>

    </section>





    {{-- Search --}}
    <x-ui.card>

        <x-ui.filter-bar
            :action="route('admin.products.index')">


            <x-ui.search-bar
                name="search"
                :value="$search"
                placeholder="Cari nama produk atau UMKM..." />


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





    {{-- Table --}}
    <x-ui.card class="overflow-hidden">


        <div class="border-b border-slate-200 px-6 py-5">

            <h2 class="text-lg font-semibold text-slate-900">

                Daftar Produk

            </h2>


            <p class="mt-1 text-sm text-slate-500">

                Menampilkan
                <span class="font-medium">
                    {{ $products->count() }}
                </span>
                dari
                <span class="font-medium">
                    {{ $products->total() }}
                </span>
                produk.

            </p>

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

                        <th class="w-40 text-right">
                            Harga
                        </th>

                        <th class="w-32 text-center">
                            Unggulan
                        </th>

                        <th class="w-32 text-center">
                            Status
                        </th>

                        <th class="w-44 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>




                <tbody>


                    @forelse($products as $product)


                        <tr>


                            <td>

                                {{
                                    ($products->currentPage() - 1)
                                    * $products->perPage()
                                    + $loop->iteration
                                }}

                            </td>




                            <td>

                                <div class="flex items-center gap-3">


                                    @if($product->image)

                                        <img
                                            src="{{ asset('storage/'.$product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="h-12 w-12 rounded-xl object-cover">


                                    @else

                                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-xs text-slate-400">

                                            N/A

                                        </div>

                                    @endif



                                    <div>

                                        <p class="font-semibold text-slate-900">

                                            {{ $product->name }}

                                        </p>


                                        <p class="mt-1 text-xs text-slate-500">

                                            {{ Str::limit($product->description, 60) }}

                                        </p>

                                    </div>


                                </div>


                            </td>





                            <td>

                                {{ $product->umkm?->business_name ?? '-' }}

                            </td>





                            <td class="text-right font-medium text-slate-900">

                                Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}

                            </td>





                            <td class="text-center">

                                @if($product->is_featured)

                                    <x-ui.badge variant="warning">

                                        Unggulan

                                    </x-ui.badge>

                                @else

                                    <span class="text-slate-400">
                                        -
                                    </span>

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


        <p class="text-sm text-slate-500">

            Halaman
            {{ $products->currentPage() }}
            dari
            {{ $products->lastPage() }}

        </p>



        {{ $products->links() }}


    </div>



</div>


@endsection

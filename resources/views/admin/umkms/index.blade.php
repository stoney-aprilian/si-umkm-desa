@extends('layouts.admin')

@section('title', 'Manajemen UMKM')


@section('content')

<div class="space-y-8">


    {{-- Header --}}
    <x-ui.page-header

        title="Manajemen UMKM"

        subtitle="Kelola seluruh data UMKM yang terdaftar pada Portal UMKM Desa.">


        <x-ui.button

            href="{{ route('admin.umkms.create') }}">


            + Tambah UMKM


        </x-ui.button>


    </x-ui.page-header>





    {{-- Statistics --}}
    <section>


        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">



            <x-ui.stat-card

                title="Total UMKM"

                :value="$statistics['total']"

                description="Seluruh UMKM terdaftar">


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
                            d="M3 21h18M5 21V8l7-4 7 4v13"/>

                    </svg>


                </x-slot:icon>


            </x-ui.stat-card>





            <x-ui.stat-card

                title="UMKM Aktif"

                :value="$statistics['active']"

                description="Tampil di website">


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

                title="UMKM Nonaktif"

                :value="$statistics['inactive']"

                description="Tidak ditampilkan">


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
                            d="M18.364 18.364A9 9 0 005.636 5.636"/>

                    </svg>


                </x-slot:icon>


            </x-ui.stat-card>





            <x-ui.stat-card

                title="Menunggu Verifikasi"

                :value="\App\Models\Umkm::pending()->count()"

                description="Perlu pemeriksaan admin">


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
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                    </svg>


                </x-slot:icon>


            </x-ui.stat-card>



        </div>


    </section>





    {{-- Search --}}
    <x-ui.card>


        <x-ui.filter-bar

            :action="route('admin.umkms.index')">



            <x-ui.search-bar

                name="search"

                :value="$search"

                placeholder="Cari nama UMKM, pemilik, atau kategori..." />



            <x-ui.button type="submit">

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





    {{-- Table --}}
    <x-ui.card class="overflow-hidden">


        <div class="border-b border-slate-200 px-6 py-5">


            <h2 class="text-lg font-semibold text-slate-900">

                Daftar UMKM

            </h2>


            <p class="mt-1 text-sm text-slate-500">

                Menampilkan

                <span class="font-medium">
                    {{ $umkms->count() }}
                </span>

                dari

                <span class="font-medium">
                    {{ $umkms->total() }}
                </span>

                UMKM.


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
                            UMKM
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Pemilik
                        </th>

                        <th class="text-center">
                            Approval
                        </th>

                        <th class="text-center">
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
                                    ($umkms->currentPage() - 1)
                                    * $umkms->perPage()
                                    + $loop->iteration
                                }}

                            </td>





                            <td>


                                <div class="flex items-center gap-3">


                                    @if($umkm->logo)


                                        <img

                                            src="{{ asset('storage/'.$umkm->logo) }}"

                                            class="h-12 w-12 rounded-xl object-cover"

                                            alt="{{ $umkm->business_name }}">


                                    @else


                                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-xs text-slate-400">

                                            N/A

                                        </div>


                                    @endif





                                    <div>


                                        <p class="font-semibold text-slate-900">

                                            {{ $umkm->business_name }}

                                        </p>


                                        <p class="mt-1 text-xs text-slate-500">

                                            {{ $umkm->phone ?: '-' }}

                                        </p>


                                    </div>


                                </div>


                            </td>





                            <td>

                                {{ $umkm->category?->name ?? '-' }}

                            </td>





                            <td>

                                {{ $umkm->user?->name ?? '-' }}

                            </td>





                            <td class="text-center">


                                <x-ui.badge

                                    :variant="match($umkm->status) {

                                        'approved' => 'success',

                                        'pending' => 'warning',

                                        default => 'danger'

                                    }">


                                    {{ ucfirst($umkm->status) }}


                                </x-ui.badge>


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

                                colspan="7"

                                class="py-14">


                                <x-ui.empty-state

                                    title="Belum Ada Data UMKM"

                                    description="Tambahkan UMKM pertama agar katalog desa mulai berkembang." />


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

            Halaman {{ $umkms->currentPage() }}

            dari {{ $umkms->lastPage() }}


        </p>



        {{ $umkms->links() }}


    </div>


</div>


@endsection

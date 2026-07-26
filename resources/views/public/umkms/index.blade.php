@extends('layouts.public')

@section('title', 'Daftar UMKM')

@section(
    'meta_description',
    'Jelajahi daftar UMKM Desa Salamnunggal berdasarkan kategori dan temukan berbagai produk unggulan dari pelaku usaha lokal.'
)

@section('content')

<section class="py-20">

    <div class="app-container">

        {{-- ====================================================== --}}
        {{-- Header --}}
        {{-- ====================================================== --}}
        <x-ui.section-title
            title="Daftar UMKM"
            subtitle="Jelajahi berbagai pelaku usaha lokal yang telah terdaftar dalam Sistem Informasi UMKM Desa Salamnunggal." />





        {{-- ====================================================== --}}
        {{-- Filter --}}
        {{-- ====================================================== --}}
        <div
            class="mt-10 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <x-ui.filter-bar
                :action="route('public.umkms.index')"
                :categories="$categories"
                searchPlaceholder="Cari nama UMKM..." />

        </div>





        {{-- ====================================================== --}}
        {{-- Result Summary --}}
        {{-- ====================================================== --}}
        <div
            class="mt-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            @if(request()->filled('search') || request()->filled('category'))

                <div
                    class="inline-flex items-center gap-2 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-3 text-sm text-emerald-700">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"/>

                    </svg>

                    <span>

                        Menampilkan hasil

                        @if(request()->filled('search'))

                            pencarian

                            <span class="font-semibold">

                                "{{ request('search') }}"

                            </span>

                        @endif

                        @if(request()->filled('category'))

                            pada kategori

                            <span class="font-semibold">

                                {{ optional($categories->firstWhere('slug', request('category')))->name ?? request('category') }}

                            </span>

                        @endif

                    </span>

                </div>

            @endif





            <p
                class="text-sm text-slate-500">

                Menampilkan

                <span
                    class="font-semibold text-slate-900">

                    {{ $umkms->total() }}

                </span>

                UMKM

            </p>

        </div>





        {{-- ====================================================== --}}
        {{-- Grid --}}
        {{-- ====================================================== --}}
        <div
            class="mt-10 grid gap-7 md:grid-cols-2 xl:grid-cols-3">

            @forelse($umkms as $umkm)

                <x-umkm.card
                    :umkm="$umkm" />

            @empty

                <div
                    class="md:col-span-2 xl:col-span-3">

                    <div
                        class="rounded-3xl border border-dashed border-slate-300 bg-slate-50 px-8 py-16 text-center">

                        <div
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-slate-100 text-slate-400">

                            <svg
                                class="h-10 w-10"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 21h18M5 21V9l7-6 7 6v12"/>

                            </svg>

                        </div>

                        <h3
                            class="mt-6 text-xl font-bold text-slate-900">

                            UMKM Tidak Ditemukan

                        </h3>

                        <p
                            class="mx-auto mt-3 max-w-lg leading-7 text-slate-500">

                            Tidak ada UMKM yang sesuai dengan pencarian
                            atau kategori yang dipilih.

                        </p>

                    </div>

                </div>

            @endforelse

        </div>





        {{-- ====================================================== --}}
        {{-- Pagination --}}
        {{-- ====================================================== --}}
        @if($umkms->hasPages())

            <div
                class="mt-16 flex justify-center">

                {{ $umkms->withQueryString()->links() }}

            </div>

        @endif

    </div>

</section>

@endsection

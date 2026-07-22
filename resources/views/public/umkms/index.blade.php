@extends('layouts.public')

@section('title', 'Daftar UMKM')

@section('content')

    <section class="bg-slate-50 py-16">

        <div class="app-container">

            {{-- Page Header --}}
            <x-ui.section-title
                title="Daftar UMKM"
                subtitle="Jelajahi berbagai UMKM unggulan yang telah terdaftar di desa." />

            {{-- Filter --}}
            <div class="mt-8">

                <x-ui.filter-bar
                    :action="route('public.umkms.index')"
                    :categories="$categories"
                    searchPlaceholder="Cari nama UMKM..." />

            </div>

            {{-- Active Filter --}}
            @if (request()->filled('search') || request()->filled('category'))

                <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">

                    Menampilkan hasil

                    @if (request()->filled('search'))

                        pencarian

                        <span class="font-semibold">
                            "{{ request('search') }}"
                        </span>

                    @endif

                    @if (request()->filled('category'))

                        pada kategori

                        <span class="font-semibold">
                            {{ $categories->firstWhere('slug', request('category'))->name ?? request('category') }}
                        </span>

                    @endif

                </div>

            @endif

            {{-- UMKM Grid --}}
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                @forelse ($umkms as $umkm)

                    <x-umkm.card :umkm="$umkm" />

                @empty

                    <div class="sm:col-span-2 lg:col-span-3">

                        <x-ui.empty-state
                            title="UMKM Tidak Ditemukan"
                            description="Tidak ada UMKM yang sesuai dengan pencarian atau kategori yang dipilih." />

                    </div>

                @endforelse

            </div>

            {{-- Pagination --}}
            @if ($umkms->hasPages())

                <div class="mt-10">

                    {{ $umkms->links() }}

                </div>

            @endif

        </div>

    </section>

@endsection

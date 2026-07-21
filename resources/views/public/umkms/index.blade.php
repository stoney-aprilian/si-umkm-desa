@extends('layouts.public')

@section('title', 'Daftar UMKM')

@section('content')

<section class="bg-slate-50 py-16">

    <div class="mx-auto max-w-7xl px-6">

        <x-ui.section-title
            title="Daftar UMKM"
            subtitle="Jelajahi berbagai UMKM unggulan yang telah terdaftar di desa." />

        <div class="mt-8">

            <x-ui.filter-bar
                :action="route('public.umkms.index')"
                :categories="$categories"
                searchPlaceholder="Cari nama UMKM..." />

        </div>

        @if(request('search') || request('category'))

            <div class="mt-6 text-sm text-slate-600">

                Menampilkan hasil

                @if(request('search'))

                    pencarian
                    <span class="font-semibold text-emerald-600">
                        "{{ request('search') }}"
                    </span>

                @endif

                @if(request('category'))

                    pada kategori
                    <span class="font-semibold text-emerald-600">
                        {{ $categories->firstWhere('slug', request('category'))->name ?? request('category') }}
                    </span>

                @endif

            </div>

        @endif

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @forelse($umkms as $umkm)

                <x-umkm.card :umkm="$umkm" />

            @empty

                <div class="sm:col-span-2 lg:col-span-3">

                    <x-ui.empty-state
                        title="UMKM Tidak Ditemukan"
                        description="Tidak ada UMKM yang sesuai dengan pencarian atau kategori yang dipilih." />

                </div>

            @endforelse

        </div>

        @if($umkms->hasPages())

            <div class="mt-10">

                {{ $umkms->links() }}

            </div>

        @endif

    </div>

</section>

@endsection

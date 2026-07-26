@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')

<div class="mx-auto max-w-4xl space-y-8">

    {{-- ====================================================== --}}
    {{-- Header --}}
    {{-- ====================================================== --}}
    <x-ui.page-header
        title="Tambah Kategori"
        subtitle="Tambahkan kategori baru sebagai dasar pengelompokan UMKM dan produk di dalam sistem.">
    </x-ui.page-header>



    {{-- ====================================================== --}}
    {{-- Form --}}
    {{-- ====================================================== --}}
    <x-ui.card
        padding="false"
        class="overflow-hidden">

        <form
            action="{{ route('admin.categories.store') }}"
            method="POST">

            @csrf

            <div class="p-8">

                @include('admin.categories._form')

            </div>

            <x-ui.form-actions>

                <x-ui.button
                    variant="secondary"
                    href="{{ route('admin.categories.index') }}">

                    Kembali

                </x-ui.button>

                <x-ui.button
                    type="submit">

                    Simpan Kategori

                </x-ui.button>

            </x-ui.form-actions>

        </form>

    </x-ui.card>

</div>

@endsection

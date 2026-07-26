@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')

<div class="mx-auto max-w-6xl space-y-8">

    {{-- ====================================================== --}}
    {{-- Header --}}
    {{-- ====================================================== --}}
    <x-ui.page-header
        title="Tambah Produk"
        subtitle="Tambahkan produk baru untuk dipublikasikan pada katalog UMKM Desa.">
    </x-ui.page-header>



    {{-- ====================================================== --}}
    {{-- Form --}}
    {{-- ====================================================== --}}
    <x-ui.card
        padding="false"
        class="overflow-hidden">

        <form
            action="{{ route('admin.products.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="p-8">

                @include('admin.products._form')

            </div>

            <x-ui.form-actions>

                <x-ui.button
                    variant="secondary"
                    href="{{ route('admin.products.index') }}">

                    Kembali

                </x-ui.button>

                <x-ui.button
                    type="submit">

                    Simpan Produk

                </x-ui.button>

            </x-ui.form-actions>

        </form>

    </x-ui.card>

</div>

@endsection

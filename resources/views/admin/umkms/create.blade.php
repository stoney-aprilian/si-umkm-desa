@extends('layouts.admin')

@section('title', 'Tambah UMKM')

@section('content')

<div class="mx-auto max-w-6xl space-y-8">

    {{-- ====================================================== --}}
    {{-- Header --}}
    {{-- ====================================================== --}}
    <x-ui.page-header
        title="Tambah UMKM"
        subtitle="Tambahkan UMKM baru untuk didaftarkan ke dalam Sistem Informasi UMKM Desa sebelum dipublikasikan.">
    </x-ui.page-header>



    {{-- ====================================================== --}}
    {{-- Form --}}
    {{-- ====================================================== --}}
    <x-ui.card
        padding="false"
        class="overflow-hidden">

        <form
            action="{{ route('admin.umkms.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="p-8">

                @include('admin.umkms._form')

            </div>

            <x-ui.form-actions>

                <x-ui.button
                    variant="secondary"
                    href="{{ route('admin.umkms.index') }}">

                    Kembali

                </x-ui.button>

                <x-ui.button
                    type="submit">

                    Simpan UMKM

                </x-ui.button>

            </x-ui.form-actions>

        </form>

    </x-ui.card>

</div>

@endsection

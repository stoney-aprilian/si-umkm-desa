@extends('layouts.admin')

@section('title', 'Edit UMKM')

@section('content')

<div class="mx-auto max-w-6xl space-y-8">

    {{-- ====================================================== --}}
    {{-- Header --}}
    {{-- ====================================================== --}}
    <x-ui.page-header
        title="Edit UMKM"
        subtitle="Perbarui informasi UMKM agar data yang ditampilkan kepada masyarakat tetap akurat dan terkini.">
    </x-ui.page-header>



    {{-- ====================================================== --}}
    {{-- Form --}}
    {{-- ====================================================== --}}
    <x-ui.card
        padding="false"
        class="overflow-hidden">

        <form
            action="{{ route('admin.umkms.update', $umkm) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

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

                    Simpan Perubahan

                </x-ui.button>

            </x-ui.form-actions>

        </form>

    </x-ui.card>

</div>

@endsection

@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')

<div class="mx-auto max-w-4xl space-y-8">

    {{-- ====================================================== --}}
    {{-- Header --}}
    {{-- ====================================================== --}}
    <x-ui.page-header
        title="Edit Kategori"
        subtitle="Perbarui informasi kategori agar struktur data UMKM dan produk tetap konsisten.">
    </x-ui.page-header>



    {{-- ====================================================== --}}
    {{-- Form --}}
    {{-- ====================================================== --}}
    <x-ui.card
        padding="false"
        class="overflow-hidden">

        <form
            action="{{ route('admin.categories.update', $category) }}"
            method="POST">

            @csrf
            @method('PUT')

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

                    Simpan Perubahan

                </x-ui.button>

            </x-ui.form-actions>

        </form>

    </x-ui.card>

</div>

@endsection

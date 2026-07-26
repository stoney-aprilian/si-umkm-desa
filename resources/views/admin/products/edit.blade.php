@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')

<div class="mx-auto max-w-6xl space-y-8">

    {{-- ====================================================== --}}
    {{-- Header --}}
    {{-- ====================================================== --}}
    <x-ui.page-header
        title="Edit Produk"
        subtitle="Perbarui informasi produk agar katalog UMKM Desa tetap akurat, menarik, dan selalu terbaru.">
    </x-ui.page-header>



    {{-- ====================================================== --}}
    {{-- Form --}}
    {{-- ====================================================== --}}
    <x-ui.card
        padding="false"
        class="overflow-hidden">

        <form
            action="{{ route('admin.products.update', $product) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

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

                    Simpan Perubahan

                </x-ui.button>

            </x-ui.form-actions>

        </form>

    </x-ui.card>

</div>

@endsection

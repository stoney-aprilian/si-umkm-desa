@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')

<div class="max-w-3xl">

    <x-ui.section-title
        title="Tambah Kategori"
        subtitle="Tambahkan kategori baru untuk UMKM." />

    <x-ui.card class="mt-6">

        <form
            action="{{ route('admin.categories.store') }}"
            method="POST"
            class="space-y-6">

            @csrf

            @include('admin.categories._form')

            <x-ui.form-actions>

                <x-ui.button
                    variant="secondary"
                    href="{{ route('admin.categories.index') }}">

                    Batal

                </x-ui.button>

                <x-ui.button type="submit">

                    Simpan

                </x-ui.button>

            </x-ui.form-actions>

        </form>

    </x-ui.card>

</div>

@endsection

@extends('layouts.admin')

@section('title', 'Tambah UMKM')

@section('content')

<div class="mx-auto max-w-5xl">

    {{-- Page Header --}}
    <div class="mb-8">

        <x-ui.section-title
            title="Tambah UMKM"
            subtitle="Tambahkan data UMKM baru untuk dipublikasikan pada portal UMKM Desa." />

    </div>

    {{-- Form Card --}}
    <x-ui.card class="overflow-hidden">

        <form
            action="{{ route('admin.umkms.store') }}"
            method="POST"
            class="space-y-8">

            @csrf

            {{-- Form Content --}}
            <div class="p-6 md:p-8">

                @include('admin.umkms._form')

            </div>

            {{-- Footer Actions --}}
            <div class="flex flex-col-reverse gap-3 border-t border-gray-200 bg-gray-50 px-6 py-5 md:flex-row md:items-center md:justify-end md:px-8">

                <x-ui.button
                    variant="secondary"
                    href="{{ route('admin.umkms.index') }}">

                    Kembali

                </x-ui.button>

                <x-ui.button
                    type="submit">

                    Simpan UMKM

                </x-ui.button>

            </div>

        </form>

    </x-ui.card>

</div>

@endsection

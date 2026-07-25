@extends('layouts.owner')

@section('title', 'Tambah Produk')

@section('content')

    <div class="space-y-6">

        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-2xl font-bold text-slate-800">

                    Tambah Produk

                </h1>

                <p class="mt-1 text-sm text-slate-500">

                    Tambahkan produk baru untuk ditampilkan pada UMKM Anda.

                </p>

            </div>

            <x-ui.button
                :href="route('owner.products.index')"
                color="secondary">

                Kembali

            </x-ui.button>

        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

            <form
                action="{{ route('owner.products.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6">

                @csrf

                @include('owner.products._form')

                <x-ui.form-actions>

                    <x-ui.button type="submit">

                        Simpan Produk

                    </x-ui.button>

                </x-ui.form-actions>

            </form>

        </div>

    </div>

@endsection

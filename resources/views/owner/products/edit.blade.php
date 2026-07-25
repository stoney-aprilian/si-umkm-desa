@extends('layouts.owner')

@section('title', 'Edit Produk')

@section('content')

    <div class="space-y-6">

        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-2xl font-bold text-slate-800">

                    Edit Produk

                </h1>

                <p class="mt-1 text-sm text-slate-500">

                    Perbarui informasi produk UMKM Anda.

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
                action="{{ route('owner.products.update', $product->slug) }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6">

                @csrf
                @method('PUT')

                @include('owner.products._form')

                <x-ui.form-actions>

                    <x-ui.button
                        type="submit">

                        Perbarui Produk

                    </x-ui.button>

                </x-ui.form-actions>

            </form>

        </div>

    </div>

@endsection

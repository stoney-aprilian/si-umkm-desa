@extends('layouts.owner')

@section('title', 'Tambah Produk')

@section('content')

    <div class="mx-auto max-w-5xl">

        {{-- ====================================================== --}}
        {{-- Page Header --}}
        {{-- ====================================================== --}}
        <div class="mb-8">

            <x-ui.section-title title="Tambah Produk"
                subtitle="Tambahkan produk baru untuk dipublikasikan pada katalog UMKM Desa." />

        </div>





        {{-- ====================================================== --}}
        {{-- Form Card --}}
        {{-- ====================================================== --}}
        <x-ui.card padding="false" class="overflow-hidden">

            <form action="{{ route('owner.products.store') }}" method="POST" enctype="multipart/form-data">

                @csrf





                {{-- Form Content --}}
                <div class="p-6 md:p-8">

                    @include('owner.products._form')

                </div>





                {{-- Footer --}}
                <div
                    class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 md:flex-row md:items-center md:justify-end md:px-8">

                    <x-ui.button variant="secondary" :href="route('owner.products.index')">

                        Kembali

                    </x-ui.button>

                    <x-ui.button type="submit">

                        Simpan Produk

                    </x-ui.button>

                </div>

            </form>

        </x-ui.card>

    </div>

@endsection

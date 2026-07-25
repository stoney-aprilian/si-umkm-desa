@extends('layouts.admin')

@section('title', 'Tambah Kategori')


@section('content')

<div class="mx-auto max-w-4xl space-y-8">


    {{-- Header --}}
    <x-ui.page-header

        title="Tambah Kategori"

        subtitle="Buat kategori baru untuk mengelompokkan UMKM dan produk agar lebih mudah dikelola.">


    </x-ui.page-header>





    {{-- Form Card --}}
    <x-ui.card
        padding="false"
        class="overflow-hidden">


        <form

            action="{{ route('admin.categories.store') }}"

            method="POST">


            @csrf





            {{-- Form Content --}}
            <div class="p-6 md:p-8">


                @include('admin.categories._form')


            </div>





            {{-- Actions --}}
            <div

                class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 md:flex-row md:items-center md:justify-end md:px-8">


                <x-ui.button

                    variant="secondary"

                    href="{{ route('admin.categories.index') }}">


                    Kembali


                </x-ui.button>





                <x-ui.button

                    type="submit">


                    Simpan


                </x-ui.button>


            </div>



        </form>


    </x-ui.card>


</div>


@endsection

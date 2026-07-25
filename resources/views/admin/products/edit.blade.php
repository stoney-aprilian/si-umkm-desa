@extends('layouts.admin')

@section('title', 'Edit Produk')


@section('content')

    <div class="mx-auto max-w-5xl">


        {{-- Header --}}
        <div class="mb-8">

            <x-ui.section-title title="Edit Produk"
                subtitle="Perbarui informasi produk agar katalog UMKM tetap akurat dan menarik." />

        </div>





        {{-- Form Card --}}
        <x-ui.card class="overflow-hidden">


            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data"
                class="space-y-8">


                @csrf

                @method('PUT')





                {{-- Form Content --}}
                <div class="p-6 md:p-8">


                    @include('admin.products._form')


                </div>





                {{-- Footer Actions --}}
                <div
                    class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 md:flex-row md:items-center md:justify-end md:px-8">



                    <x-ui.button variant="secondary" href="{{ route('admin.products.index') }}">


                        Kembali


                    </x-ui.button>





                    <x-ui.button type="submit">


                        Perbarui Produk


                    </x-ui.button>



                </div>



            </form>


        </x-ui.card>



    </div>


@endsection

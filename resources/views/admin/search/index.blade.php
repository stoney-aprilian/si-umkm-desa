@extends('layouts.admin')


@section('title', 'Pencarian')


@section('content')


<div class="space-y-8">


    <x-ui.page-header
        title="Hasil Pencarian"
        subtitle="Menampilkan hasil pencarian untuk kata kunci: {{ $keyword }}"
    />





    @if(
        $umkms->isEmpty()
        &&
        $products->isEmpty()
        &&
        $categories->isEmpty()
    )


        <x-ui.empty-state
            title="Data tidak ditemukan"
            description="Coba gunakan kata kunci lain."
        />



    @else





        {{-- UMKM --}}
        @if($umkms->count())

        <x-ui.card>


            <x-ui.section-title
                title="UMKM"
                subtitle="Data usaha yang ditemukan"
            />



            <div class="mt-5 space-y-3">


                @foreach($umkms as $umkm)

                    <a
                        href="{{ route('admin.umkms.show', $umkm) }}"
                        class="block rounded-xl border border-slate-200 p-4 transition hover:border-emerald-200 hover:bg-emerald-50">


                        <div class="flex items-start justify-between gap-4">


                            <div>


                                <p class="font-semibold text-slate-900">

                                    {{ $umkm->business_name }}

                                </p>


                                <p class="mt-1 text-sm text-slate-500">

                                    {{ $umkm->address }}

                                </p>


                            </div>



                            @if($umkm->category)

                                <x-ui.badge variant="success">

                                    {{ $umkm->category->name }}

                                </x-ui.badge>

                            @endif


                        </div>


                    </a>


                @endforeach


            </div>


        </x-ui.card>


        @endif







        {{-- Products --}}
        @if($products->count())

        <x-ui.card>


            <x-ui.section-title
                title="Produk"
                subtitle="Produk yang ditemukan"
            />



            <div class="mt-5 space-y-3">


                @foreach($products as $product)


                    <a
                        href="{{ route('admin.products.show', $product) }}"
                        class="block rounded-xl border border-slate-200 p-4 transition hover:border-emerald-200 hover:bg-emerald-50">


                        <p class="font-semibold text-slate-900">

                            {{ $product->name }}

                        </p>



                        @if($product->umkm)

                            <p class="mt-1 text-sm text-slate-500">

                                {{ $product->umkm->business_name }}

                            </p>

                        @endif


                    </a>


                @endforeach


            </div>


        </x-ui.card>


        @endif








        {{-- Categories --}}
        @if($categories->count())

        <x-ui.card>


            <x-ui.section-title
                title="Kategori"
                subtitle="Kategori usaha yang ditemukan"
            />



            <div class="mt-5 flex flex-wrap gap-3">


                @foreach($categories as $category)

                    <x-ui.badge variant="success">

                        {{ $category->name }}

                    </x-ui.badge>


                @endforeach


            </div>


        </x-ui.card>


        @endif




    @endif



</div>


@endsection

@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.public')


@section('title', $product->name)



@section(
    'meta_description',
    Str::limit(strip_tags($product->description ?? ''), 160)
)



@section(
    'og_image',
    $product->image
        ? asset('storage/' . $product->image)
        : asset('images/og-image.jpg')
)



@section('content')



{{-- Product Hero --}}
<section class="public-section">


    <div class="app-container">


        <div class="grid gap-12 lg:grid-cols-2">



            {{-- Product Image --}}
            <div>


                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">


                    @if ($product->image)


                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            loading="lazy"
                            class="aspect-square w-full object-cover">



                    @else


                        <div class="flex aspect-square items-center justify-center bg-slate-100 text-slate-400">


                            <span class="text-sm font-medium">

                                Gambar produk belum tersedia

                            </span>


                        </div>


                    @endif


                </div>


            </div>





            {{-- Product Identity --}}
            <div class="flex flex-col justify-center">



                @if ($product->umkm)


                    <a
                        href="{{ route('public.umkms.show', $product->umkm) }}"
                        class="w-fit text-sm font-semibold text-emerald-600 transition hover:text-emerald-700">


                        {{ $product->umkm->business_name }}


                    </a>


                @endif





                <h1 class="mt-4 text-4xl font-extrabold tracking-tight text-slate-900 lg:text-5xl">


                    {{ $product->name }}


                </h1>




                @if ($product->price)


                    <div class="mt-6">


                        <p class="text-sm font-medium uppercase tracking-wider text-slate-400">

                            Harga Produk

                        </p>



                        <p class="mt-2 text-3xl font-bold text-emerald-600">


                            Rp {{ number_format($product->price,0,',','.') }}


                        </p>


                    </div>


                @endif






                <div class="mt-8">


                    <h2 class="text-lg font-bold text-slate-900">


                        Deskripsi Produk


                    </h2>



                    <p class="mt-4 leading-8 text-slate-600">


                        {{ $product->description ?: 'Belum ada deskripsi produk.' }}


                    </p>


                </div>






                <div class="mt-10 flex flex-wrap gap-4">


                    @if($product->umkm)

                        <a
                            href="{{ route('public.umkms.show', $product->umkm) }}"
                            class="btn-secondary">

                            Lihat Profil UMKM

                        </a>

                    @endif

                    @if($product->umkm?->phone)


                        <a
                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->umkm->phone) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="btn btn-primary">


                            Hubungi WhatsApp


                        </a>


                    @endif


                </div>



            </div>



        </div>


    </div>


</section>

{{-- UMKM Information --}}
<section class="public-section bg-slate-50">


    <div class="app-container">


        <div class="app-card p-8 lg:p-10">


            <x-ui.section-title
                title="Tentang Pelaku UMKM"
                subtitle="Kenali usaha yang menghasilkan produk ini." />



            <div class="mt-10 grid gap-8 md:grid-cols-2">



                {{-- Business Name --}}
                <div>


                    <p class="text-sm font-medium text-slate-500">

                        Nama UMKM

                    </p>


                    <p class="mt-2 font-semibold text-slate-900">


                        {{ $product->umkm?->business_name ?? '-' }}


                    </p>


                </div>





                {{-- Category --}}
                <div>


                    <p class="text-sm font-medium text-slate-500">

                        Kategori Usaha

                    </p>


                    <p class="mt-2 font-semibold text-slate-900">


                        {{ $product->umkm?->category?->name ?? '-' }}


                    </p>


                </div>





                {{-- Address --}}
                <div>


                    <p class="text-sm font-medium text-slate-500">

                        Alamat

                    </p>


                    <p class="mt-2 text-slate-900">


                        {{ $product->umkm?->address ?? '-' }}


                    </p>


                </div>





                {{-- Region --}}
                <div>


                    <p class="text-sm font-medium text-slate-500">

                        Wilayah

                    </p>


                    <p class="mt-2 text-slate-900">


                        {{
                            collect([
                                $product->umkm?->village,
                                $product->umkm?->district,
                                $product->umkm?->regency,
                            ])->filter()->implode(', ')
                        }}


                    </p>


                </div>



            </div>




            @if($product->umkm)


                <div class="mt-10">


                    <a
                        href="{{ route('public.umkms.show', $product->umkm) }}"
                        class="btn-secondary">


                        Lihat Profil Lengkap UMKM


                    </a>


                </div>


            @endif


        </div>


    </div>


</section>





{{-- Explore CTA --}}
<section class="public-section pb-20">


    <div class="app-container">


        <div class="rounded-3xl bg-emerald-600 p-8 text-white lg:p-10">


            <div class="flex flex-col items-center justify-between gap-6 text-center lg:flex-row lg:text-left">


                <div>


                    <h2 class="text-2xl font-bold">


                        Temukan Produk Lokal Lainnya


                    </h2>



                    <p class="mt-3 max-w-xl text-emerald-50">


                        Jelajahi berbagai produk unggulan dari UMKM Desa Salamnunggal.


                    </p>


                </div>




                <a
                    href="{{ route('public.products.index') }}"
                    class="inline-flex items-center justify-center rounded-xl bg-white px-6 py-3 font-semibold text-emerald-700 transition hover:bg-emerald-50">


                    Jelajahi Produk


                </a>


            </div>


        </div>


    </div>


</section>



@endsection

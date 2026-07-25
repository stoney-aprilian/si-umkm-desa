@php
    use Illuminate\Support\Str;
@endphp


@extends('layouts.public')


@section('title', $umkm->business_name)


@section(
    'meta_description',
    Str::limit(strip_tags($umkm->description ?? ''), 160)
)


@section(
    'og_image',
    $umkm->banner
        ? asset('storage/' . $umkm->banner)
        : asset('images/og-image.jpg')
)



@section('content')


{{-- Hero Profile --}}
<section class="relative">


    <div class="relative h-[22rem] overflow-hidden lg:h-[28rem]">


        {{-- Banner --}}
        @if ($umkm->banner)


            <img
                src="{{ asset('storage/' . $umkm->banner) }}"
                alt="{{ $umkm->business_name }}"
                loading="lazy"
                class="h-full w-full object-cover">


        @else


            <div class="h-full bg-gradient-to-br from-emerald-600 to-teal-700"></div>


        @endif



        {{-- Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>




        {{-- Header Content --}}
        <div class="absolute inset-x-0 bottom-0">


            <div class="app-container pb-12">


                <div class="max-w-3xl">


                    <x-ui.badge>


                        {{ $umkm->category?->name ?? 'UMKM Desa' }}


                    </x-ui.badge>




                    <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-white sm:text-5xl">


                        {{ $umkm->business_name }}


                    </h1>



                    <p class="mt-4 flex items-center gap-2 text-white/90">


                        <svg
                            class="h-5 w-5 shrink-0"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">


                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0L6.343 16.657A8 8 0 1117.657 16.657z"/>


                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>


                        </svg>



                        <span>


                            {{
                                collect([
                                    $umkm->village,
                                    $umkm->district,
                                    $umkm->regency,
                                ])->filter()->implode(', ')
                            }}


                        </span>


                    </p>


                </div>


            </div>


        </div>


    </div>


</section>

{{-- Identity Section --}}
<section class="relative -mt-10 pb-16">


    <div class="app-container">


        <div class="grid gap-8 lg:grid-cols-4">



            {{-- Logo Card --}}
            <div class="lg:col-span-1">


                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white p-3 shadow-lg">


                    @if ($umkm->logo)


                        <img
                            src="{{ asset('storage/' . $umkm->logo) }}"
                            alt="{{ $umkm->business_name }}"
                            loading="lazy"
                            class="aspect-square w-full rounded-2xl object-cover">


                    @else


                        <div class="flex aspect-square items-center justify-center rounded-2xl bg-slate-100 text-slate-400">


                            <span class="text-sm font-medium">

                                Logo UMKM

                            </span>


                        </div>


                    @endif


                </div>


            </div>




            {{-- Quick Identity --}}
            <div class="lg:col-span-3">


                <div class="app-card p-8">


                    <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">


                        <div>


                            <p class="text-sm font-medium text-slate-500">

                                Profil UMKM

                            </p>


                            <h2 class="mt-2 text-2xl font-bold text-slate-900">


                                {{ $umkm->business_name }}


                            </h2>


                            <p class="mt-3 text-slate-600">


                                {{ $umkm->category?->name ?? 'Kategori belum tersedia' }}


                            </p>


                        </div>



                        @if($umkm->phone)


                            <a
                                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $umkm->phone) }}"
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


    </div>

</section>

{{-- Business Information --}}
<section class="public-section">


    <div class="app-container">


        <div class="app-card p-8 lg:p-10">


            <x-ui.section-title
                title="Informasi UMKM"
                subtitle="Informasi lengkap mengenai usaha dan kontak pelaku UMKM." />



            <div class="mt-10 grid gap-8 md:grid-cols-2">



                {{-- Category --}}
                <div>


                    <p class="text-sm font-medium text-slate-500">

                        Kategori Usaha

                    </p>


                    <p class="mt-2 font-semibold text-slate-900">

                        {{ $umkm->category?->name ?? '-' }}

                    </p>


                </div>



                {{-- Phone --}}
                <div>


                    <p class="text-sm font-medium text-slate-500">

                        Nomor Telepon

                    </p>


                    <p class="mt-2 font-semibold text-slate-900">

                        {{ $umkm->phone ?: '-' }}

                    </p>


                </div>




                {{-- Address --}}
                <div>


                    <p class="text-sm font-medium text-slate-500">

                        Alamat

                    </p>


                    <p class="mt-2 text-slate-900">

                        {{ $umkm->address ?: '-' }}

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
                                $umkm->village,
                                $umkm->district,
                                $umkm->regency,
                            ])->filter()->implode(', ')
                        }}


                    </p>


                </div>



            </div>


        </div>


    </div>


</section>





{{-- About --}}
<section class="public-section">


    <div class="app-container">


        <x-ui.section-title
            title="Tentang UMKM"
            subtitle="Kenali lebih dekat usaha dan cerita di balik produk yang dihasilkan." />



        <div class="app-card p-8 lg:p-10">


            <p class="leading-8 text-slate-700">


                {{
                    $umkm->description
                    ?: 'Belum ada deskripsi mengenai UMKM ini.'
                }}


            </p>


        </div>


    </div>


</section>





{{-- Products --}}
<section class="public-section bg-slate-50">


    <div class="app-container">


        <x-ui.section-title
            title="Produk UMKM"
            subtitle="Produk yang tersedia dari pelaku usaha ini." />



        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">


            @forelse ($umkm->products->take(6) as $product)


                <x-product.card
                    :product="$product" />


            @empty


                <div class="col-span-full">


                    <x-ui.empty-state
                        title="Belum Ada Produk"
                        description="UMKM ini belum menambahkan produk ke dalam platform." />


                </div>


            @endforelse


        </div>



    </div>


</section>


{{-- Location --}}
@if ($umkm->maps_url)


<section class="public-section">


    <div class="app-container">


        <x-ui.section-title
            title="Lokasi UMKM"
            subtitle="Temukan lokasi usaha melalui peta digital." />



        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">


            <iframe
                src="{{ $umkm->maps_url }}"
                class="h-[450px] w-full"
                loading="lazy"
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade">

            </iframe>


        </div>


    </div>


</section>


@endif





{{-- Explore More CTA --}}
<section class="public-section pb-20">


    <div class="app-container">


        <div class="rounded-3xl bg-slate-100 p-8 lg:p-10">


            <div class="flex flex-col items-center justify-between gap-6 text-center lg:flex-row lg:text-left">


                <div>


                    <h2 class="text-2xl font-bold tracking-tight text-slate-900">


                        Jelajahi UMKM Desa Lainnya


                    </h2>



                    <p class="mt-3 max-w-xl text-slate-600">


                        Temukan lebih banyak pelaku usaha lokal dan
                        produk unggulan dari Desa Salamnunggal.


                    </p>


                </div>




                <div class="flex flex-wrap justify-center gap-3 lg:justify-end">


                    <a
                        href="{{ route('public.umkms.index') }}"
                        class="btn-secondary">


                        Lihat Semua UMKM


                    </a>




                    <a
                        href="{{ route('public.products.index') }}"
                        class="btn btn-primary">


                        Jelajahi Produk


                    </a>


                </div>


            </div>


        </div>


    </div>


</section>

@endsection

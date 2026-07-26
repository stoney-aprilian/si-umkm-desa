@extends('layouts.public')

@section('title', 'Tentang')

@section('meta_description', 'Mengenal Sistem Informasi UMKM Desa Salamnunggal sebagai platform digital untuk mendukung
    promosi dan pengembangan UMKM lokal.')

@section('content')

    {{-- ====================================================== --}}
    {{-- Hero --}}
    {{-- ====================================================== --}}
    <section class="bg-gradient-to-br from-emerald-600 via-emerald-500 to-teal-600 py-24 text-white">

        <div class="app-container text-center">

            <x-ui.badge variant="secondary">

                Sistem Informasi UMKM Desa

            </x-ui.badge>

            <h1 class="mt-6 text-4xl font-extrabold tracking-tight md:text-5xl lg:text-6xl">

                Mengenal SI UMKM Desa

            </h1>

            <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-emerald-100">

                Platform digital yang dirancang untuk membantu masyarakat mengenal
                UMKM lokal, memperluas promosi produk, dan mendukung pertumbuhan
                ekonomi Desa Salamnunggal melalui transformasi digital.

            </p>

        </div>

    </section>





    {{-- ====================================================== --}}
    {{-- About --}}
    {{-- ====================================================== --}}
    <section class="py-20">

        <div class="app-container">

            <div class="grid gap-10 lg:grid-cols-2">

                <div>

                    <x-ui.section-title title="Apa itu SI UMKM Desa?"
                        subtitle="Platform informasi digital yang mempertemukan masyarakat dengan UMKM lokal." />

                    <div class="mt-8 space-y-6 leading-8 text-slate-600">

                        <p>

                            SI UMKM Desa merupakan media informasi digital yang
                            menghadirkan profil UMKM, produk unggulan, lokasi usaha,
                            serta informasi kontak pelaku usaha dalam satu platform
                            yang mudah diakses.

                        </p>

                        <p>

                            Platform ini dikembangkan untuk membantu pelaku UMKM
                            memperluas jangkauan promosi sekaligus memudahkan
                            masyarakat menemukan produk lokal yang berkualitas.

                        </p>

                        <p>

                            Melalui digitalisasi informasi, diharapkan UMKM desa
                            dapat berkembang, dikenal lebih luas, dan memberikan
                            kontribusi nyata terhadap pertumbuhan ekonomi lokal.

                        </p>

                    </div>

                </div>





                <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <h2 class="text-2xl font-bold text-slate-900">

                        Tujuan Platform

                    </h2>

                    <div class="mt-8 space-y-6">

                        <div class="flex gap-4">

                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-xl">

                                🌱

                            </div>

                            <div>

                                <h3 class="font-semibold text-slate-900">

                                    Mendukung UMKM Lokal

                                </h3>

                                <p class="mt-1 leading-7 text-slate-600">

                                    Memberikan media promosi digital bagi pelaku
                                    usaha lokal.

                                </p>

                            </div>

                        </div>





                        <div class="flex gap-4">

                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-xl">

                                📱

                            </div>

                            <div>

                                <h3 class="font-semibold text-slate-900">

                                    Digitalisasi Desa

                                </h3>

                                <p class="mt-1 leading-7 text-slate-600">

                                    Menyediakan akses informasi UMKM secara cepat,
                                    mudah, dan modern.

                                </p>

                            </div>

                        </div>





                        <div class="flex gap-4">

                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-xl">

                                🤝

                            </div>

                            <div>

                                <h3 class="font-semibold text-slate-900">

                                    Menghubungkan UMKM dan Masyarakat

                                </h3>

                                <p class="mt-1 leading-7 text-slate-600">

                                    Memudahkan masyarakat menemukan berbagai produk
                                    unggulan Desa Salamnunggal.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>





    {{-- ====================================================== --}}
    {{-- Features --}}
    {{-- ====================================================== --}}
    <section class="bg-slate-50 py-20">

        <div class="app-container">

            <x-ui.section-title title="Fitur Utama"
                subtitle="Beberapa layanan yang dapat digunakan masyarakat melalui platform ini." />

            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">

                @foreach ([['Daftar UMKM', 'Informasi lengkap mengenai pelaku usaha lokal yang telah terdaftar.'], ['Produk Lokal', 'Jelajahi berbagai produk unggulan hasil karya UMKM desa.'], ['Lokasi UMKM', 'Temukan lokasi usaha melalui integrasi Google Maps.'], ['Kontak Langsung', 'Hubungi pelaku UMKM secara langsung melalui WhatsApp.']] as [$title, $desc])
                    <div
                        class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg">

                        <h3 class="text-lg font-bold text-slate-900">

                            {{ $title }}

                        </h3>

                        <p class="mt-3 leading-7 text-slate-600">

                            {{ $desc }}

                        </p>

                    </div>
                @endforeach

            </div>

        </div>

    </section>





    {{-- ====================================================== --}}
    {{-- CTA --}}
    {{-- ====================================================== --}}
    <section class="pb-24 pt-20">

        <div class="app-container">

            <div class="rounded-[2rem] bg-gradient-to-r from-emerald-600 to-teal-600 px-10 py-12 text-white">

                <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                    <div>

                        <h2 class="text-3xl font-bold">

                            Mari Dukung UMKM Lokal

                        </h2>

                        <p class="mt-3 max-w-2xl leading-8 text-emerald-100">

                            Bersama-sama kita dapat membantu memperkenalkan produk
                            lokal, mendukung pelaku UMKM, dan mendorong pertumbuhan
                            ekonomi Desa Salamnunggal.

                        </p>

                    </div>

                    <div class="flex flex-wrap gap-3">

                        <x-ui.button href="{{ route('public.umkms.index') }}" variant="secondary">

                            Jelajahi UMKM

                        </x-ui.button>

                        <x-ui.button href="{{ route('public.products.index') }}">

                            Lihat Produk

                        </x-ui.button>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection

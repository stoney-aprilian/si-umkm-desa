@extends('layouts.public')

@section('title', 'Tentang')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-emerald-600 via-emerald-500 to-emerald-700 py-20 text-white">

        <div class="app-container text-center">

            <h1 class="text-4xl font-bold tracking-tight md:text-5xl">

                Tentang SI UMKM Desa

            </h1>

            <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-emerald-100">

                SI UMKM Desa merupakan platform digital yang dirancang untuk
                membantu masyarakat mengenal berbagai UMKM lokal,
                memperluas jangkauan promosi, serta mendukung pertumbuhan ekonomi desa
                melalui transformasi digital.

            </p>

        </div>

    </section>

    {{-- About --}}
    <section class="bg-slate-50 py-20">

        <div class="app-container">

            <div class="grid gap-12 lg:grid-cols-2">

                <div>

                    <x-ui.section-title
                        title="Apa itu SI UMKM Desa?"
                        subtitle="Mengenal lebih dekat platform digital UMKM desa." />

                    <div class="mt-8 space-y-6 leading-8 text-slate-600">

                        <p>

                            Website ini menjadi pusat informasi berbagai
                            Usaha Mikro, Kecil, dan Menengah (UMKM)
                            yang berada di desa.

                        </p>

                        <p>

                            Melalui platform ini masyarakat dapat
                            melihat profil UMKM,
                            menjelajahi produk,
                            mengetahui lokasi usaha,
                            hingga menghubungi pelaku UMKM secara langsung.

                        </p>

                        <p>

                            Sistem ini dikembangkan sebagai bagian dari
                            upaya digitalisasi desa agar UMKM memiliki
                            media promosi yang modern, mudah diakses,
                            dan mampu menjangkau pasar yang lebih luas.

                        </p>

                    </div>

                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">

                    <h2 class="text-2xl font-semibold text-slate-900">

                        Tujuan Platform

                    </h2>

                    <div class="mt-8 space-y-5">

                        <div class="flex gap-4">

                            <span class="text-2xl">🌱</span>

                            <div>

                                <h3 class="font-semibold text-slate-900">

                                    Mendukung UMKM Lokal

                                </h3>

                                <p class="mt-1 text-slate-600">

                                    Membantu UMKM memperoleh media promosi digital.

                                </p>

                            </div>

                        </div>

                        <div class="flex gap-4">

                            <span class="text-2xl">📱</span>

                            <div>

                                <h3 class="font-semibold text-slate-900">

                                    Digitalisasi Desa

                                </h3>

                                <p class="mt-1 text-slate-600">

                                    Menyediakan layanan informasi yang mudah diakses masyarakat.

                                </p>

                            </div>

                        </div>

                        <div class="flex gap-4">

                            <span class="text-2xl">🤝</span>

                            <div>

                                <h3 class="font-semibold text-slate-900">

                                    Menghubungkan Penjual & Pembeli

                                </h3>

                                <p class="mt-1 text-slate-600">

                                    Mempermudah masyarakat menemukan produk unggulan desa.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- Features --}}
    <section class="py-20">

        <div class="app-container">

            <x-ui.section-title
                title="Apa yang Bisa Anda Temukan?"
                subtitle="Beberapa fitur utama yang tersedia di website ini." />

            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <h3 class="font-semibold text-slate-900">

                        Daftar UMKM

                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-600">

                        Informasi lengkap berbagai UMKM yang telah terdaftar.

                    </p>

                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <h3 class="font-semibold text-slate-900">

                        Produk UMKM

                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-600">

                        Jelajahi produk unggulan dari pelaku usaha lokal.

                    </p>

                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <h3 class="font-semibold text-slate-900">

                        Lokasi UMKM

                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-600">

                        Temukan lokasi usaha melalui Google Maps.

                    </p>

                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <h3 class="font-semibold text-slate-900">

                        Kontak Langsung

                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-600">

                        Hubungi pelaku UMKM melalui WhatsApp.

                    </p>

                </div>

            </div>

        </div>

    </section>

    {{-- CTA --}}
    <section class="bg-slate-900 py-20 text-center text-white">

        <div class="app-container">

            <h2 class="text-3xl font-bold">

                Mari Dukung UMKM Lokal

            </h2>

            <p class="mx-auto mt-4 max-w-2xl leading-8 text-slate-300">

                Dengan membeli produk lokal dan mengenalkan UMKM desa,
                kita turut berkontribusi terhadap pertumbuhan ekonomi masyarakat.

            </p>

            <div class="mt-10 flex flex-wrap justify-center gap-4">

                <a
                    href="{{ route('public.umkms.index') }}"
                    class="rounded-xl bg-emerald-600 px-6 py-3 font-medium text-white transition hover:bg-emerald-700">

                    Jelajahi UMKM

                </a>

                <a
                    href="{{ route('public.products.index') }}"
                    class="rounded-xl border border-white px-6 py-3 font-medium transition hover:bg-white hover:text-slate-900">

                    Lihat Produk

                </a>

            </div>

        </div>

    </section>

@endsection

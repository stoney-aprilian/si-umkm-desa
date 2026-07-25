@extends('layouts.admin')


@section('title', 'Dashboard')


@section('content')

    <div class="space-y-10">


        {{-- Header --}}
        <x-ui.page-header title="Dashboard"
            subtitle="Selamat datang kembali, {{ auth()->user()->name }}. Berikut ringkasan data Sistem Informasi UMKM Desa.">

            <x-ui.button href="{{ route('admin.umkms.create') }}" variant="primary">
                Tambah UMKM
            </x-ui.button>

        </x-ui.page-header>



        {{-- Statistics --}}
        <section>

            <div class="kpi-row">


                <x-ui.stat-card title="Total Pengguna" :value="$statistics['users']" description="Administrator dan pemilik UMKM">
                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5V4H2v16h5m10 0v-2a4 4 0 00-8 0v2m8 0H9m8-10a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>



                <x-ui.stat-card title="Total Kategori" :value="$statistics['categories']" description="Kategori usaha UMKM">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7h18M3 12h18M3 17h18" />
                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>



                <x-ui.stat-card title="Total UMKM" :value="$statistics['umkms']" description="UMKM terdaftar">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 21h18M5 21V9l7-6 7 6v12" />
                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>



                <x-ui.stat-card title="Total Produk" :value="$statistics['products']" description="Produk dipublikasikan">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V7a2 2 0 00-2-2h-3V3H9v2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4" />
                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>


            </div>

        </section>




        {{-- Quick Management --}}
        <section>

            <x-ui.card>


                <x-ui.section-title title="Manajemen Cepat" subtitle="Akses fitur utama administrasi data UMKM." />



                <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">


                    <a href="{{ route('admin.umkms.index') }}"
                        class="group rounded-xl border border-slate-200 bg-white p-6 transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:bg-emerald-50 hover:shadow-md">


                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 21h18M5 21V9l7-6 7 6v12" />

                            </svg>

                        </div>


                        <h3 class="mt-5 text-lg font-bold text-slate-900">
                            Kelola UMKM
                        </h3>


                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Kelola data pelaku usaha yang terdaftar dalam sistem.
                        </p>


                    </a>




                    <a href="{{ route('admin.products.index') }}"
                        class="group rounded-xl border border-slate-200 bg-white p-6 transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:bg-emerald-50 hover:shadow-md">


                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7L12 3 4 7l8 4 8-4zM4 9v8l8 4 8-4V9" />

                            </svg>

                        </div>


                        <h3 class="mt-5 text-lg font-bold text-slate-900">
                            Kelola Produk
                        </h3>


                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Atur katalog produk unggulan UMKM desa.
                        </p>


                    </a>




                    <a href="{{ route('admin.categories.index') }}"
                        class="group rounded-xl border border-slate-200 bg-white p-6 transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:bg-emerald-50 hover:shadow-md">


                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h6l2 2h10v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                            </svg>

                        </div>


                        <h3 class="mt-5 text-lg font-bold text-slate-900">
                            Kelola Kategori
                        </h3>


                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Kelola struktur kategori usaha UMKM.
                        </p>


                    </a>


                </div>


            </x-ui.card>


        </section>





        {{-- System Overview --}}
        <section>

            <x-ui.card>

                <div>

                    <x-ui.section-title title="Ringkasan Sistem" subtitle="Informasi kondisi dan fungsi utama platform." />

                    <p class="mt-6 max-w-3xl leading-7 text-slate-600">

                        Sistem Informasi UMKM Desa digunakan untuk mengelola,
                        mendokumentasikan, dan mempublikasikan data UMKM,
                        kategori usaha, serta produk unggulan desa secara
                        terpusat.

                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">

                        <x-ui.badge variant="success">
                            Sistem Aktif
                        </x-ui.badge>

                        <x-ui.badge variant="secondary">
                            Laravel 12
                        </x-ui.badge>

                        <x-ui.badge variant="secondary">
                            Tailwind CSS
                        </x-ui.badge>

                    </div>

                </div>

            </x-ui.card>

        </section>





        {{-- Activity --}}
        <section>

            <x-ui.card>


                <x-ui.section-title title="Aktivitas Terbaru" subtitle="Ringkasan perubahan data terbaru dalam sistem." />



                @if (isset($activities) && count($activities))


                    <div class="mt-6 space-y-6">


                        @foreach ($activities as $activity)
                            <div class="border-b border-slate-100 py-5 last:border-0">

                                <h3 class="font-semibold text-slate-900">
                                    {{ $activity['title'] ?? 'Aktivitas Sistem' }}
                                </h3>

                                <p class="mt-2 text-sm text-slate-500">
                                    {{ $activity['description'] ?? '' }}
                                </p>

                            </div>
                        @endforeach


                    </div>
                @else
                    <x-ui.empty-state title="Belum ada aktivitas terbaru."
                        description="Aktivitas pengelolaan data akan muncul di sini." />


                @endif


            </x-ui.card>


        </section>


    </div>


@endsection

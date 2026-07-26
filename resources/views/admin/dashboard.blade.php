@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="space-y-8">

        {{-- ========================================= --}}
        {{-- Dashboard Header --}}
        {{-- ========================================= --}}
        <x-ui.page-header title="Dashboard"
            subtitle="Selamat datang kembali, {{ auth()->user()->name }}. Berikut ringkasan kondisi Sistem Informasi UMKM Desa hari ini.">

            <x-ui.action-group>

                <x-ui.button href="{{ route('admin.umkms.create') }}">

                    Tambah UMKM

                </x-ui.button>

            </x-ui.action-group>

        </x-ui.page-header>



        {{-- ========================================= --}}
        {{-- Quick Actions --}}
        {{-- ========================================= --}}
        <section>

            <x-ui.section-title title="Akses Cepat"
                subtitle="Kelola data utama sistem tanpa harus membuka menu satu per satu." />

            <div class="mt-6 grid gap-5 md:grid-cols-3">

                <x-ui.quick-action href="{{ route('admin.umkms.index') }}" title="Kelola UMKM"
                    description="Tambah, ubah, dan kelola seluruh data UMKM.">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 21h18M5 21V9l7-6 7 6v12" />

                        </svg>

                    </x-slot:icon>

                </x-ui.quick-action>

                <x-ui.quick-action href="{{ route('admin.products.index') }}" title="Kelola Produk"
                    description="Atur katalog produk yang ditampilkan kepada masyarakat.">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7L12 3 4 7l8 4 8-4zM4 9v8l8 4 8-4V9" />

                        </svg>

                    </x-slot:icon>

                </x-ui.quick-action>

                <x-ui.quick-action href="{{ route('admin.categories.index') }}" title="Kelola Kategori"
                    description="Susun kategori usaha agar data lebih terstruktur.">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7h6l2 2h10v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                        </svg>

                    </x-slot:icon>

                </x-ui.quick-action>

            </div>

        </section>



        {{-- ========================================= --}}
        {{-- Analytics --}}
        {{-- ========================================= --}}
        <section>

            <x-ui.section-title title="Ringkasan Data" subtitle="Statistik utama yang tersimpan pada sistem." />

            <div class="mt-6 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

                <x-ui.stat-card title="Total UMKM" :value="$statistics['umkms']" description="UMKM yang telah terdaftar">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 21h18M5 21V9l7-6 7 6v12" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>

                <x-ui.stat-card title="Total Produk" :value="$statistics['products']" description="Produk yang dipublikasikan">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V7a2 2 0 00-2-2h-3V3H9v2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>

                <x-ui.stat-card title="Total Kategori" :value="$statistics['categories']" description="Kategori usaha">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7h18M3 12h18M3 17h18" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>

                <x-ui.stat-card title="Total Pengguna" :value="$statistics['users']" description="Administrator & Owner">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5V4H2v16h5m10 0v-2a4 4 0 00-8 0v2m8 0H9m8-10a4 4 0 11-8 0 4 4 0 018 0z" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>

            </div>

        </section>

        {{-- ========================================= --}}
        {{-- Workspace --}}
        {{-- ========================================= --}}
        <section>

            <div class="grid gap-6 xl:grid-cols-3">

                {{-- ========================================= --}}
                {{-- Activity --}}
                {{-- ========================================= --}}
                <div class="xl:col-span-2">

                    <x-ui.card>

                        <x-ui.section-title title="Aktivitas Terbaru"
                            subtitle="Perubahan terbaru yang terjadi pada sistem." />

                        @if (isset($activities) && count($activities))

                            <div class="mt-8 space-y-6">

                                @foreach ($activities as $activity)
                                    <div class="relative flex gap-4">

                                        <div class="flex flex-col items-center">

                                            <div
                                                class="flex h-10 w-10 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600">

                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />

                                                </svg>

                                            </div>

                                            @unless ($loop->last)
                                                <div class="mt-2 h-full w-px bg-slate-200">

                                                </div>
                                            @endunless

                                        </div>

                                        <div class="flex-1 rounded-2xl border border-slate-100 bg-slate-50 p-5">

                                            <h3 class="font-semibold text-slate-900">

                                                {{ $activity['title'] ?? 'Aktivitas Sistem' }}

                                            </h3>

                                            <p class="mt-2 text-sm leading-6 text-slate-500">

                                                {{ $activity['description'] ?? '' }}

                                            </p>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        @else
                            <div class="mt-6">

                                <x-ui.empty-state title="Belum ada aktivitas"
                                    description="Aktivitas administrasi akan muncul di sini setelah pengguna mulai menggunakan sistem." />

                            </div>

                        @endif

                    </x-ui.card>

                </div>



                {{-- ========================================= --}}
                {{-- System --}}
                {{-- ========================================= --}}
                <div>

                    <x-ui.card>

                        <x-ui.section-title title="Ringkasan Sistem" subtitle="Status platform saat ini." />

                        <div class="mt-8 space-y-5">

                            <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-5">

                                <div class="flex items-center justify-between">

                                    <div>

                                        <p class="text-sm font-medium text-emerald-700">

                                            Status Sistem

                                        </p>

                                        <p class="mt-1 text-lg font-bold text-emerald-900">

                                            Berjalan Normal

                                        </p>

                                    </div>

                                    <span class="h-3 w-3 rounded-full bg-emerald-500">

                                    </span>

                                </div>

                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                                <dl class="space-y-4 text-sm">

                                    <div class="flex items-center justify-between">

                                        <dt class="text-slate-500">

                                            Framework

                                        </dt>

                                        <dd class="font-semibold text-slate-900">

                                            Laravel {{ app()->version() }}

                                        </dd>

                                    </div>

                                    <div class="flex items-center justify-between">

                                        <dt class="text-slate-500">

                                            UI

                                        </dt>

                                        <dd class="font-semibold text-slate-900">

                                            Tailwind CSS

                                        </dd>

                                    </div>

                                    <div class="flex items-center justify-between">

                                        <dt class="text-slate-500">

                                            Build

                                        </dt>

                                        <dd class="font-semibold text-slate-900">

                                            v{{ config('app.version', '1.0.0') }}

                                        </dd>

                                    </div>

                                </dl>

                            </div>

                            <div>

                                <x-ui.badge variant="success">

                                    Sistem Aktif

                                </x-ui.badge>

                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-white p-5">

                                <h3 class="font-semibold text-slate-900">

                                    Tentang SI UMKM Desa

                                </h3>

                                <p class="mt-3 text-sm leading-6 text-slate-500">

                                    Platform ini membantu pemerintah desa dalam
                                    mengelola data UMKM, kategori usaha, dan produk
                                    unggulan secara terpusat sehingga informasi
                                    dapat dipublikasikan dengan lebih efektif.

                                </p>

                            </div>

                        </div>

                    </x-ui.card>

                </div>

            </div>

        </section>

    </div>

@endsection

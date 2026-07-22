@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <x-ui.page-header
        title="Dashboard"
        subtitle="Selamat datang kembali, {{ auth()->user()->name }}. Berikut ringkasan data Sistem Informasi UMKM Desa.">
    </x-ui.page-header>

    {{-- Statistics --}}
    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">

        <x-ui.card>

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Total Pengguna
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-gray-900">

                        {{ $statistics['users'] }}

                    </h2>

                    <p class="mt-2 text-sm text-gray-500">
                        Administrator & pemilik UMKM
                    </p>

                </div>

                <div class="rounded-xl bg-blue-50 p-3">

                    <svg class="h-6 w-6 text-blue-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 20h5V4H2v16h5m10 0v-2a4 4 0 00-8 0v2m8 0H9m8-10a4 4 0 11-8 0 4 4 0 018 0z"/>

                    </svg>

                </div>

            </div>

        </x-ui.card>

        <x-ui.card>

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Total Kategori
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-gray-900">

                        {{ $statistics['categories'] }}

                    </h2>

                    <p class="mt-2 text-sm text-gray-500">
                        Kategori usaha UMKM
                    </p>

                </div>

                <div class="rounded-xl bg-green-50 p-3">

                    <svg class="h-6 w-6 text-green-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 7h18M3 12h18M3 17h18"/>

                    </svg>

                </div>

            </div>

        </x-ui.card>

        <x-ui.card>

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Total UMKM
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-gray-900">

                        {{ $statistics['umkms'] }}

                    </h2>

                    <p class="mt-2 text-sm text-gray-500">
                        UMKM terdaftar
                    </p>

                </div>

                <div class="rounded-xl bg-amber-50 p-3">

                    <svg class="h-6 w-6 text-amber-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 21h18M5 21V9l7-6 7 6v12"/>

                    </svg>

                </div>

            </div>

        </x-ui.card>

        <x-ui.card>

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Total Produk
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-gray-900">

                        {{ $statistics['products'] }}

                    </h2>

                    <p class="mt-2 text-sm text-gray-500">
                        Produk dipublikasikan
                    </p>

                </div>

                <div class="rounded-xl bg-purple-50 p-3">

                    <svg class="h-6 w-6 text-purple-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 13V7a2 2 0 00-2-2h-3V3H9v2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4"/>

                    </svg>

                </div>

            </div>

        </x-ui.card>

    </div>

    {{-- Information --}}
    <x-ui.card>

        <h2 class="text-lg font-semibold text-gray-900">

            Ringkasan Sistem

        </h2>

        <p class="mt-3 leading-7 text-gray-600">

            Sistem Informasi UMKM Desa digunakan untuk mendigitalisasi data UMKM,
            kategori usaha, dan produk secara terpusat. Melalui dashboard ini,
            administrator dapat memantau data utama serta mengelola seluruh
            informasi yang akan ditampilkan kepada masyarakat.

        </p>

    </x-ui.card>

</div>

@endsection

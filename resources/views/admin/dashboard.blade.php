@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Dashboard
    </h1>

    <p class="mt-2 text-slate-500">
        Selamat datang kembali,
        <span class="font-semibold">{{ auth()->user()->name }}</span>.
    </p>

</div>

<div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">

    {{-- Users --}}
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Total Users
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    {{ $statistics['users'] }}
                </h2>

            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-xl">
                👤
            </div>

        </div>

    </div>

    {{-- Categories --}}
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Total Kategori
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    {{ $statistics['categories'] }}
                </h2>

            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-xl">
                📂
            </div>

        </div>

    </div>

    {{-- UMKM --}}
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Total UMKM
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    {{ $statistics['umkms'] }}
                </h2>

            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-xl">
                🏪
            </div>

        </div>

    </div>

    {{-- Products --}}
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Total Produk
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    {{ $statistics['products'] }}
                </h2>

            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-xl">
                📦
            </div>

        </div>

    </div>

</div>

<div class="mt-8 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

    <h2 class="text-lg font-semibold text-slate-800">
        Ringkasan Sistem
    </h2>

    <p class="mt-2 leading-relaxed text-slate-600">
        Sistem Informasi UMKM Desa digunakan untuk mengelola data kategori,
        UMKM, dan produk secara terpusat. Dashboard ini menjadi pusat
        monitoring aktivitas administrator.
    </p>

</div>

@endsection

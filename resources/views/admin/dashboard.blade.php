@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">
        Dashboard
    </h1>

    <p class="mt-2 text-slate-500">
        Selamat datang kembali, <span class="font-semibold">{{ auth()->user()->name }}</span>.
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    <!-- Users -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Total Users
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    {{ $totalUsers }}
                </h2>

            </div>

            <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-xl">
                👤
            </div>

        </div>

    </div>

    <!-- Categories -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Total Kategori
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    {{ $totalCategories }}
                </h2>

            </div>

            <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-xl">
                📂
            </div>

        </div>

    </div>

    <!-- UMKM -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Total UMKM
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    {{ $totalUmkms }}
                </h2>

            </div>

            <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center text-xl">
                🏪
            </div>

        </div>

    </div>

    <!-- Products -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-slate-500">
                    Total Produk
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    {{ $totalProducts }}
                </h2>

            </div>

            <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center text-xl">
                📦
            </div>

        </div>

    </div>

</div>

<div class="mt-8 bg-white rounded-xl shadow-sm border border-slate-200 p-6">

    <h2 class="text-lg font-semibold text-slate-800">
        Ringkasan Sistem
    </h2>

    <p class="mt-2 text-slate-600 leading-relaxed">
        Sistem Informasi UMKM Desa digunakan untuk mengelola data kategori, UMKM, dan produk secara terpusat. Dashboard ini akan menjadi pusat monitoring seluruh aktivitas administrator.
    </p>

</div>

@endsection

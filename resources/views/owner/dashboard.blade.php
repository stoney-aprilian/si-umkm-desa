@extends('layouts.owner')

@section('title', 'Dashboard')

@section('content')

    <section class="space-y-6">

        {{-- Page Header --}}
        <div>

            <h1 class="text-3xl font-bold tracking-tight text-slate-900">
                Dashboard Owner
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Selamat datang kembali. Kelola UMKM Anda melalui dashboard ini.
            </p>

        </div>

        {{-- Welcome Card --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-slate-900">
                Selamat Datang 👋
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-600">
                Anda berhasil masuk sebagai <strong>Owner UMKM</strong>.
                Gunakan menu di samping untuk mengelola produk, informasi usaha,
                serta melihat perkembangan UMKM Anda.
            </p>

        </div>

    </section>

@endsection

@extends('layouts.admin')

@section('title', 'Tambah UMKM')

@section('content')

<div class="max-w-5xl">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">
            Tambah UMKM
        </h1>

        <p class="text-slate-500 mt-1">
            Tambahkan data UMKM baru.
        </p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

        <form action="{{ route('admin.umkms.store') }}" method="POST">

            @csrf

            @include('admin.umkms._form')

            <div class="mt-8 flex gap-3">

                <button
                    class="px-5 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700">

                    Simpan

                </button>

                <a
                    href="{{ route('admin.umkms.index') }}"
                    class="px-5 py-2 rounded-lg border">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection

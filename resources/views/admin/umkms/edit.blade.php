@extends('layouts.admin')

@section('title', 'Edit UMKM')

@section('content')

<div class="max-w-5xl">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">
            Edit UMKM
        </h1>

        <p class="text-slate-500 mt-1">
            Perbarui data UMKM.
        </p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

        <form action="{{ route('admin.umkms.update', $umkm) }}" method="POST">

            @csrf
            @method('PUT')

            @include('admin.umkms._form')

            <div class="mt-8 flex gap-3">

                <button
                    class="px-5 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700">

                    Update

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

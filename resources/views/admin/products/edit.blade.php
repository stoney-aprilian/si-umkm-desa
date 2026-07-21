@extends('layouts.admin')

@section('title','Edit Produk')

@section('content')

<div class="max-w-5xl">

    <div class="mb-6">

        <h1 class="text-2xl font-bold">
            Edit Produk
        </h1>

        <p class="text-slate-500">
            Perbarui data produk.
        </p>

    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">

        <form action="{{ route('admin.products.update',$product) }}" method="POST">

            @csrf
            @method('PUT')

            @include('admin.products._form')

            <div class="mt-8 flex gap-3">

                <button
                    class="px-5 py-2 rounded-lg bg-emerald-600 text-white">

                    Update

                </button>

                <a
                    href="{{ route('admin.products.index') }}"
                    class="px-5 py-2 rounded-lg border">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection

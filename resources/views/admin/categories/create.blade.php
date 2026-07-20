@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')

<div class="max-w-3xl">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">
            Tambah Kategori
        </h1>

        <p class="text-slate-500 mt-1">
            Tambahkan kategori baru untuk UMKM.
        </p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

        <form action="{{ route('admin.categories.store') }}" method="POST">

            @csrf

            <div class="space-y-6">

                <div>
                    <label class="block mb-2 font-medium">
                        Nama Kategori
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full rounded-lg border-slate-300"
                        required>

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>

                    <label class="block mb-2 font-medium">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="w-full rounded-lg border-slate-300">{{ old('description') }}</textarea>

                </div>

                <div>

                    <label class="inline-flex items-center gap-2">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            checked>

                        <span>Aktif</span>

                    </label>

                </div>

            </div>

            <div class="mt-8 flex gap-3">

                <button
                    class="px-5 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700">

                    Simpan

                </button>

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="px-5 py-2 rounded-lg border">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection

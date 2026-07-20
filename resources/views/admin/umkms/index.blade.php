@extends('layouts.admin')

@section('title', 'Data UMKM')

@section('content')

<div class="space-y-6">

    <div class="flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Data UMKM
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola seluruh data UMKM Desa.
            </p>
        </div>

        <a href="{{ route('admin.umkms.create') }}"
            class="px-5 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700">

            + Tambah UMKM

        </a>

    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm">

        <div class="p-5 border-b">

            <form method="GET">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama UMKM..."
                    class="w-full rounded-lg border-slate-300">

            </form>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-5 py-3 text-left">No</th>
                        <th class="px-5 py-3 text-left">Nama UMKM</th>
                        <th class="px-5 py-3 text-left">Kategori</th>
                        <th class="px-5 py-3 text-left">Owner</th>
                        <th class="px-5 py-3 text-left">Status</th>
                        <th class="px-5 py-3 text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($umkms as $umkm)

                    <tr class="border-t">

                        <td class="px-5 py-4">
                            {{ $loop->iteration + ($umkms->currentPage()-1) * $umkms->perPage() }}
                        </td>

                        <td class="px-5 py-4">

                            <div class="font-semibold">
                                {{ $umkm->business_name }}
                            </div>

                            <div class="text-sm text-slate-500">
                                {{ $umkm->phone }}
                            </div>

                        </td>

                        <td class="px-5 py-4">
                            {{ $umkm->category->name ?? '-' }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $umkm->user->name ?? '-' }}
                        </td>

                        <td class="px-5 py-4">

                            @if($umkm->is_active)

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                    Aktif
                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                    Nonaktif
                                </span>

                            @endif

                        </td>

                        <td class="px-5 py-4">

                            <div class="flex justify-center gap-4">

                                <a href="{{ route('admin.umkms.edit', $umkm) }}"
                                    class="text-blue-600 hover:underline">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('admin.umkms.destroy', $umkm) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus UMKM ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="text-red-600 hover:underline">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-10 text-slate-500">

                            Belum ada data UMKM.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        @if($umkms->hasPages())

            <div class="p-5 border-t">

                {{ $umkms->links() }}

            </div>

        @endif

    </div>

</div>

@endsection

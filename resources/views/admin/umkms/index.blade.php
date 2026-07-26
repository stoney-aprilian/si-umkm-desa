@extends('layouts.admin')

@section('title', 'Manajemen UMKM')


@section('content')

    <div class="space-y-8">

        {{-- ====================================================== --}}
        {{-- Header --}}
        {{-- ====================================================== --}}
        <x-ui.page-header title="Manajemen UMKM"
            subtitle="Kelola seluruh data UMKM yang terdaftar pada Sistem Informasi UMKM Desa, mulai dari identitas usaha hingga status publikasinya.">

            <x-ui.button href="{{ route('admin.umkms.create') }}">

                Tambah UMKM

            </x-ui.button>

        </x-ui.page-header>



        {{-- ====================================================== --}}
        {{-- Statistics --}}
        {{-- ====================================================== --}}
        <section>

            <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

                <x-ui.stat-card title="Total UMKM" :value="$statistics['total']" description="Seluruh UMKM terdaftar">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 21h18M5 21V8l7-4 7 4v13" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>



                <x-ui.stat-card title="UMKM Aktif" :value="$statistics['active']" description="Ditampilkan pada website">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>



                <x-ui.stat-card title="Nonaktif" :value="$statistics['inactive']" description="Tidak dipublikasikan">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 18.364A9 9 0 005.636 5.636" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>



                <x-ui.stat-card title="Menunggu Verifikasi" :value="\App\Models\Umkm::pending()->count()" description="Perlu ditinjau admin">

                    <x-slot:icon>

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                        </svg>

                    </x-slot:icon>

                </x-ui.stat-card>

            </div>

        </section>



        {{-- ====================================================== --}}
        {{-- Toolbar --}}
        {{-- ====================================================== --}}
        <x-ui.toolbar>

            <form action="{{ route('admin.umkms.index') }}" method="GET"
                class="flex w-full flex-col gap-3 lg:flex-row lg:items-center">

                <div class="flex-1">

                    <x-ui.search-bar name="search" :value="$search"
                        placeholder="Cari nama UMKM, pemilik, kategori, atau nomor telepon..." />

                </div>

                <div class="flex items-center gap-3">

                    @if (request()->filled('search'))
                        <x-ui.button href="{{ route('admin.umkms.index') }}" variant="ghost">

                            Reset

                        </x-ui.button>
                    @endif

                    <x-ui.button type="submit">

                        Cari

                    </x-ui.button>

                </div>

            </form>

        </x-ui.toolbar>

        {{-- ====================================================== --}}
        {{-- Daftar UMKM --}}
        {{-- ====================================================== --}}
        <x-ui.card padding="false">

            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

                <div>

                    <h2 class="text-lg font-semibold text-slate-900">

                        Daftar UMKM

                    </h2>

                    <p class="mt-1 text-sm text-slate-500">

                        Menampilkan

                        <span class="font-semibold text-slate-700">

                            {{ $umkms->count() }}

                        </span>

                        dari

                        <span class="font-semibold text-slate-700">

                            {{ $umkms->total() }}

                        </span>

                        UMKM.

                    </p>

                </div>

                <x-ui.badge variant="secondary">

                    {{ $umkms->total() }} Data

                </x-ui.badge>

            </div>



            @if ($umkms->count())

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-slate-200">

                        <thead class="bg-slate-50">

                            <tr>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    UMKM

                                </th>

                                <th
                                    class="w-44 px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Kategori

                                </th>

                                <th
                                    class="w-52 px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Pemilik

                                </th>

                                <th
                                    class="w-40 px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Verifikasi

                                </th>

                                <th
                                    class="w-36 px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Status

                                </th>

                                <th
                                    class="w-48 px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">

                                    Aksi

                                </th>

                            </tr>

                        </thead>



                        <tbody class="divide-y divide-slate-100 bg-white">

                            @foreach ($umkms as $umkm)
                                <tr class="transition hover:bg-slate-50">

                                    {{-- UMKM --}}
                                    <td class="px-6 py-5">

                                        <div class="flex items-center gap-4">

                                            @if ($umkm->logo)
                                                <img src="{{ asset('storage/' . $umkm->logo) }}"
                                                    alt="{{ $umkm->business_name }}"
                                                    class="h-14 w-14 rounded-2xl border border-slate-200 object-cover">
                                            @else
                                                <div
                                                    class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M3 21h18M5 21V8l7-4 7 4v13" />

                                                    </svg>

                                                </div>
                                            @endif



                                            <div>

                                                <h3 class="font-semibold text-slate-900">

                                                    {{ $umkm->business_name }}

                                                </h3>

                                                <p class="mt-1 text-xs text-slate-500">

                                                    📞 {{ $umkm->phone ?: '-' }}

                                                </p>

                                            </div>

                                        </div>

                                    </td>



                                    {{-- Kategori --}}
                                    <td class="px-6 py-5">

                                        @if ($umkm->category)
                                            <x-ui.badge variant="secondary">

                                                {{ $umkm->category->name }}

                                            </x-ui.badge>
                                        @else
                                            <span class="text-sm text-slate-400">

                                                -

                                            </span>
                                        @endif

                                    </td>



                                    {{-- Pemilik --}}
                                    <td class="px-6 py-5">

                                        @if ($umkm->user)
                                            <div>

                                                <p class="font-medium text-slate-900">

                                                    {{ $umkm->user->name }}

                                                </p>

                                                <p class="mt-1 text-xs text-slate-500">

                                                    {{ $umkm->user->email ?? 'Pemilik UMKM' }}

                                                </p>

                                            </div>
                                        @else
                                            <span class="text-sm text-slate-400">

                                                -

                                            </span>
                                        @endif

                                    </td>



                                    {{-- Approval --}}
                                    <td class="px-6 py-5 text-center">

                                        <x-ui.badge :variant="match ($umkm->status) {
                                            'approved' => 'success',
                                            'pending' => 'warning',
                                            default => 'danger',
                                        }">

                                            {{ ucfirst($umkm->status) }}

                                        </x-ui.badge>

                                    </td>



                                    {{-- Status --}}
                                    <td class="px-6 py-5 text-center">

                                        <x-ui.badge :variant="$umkm->is_active ? 'success' : 'danger'">

                                            {{ $umkm->is_active ? 'Aktif' : 'Nonaktif' }}

                                        </x-ui.badge>

                                    </td>



                                    {{-- Action --}}
                                    <td class="px-6 py-5">

                                        <div class="flex items-center justify-center gap-2">

                                            <x-ui.button href="{{ route('admin.umkms.edit', $umkm) }}" variant="ghost"
                                                size="sm">

                                                Edit

                                            </x-ui.button>

                                            <form action="{{ route('admin.umkms.destroy', $umkm) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus UMKM ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <x-ui.button type="submit" variant="danger" size="sm">

                                                    Hapus

                                                </x-ui.button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
            @else
                <div class="py-12">

                    <x-ui.empty-state title="Belum Ada UMKM"
                        description="Tambahkan UMKM pertama agar katalog digital desa mulai berkembang.">

                        <x-ui.button href="{{ route('admin.umkms.create') }}">

                            Tambah UMKM

                        </x-ui.button>

                    </x-ui.empty-state>

                </div>

            @endif

        </x-ui.card>

        {{-- ====================================================== --}}
        {{-- Pagination --}}
        {{-- ====================================================== --}}
        <section>

            <div
                class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white px-6 py-5 shadow-sm md:flex-row md:items-center md:justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-700">

                        Menampilkan

                        <span class="font-semibold text-slate-900">

                            {{ $umkms->firstItem() ?? 0 }}

                        </span>

                        –

                        <span class="font-semibold text-slate-900">

                            {{ $umkms->lastItem() ?? 0 }}

                        </span>

                        dari

                        <span class="font-semibold text-slate-900">

                            {{ $umkms->total() }}

                        </span>

                        UMKM

                    </p>

                    <p class="mt-1 text-xs text-slate-500">

                        Halaman

                        {{ $umkms->currentPage() }}

                        dari

                        {{ $umkms->lastPage() }}

                    </p>

                </div>

                <div>

                    {{ $umkms->onEachSide(1)->links() }}

                </div>

            </div>

        </section>

    </div>

@endsection

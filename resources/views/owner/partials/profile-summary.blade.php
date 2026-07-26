<x-ui.card>

    {{-- ====================================================== --}}
    {{-- Header --}}
    {{-- ====================================================== --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">

        <div>

            <h2 class="text-xl font-semibold tracking-tight text-slate-900">

                Ringkasan UMKM

            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500">

                Informasi utama mengenai UMKM yang Anda kelola.

            </p>

        </div>

        <x-ui.button size="sm" variant="secondary" :href="route('owner.profile.edit')">

            Edit Profil

        </x-ui.button>

    </div>





    {{-- ====================================================== --}}
    {{-- Information Grid --}}
    {{-- ====================================================== --}}
    <div class="mt-8 grid gap-5 md:grid-cols-2">

        {{-- Nama UMKM --}}
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">

                Nama UMKM

            </p>

            <p class="mt-2 text-lg font-semibold text-slate-900">

                {{ $umkm?->business_name ?? '-' }}

            </p>

        </div>





        {{-- Kategori --}}
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">

                Kategori

            </p>

            <p class="mt-2 text-lg font-semibold text-slate-900">

                {{ $stats['category'] ?? '-' }}

            </p>

        </div>





        {{-- Status --}}
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">

                Status Verifikasi

            </p>

            <div class="mt-3">

                @php
                    $status = strtolower($stats['status'] ?? '');
                @endphp

                @if ($status === 'verified')
                    <span
                        class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-sm font-semibold text-emerald-700">

                        ✓ Terverifikasi

                    </span>
                @elseif($status === 'pending')
                    <span
                        class="inline-flex items-center rounded-full bg-amber-100 px-3 py-1 text-sm font-semibold text-amber-700">

                        ⏳ Menunggu Verifikasi

                    </span>
                @elseif($status === 'rejected')
                    <span
                        class="inline-flex items-center rounded-full bg-rose-100 px-3 py-1 text-sm font-semibold text-rose-700">

                        ✕ Ditolak

                    </span>
                @else
                    <span
                        class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-600">

                        Belum Tersedia

                    </span>
                @endif

            </div>

        </div>





        {{-- Bergabung --}}
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">

                Bergabung Sejak

            </p>

            <p class="mt-2 text-lg font-semibold text-slate-900">

                {{ $stats['joined_at'] ?? '-' }}

            </p>

        </div>

    </div>

</x-ui.card>

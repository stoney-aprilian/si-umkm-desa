<div
    class="flex flex-col gap-8 rounded-3xl bg-gradient-to-r from-emerald-600 via-emerald-600 to-teal-600 p-8 text-white shadow-lg lg:flex-row lg:items-center lg:justify-between">

    {{-- ====================================================== --}}
    {{-- Welcome --}}
    {{-- ====================================================== --}}
    <div>

        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-100">

            Dashboard Owner

        </p>

        <h1 class="mt-3 text-3xl font-extrabold tracking-tight lg:text-4xl">

            Selamat Datang,
            {{ auth()->user()->name }}

        </h1>

        @if ($umkm)
            <p class="mt-4 max-w-2xl leading-7 text-emerald-100">

                Anda sedang mengelola UMKM

                <span class="font-bold text-white">

                    {{ $umkm->business_name }}

                </span>

                melalui SI UMKM Desa.

            </p>
        @else
            <p class="mt-4 max-w-2xl leading-7 text-emerald-100">

                Lengkapi profil UMKM Anda agar dapat mulai
                mengelola produk dan dipublikasikan pada
                portal SI UMKM Desa.

            </p>
        @endif

    </div>





    {{-- ====================================================== --}}
    {{-- Status --}}
    {{-- ====================================================== --}}
    <div class="flex flex-wrap gap-3">

        <span
            class="inline-flex items-center gap-2 rounded-full bg-white/20 px-5 py-3 text-sm font-semibold backdrop-blur">

            <span class="h-2 w-2 rounded-full bg-emerald-300"></span>

            {{ ucfirst($stats['status'] ?? 'Belum tersedia') }}

        </span>





        @if (!empty($stats['category']))
            <span
                class="inline-flex items-center rounded-full border border-white/20 bg-white/10 px-5 py-3 text-sm font-medium backdrop-blur">

                {{ $stats['category'] }}

            </span>
        @endif

    </div>

</div>

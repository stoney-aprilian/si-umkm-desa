<div class="flex flex-col gap-6 rounded-xl bg-gradient-to-r from-emerald-600 to-emerald-700 p-8 text-white shadow-sm lg:flex-row lg:items-center lg:justify-between">

    <div>

        <p class="text-sm font-medium text-emerald-100">

            Dashboard Owner

        </p>

        <h1 class="mt-2 text-3xl font-bold">

            Selamat Datang,
            {{ auth()->user()->name }}

        </h1>

        @if ($umkm)

            <p class="mt-3 text-emerald-100">

                Anda sedang mengelola
                <span class="font-semibold">

                    {{ $umkm->name }}

                </span>

            </p>

        @else

            <p class="mt-3 text-emerald-100">

                Lengkapi profil UMKM Anda untuk mulai mengelola produk.

            </p>

        @endif

    </div>

    <div class="flex flex-wrap gap-3">

        <span class="inline-flex items-center rounded-full bg-white/20 px-4 py-2 text-sm font-medium backdrop-blur">

            Status:
            {{ ucfirst($stats['status'] ?? 'Belum tersedia') }}

        </span>

        @if ($stats['category'])

            <span class="inline-flex items-center rounded-full bg-white/20 px-4 py-2 text-sm font-medium backdrop-blur">

                {{ $stats['category'] }}

            </span>

        @endif

    </div>

</div>

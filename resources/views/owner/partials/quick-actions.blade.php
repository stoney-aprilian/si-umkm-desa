<x-ui.card>

    {{-- ====================================================== --}}
    {{-- Header --}}
    {{-- ====================================================== --}}
    <div>

        <h2 class="text-xl font-semibold tracking-tight text-slate-900">

            Aksi Cepat

        </h2>

        <p class="mt-2 text-sm leading-6 text-slate-500">

            Akses fitur yang paling sering digunakan untuk mengelola UMKM Anda.

        </p>

    </div>





    {{-- ====================================================== --}}
    {{-- Actions --}}
    {{-- ====================================================== --}}
    <div class="mt-8 space-y-4">

        {{-- Tambah Produk --}}
        <x-ui.button :href="route('owner.products.create')" class="flex w-full items-center justify-center gap-2">

            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />

            </svg>

            Tambah Produk

        </x-ui.button>





        {{-- Edit Profil --}}
        <x-ui.button variant="secondary" :href="route('owner.profile.edit')" class="flex w-full items-center justify-center gap-2">

            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.586-9.414a2 2 0 112.828 2.828L12 14l-4 1 1-4 8.414-8.414z" />

            </svg>

            Edit Profil UMKM

        </x-ui.button>





        {{-- Halaman Publik --}}
        @if ($umkm)
            <x-ui.button variant="secondary" :href="route('public.umkms.show', $umkm)" class="flex w-full items-center justify-center gap-2">

                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14m-6 2H5a2 2 0 01-2-2V10a2 2 0 012-2h4m6 8H9m6-8H9" />

                </svg>

                Lihat Halaman Publik

            </x-ui.button>
        @endif

    </div>





    {{-- ====================================================== --}}
    {{-- Tips --}}
    {{-- ====================================================== --}}
    <div class="mt-8 rounded-2xl border border-emerald-200 bg-emerald-50 p-4">

        <p class="text-sm leading-6 text-emerald-700">

            <span class="font-semibold">

                Tips:

            </span>

            Lengkapi profil UMKM dan tambahkan produk secara berkala agar informasi usaha Anda lebih menarik bagi
            pengunjung.

        </p>

    </div>

</x-ui.card>

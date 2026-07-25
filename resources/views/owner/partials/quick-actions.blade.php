<x-ui.card>

    <h2 class="text-lg font-semibold text-slate-900">

        Aksi Cepat

    </h2>

    <p class="mt-2 text-sm text-slate-500">

        Akses fitur yang paling sering digunakan.

    </p>

    <div class="mt-6 space-y-3">

        <x-ui.button
            :href="route('owner.products.create')"
            class="w-full justify-center">

            Tambah Produk

        </x-ui.button>

        <x-ui.button
            variant="secondary"
            :href="route('owner.profile.edit')"
            class="w-full justify-center">

            Edit Profil UMKM

        </x-ui.button>

        @if ($umkm)

            <x-ui.button
                variant="secondary"
                :href="route('public.umkms.show', $umkm)"
                class="w-full justify-center">

                Lihat Halaman Publik

            </x-ui.button>

        @endif

    </div>

</x-ui.card>

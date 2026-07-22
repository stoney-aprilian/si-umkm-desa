@props([
    'umkms',
])

<section class="bg-slate-50 py-24">

    <div class="app-container">

        <x-ui.section-title
            title="UMKM Unggulan"
            subtitle="Jelajahi berbagai pelaku UMKM desa yang telah bergabung dan memperkenalkan produk unggulannya melalui platform ini." />

        @if ($umkms->isNotEmpty())

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">

                @foreach ($umkms as $umkm)

                    <x-umkm.card
                        :umkm="$umkm" />

                @endforeach

            </div>

            <div class="mt-14 text-center">

                <p class="mb-5 text-sm text-slate-500">

                    Temukan lebih banyak pelaku UMKM dan potensi usaha lainnya.

                </p>

                <a
                    href="{{ route('public.umkms.index') }}"
                    class="btn-secondary">

                    Lihat Semua UMKM

                </a>

            </div>

        @else

            <div class="mt-10">

                <x-ui.empty-state>

                    Data UMKM akan ditampilkan setelah tersedia.

                </x-ui.empty-state>

            </div>

        @endif

    </div>

</section>

@props([
    'umkms',
])

<section class="pb-24">

    <div class="app-container">

        <x-ui.section-title
            title="UMKM Terbaru"
            subtitle="Temukan berbagai UMKM yang telah bergabung dan memperkenalkan produk unggulannya melalui platform ini." />

        @if($umkms->isNotEmpty())

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">

                @foreach($umkms as $umkm)

                    <x-umkm.card
                        :umkm="$umkm" />

                @endforeach

            </div>

            <div class="mt-12 text-center">

                <a
                    href="{{ route('public.umkms.index') }}"
                    class="btn-secondary">

                    Lihat Semua UMKM

                </a>

            </div>

        @else

            <x-ui.empty-state>

                Belum ada UMKM yang tersedia.

            </x-ui.empty-state>

        @endif

    </div>

</section>

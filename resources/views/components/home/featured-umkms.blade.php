@props([
    'umkms',
])

<section>

    <div class="app-container">

        {{-- ====================================================== --}}
        {{-- Header --}}
        {{-- ====================================================== --}}
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

            <x-ui.section-title
                title="UMKM Unggulan"
                subtitle="Kenali para pelaku usaha lokal dan berbagai potensi ekonomi Desa Salamnunggal melalui platform digital ini." />

            @if($umkms->isNotEmpty())

                <x-ui.button
                    href="{{ route('public.umkms.index') }}"
                    variant="secondary">

                    Lihat Semua UMKM

                </x-ui.button>

            @endif

        </div>





        {{-- ====================================================== --}}
        {{-- UMKM Grid --}}
        {{-- ====================================================== --}}
        @if($umkms->isNotEmpty())

            <div
                class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">

                @foreach($umkms as $umkm)

                    <x-umkm.card
                        :umkm="$umkm" />

                @endforeach

            </div>





            {{-- ====================================================== --}}
            {{-- Bottom CTA --}}
            {{-- ====================================================== --}}
            <div
                class="mt-14 rounded-3xl border border-emerald-100 bg-emerald-50 px-8 py-8">

                <div
                    class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                    <div>

                        <h3
                            class="text-xl font-bold text-slate-900">

                            Dukung UMKM Lokal Desa Salamnunggal

                        </h3>

                        <p
                            class="mt-2 leading-7 text-slate-600">

                            Jelajahi lebih banyak UMKM lokal, temukan produk unggulan,
                            dan kenali potensi ekonomi desa melalui platform ini.

                        </p>

                    </div>

                    <x-ui.button
                        href="{{ route('public.umkms.index') }}">

                        Jelajahi UMKM

                    </x-ui.button>

                </div>

            </div>





        @else

            <div
                class="mt-12 rounded-3xl border border-dashed border-slate-300 bg-slate-50 px-8 py-16 text-center">

                <div
                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-slate-100 text-slate-400">

                    <svg
                        class="h-10 w-10"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 21h18M5 21V9l7-6 7 6v12"/>

                    </svg>

                </div>

                <h3
                    class="mt-6 text-xl font-bold text-slate-900">

                    Belum Ada UMKM

                </h3>

                <p
                    class="mx-auto mt-3 max-w-lg leading-7 text-slate-500">

                    Data UMKM akan ditampilkan setelah tersedia di dalam sistem.

                </p>

            </div>

        @endif

    </div>

</section>

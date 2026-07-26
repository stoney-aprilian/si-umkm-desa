@props([
    'statistics',
])

<section>

    <div class="app-container">

        <x-ui.section-title
            title="Potensi UMKM Desa"
            subtitle="Gambaran perkembangan UMKM, produk lokal, dan kategori usaha yang telah terdaftar pada platform digital Desa Salamnunggal." />





        <div class="mt-12 grid gap-6 md:grid-cols-3">

            {{-- ====================================================== --}}
            {{-- UMKM --}}
            {{-- ====================================================== --}}
            <div
                class="group rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl">

                <div
                    class="flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600">

                    <svg
                        class="h-8 w-8"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 21h18M5 21V8l7-4 7 4v13"/>

                    </svg>

                </div>

                <p
                    class="mt-8 text-sm font-semibold uppercase tracking-[0.18em] text-slate-400">

                    Total UMKM

                </p>

                <h3
                    class="mt-3 text-5xl font-extrabold tracking-tight text-slate-900">

                    {{ number_format($statistics['umkms'] ?? 0) }}

                </h3>

                <p
                    class="mt-4 leading-7 text-slate-600">

                    Pelaku usaha lokal yang telah terdaftar dan dapat ditemukan melalui platform digital.

                </p>

                <div
                    class="mt-8 inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">

                    Terdaftar

                </div>

            </div>





            {{-- ====================================================== --}}
            {{-- Produk --}}
            {{-- ====================================================== --}}
            <div
                class="group rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl">

                <div
                    class="flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600">

                    <svg
                        class="h-8 w-8"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 7L12 3 4 7l8 4 8-4M4 9l8 4 8-4V9l-8 4z"/>

                    </svg>

                </div>

                <p
                    class="mt-8 text-sm font-semibold uppercase tracking-[0.18em] text-slate-400">

                    Produk Lokal

                </p>

                <h3
                    class="mt-3 text-5xl font-extrabold tracking-tight text-slate-900">

                    {{ number_format($statistics['products'] ?? 0) }}

                </h3>

                <p
                    class="mt-4 leading-7 text-slate-600">

                    Produk unggulan dari berbagai UMKM yang dipublikasikan untuk masyarakat.

                </p>

                <div
                    class="mt-8 inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">

                    Dipublikasikan

                </div>

            </div>





            {{-- ====================================================== --}}
            {{-- Kategori --}}
            {{-- ====================================================== --}}
            <div
                class="group rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl">

                <div
                    class="flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600">

                    <svg
                        class="h-8 w-8"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 7h6l2 2h10v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>

                    </svg>

                </div>

                <p
                    class="mt-8 text-sm font-semibold uppercase tracking-[0.18em] text-slate-400">

                    Kategori

                </p>

                <h3
                    class="mt-3 text-5xl font-extrabold tracking-tight text-slate-900">

                    {{ number_format($statistics['categories'] ?? 0) }}

                </h3>

                <p
                    class="mt-4 leading-7 text-slate-600">

                    Ragam bidang usaha yang menggambarkan potensi ekonomi Desa Salamnunggal.

                </p>

                <div
                    class="mt-8 inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">

                    Aktif

                </div>

            </div>

        </div>

    </div>

</section>

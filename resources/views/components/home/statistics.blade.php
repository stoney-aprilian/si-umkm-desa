@props([
    'statistics',
    'categories',
])

<section class="bg-white py-24">

    <div class="app-container">

        <x-ui.section-title
            title="Potensi UMKM Desa"
            subtitle="Gambaran singkat perkembangan UMKM dan produk lokal yang telah terdaftar dalam sistem." />

        <div class="mt-12 grid gap-6 md:grid-cols-3">

            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600">

                    <svg
                        class="h-7 w-7"
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

                <p class="mt-6 text-sm font-medium uppercase tracking-wide text-slate-500">

                    Total UMKM

                </p>

                <h3 class="mt-2 text-4xl font-bold text-slate-900">

                    {{ number_format($statistics['umkms']) }}

                </h3>

                <p class="mt-3 text-sm leading-6 text-slate-500">

                    Pelaku usaha yang telah bergabung dan dipublikasikan melalui platform.

                </p>

            </div>

            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600">

                    <svg
                        class="h-7 w-7"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 7L12 3 4 7l8 4 8-4zm-8 6L4 9v8l8 4 8-4V9l-8 4z"/>

                    </svg>

                </div>

                <p class="mt-6 text-sm font-medium uppercase tracking-wide text-slate-500">

                    Produk Lokal

                </p>

                <h3 class="mt-2 text-4xl font-bold text-slate-900">

                    {{ number_format($statistics['products']) }}

                </h3>

                <p class="mt-3 text-sm leading-6 text-slate-500">

                    Produk unggulan yang dapat dijelajahi oleh masyarakat.

                </p>

            </div>

            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600">

                    <svg
                        class="h-7 w-7"
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

                <p class="mt-6 text-sm font-medium uppercase tracking-wide text-slate-500">

                    Kategori

                </p>

                <h3 class="mt-2 text-4xl font-bold text-slate-900">

                    {{ number_format($statistics['categories']) }}

                </h3>

                <p class="mt-3 text-sm leading-6 text-slate-500">

                    Ragam kategori usaha yang mewakili potensi ekonomi desa.

                </p>

            </div>

        </div>

    </div>

</section>

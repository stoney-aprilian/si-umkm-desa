@props([
    'categories',
])

<section class="py-24 bg-slate-50">

    <div class="app-container">

        <x-ui.section-title
            title="Kategori UMKM"
            subtitle="Temukan berbagai kategori usaha yang menjadi potensi ekonomi desa." />

        @if($categories->isNotEmpty())

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach($categories as $category)

                    <div
                        class="group rounded-2xl border border-slate-200 bg-white p-6 transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg">

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

                        <h3 class="mt-5 text-lg font-semibold text-slate-900">

                            {{ $category->name }}

                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">

                            Jelajahi berbagai produk dan UMKM yang termasuk
                            dalam kategori ini.

                        </p>

                    </div>

                @endforeach

            </div>

        @else

            <div class="app-card mt-10 py-14 text-center">

                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

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

                <h3 class="mt-6 text-lg font-semibold text-slate-900">

                    Belum Ada Kategori

                </h3>

                <p class="mt-2 text-slate-500">

                    Kategori UMKM akan ditampilkan setelah data tersedia.

                </p>

            </div>

        @endif

    </div>

</section>

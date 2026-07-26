@props([
    'categories',
])

<section>

    <div class="app-container">

        <x-ui.section-title
            title="Kategori UMKM"
            subtitle="Jelajahi berbagai bidang usaha yang menjadi potensi ekonomi Desa Salamnunggal." />





        @if($categories->isNotEmpty())

            <div
                class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach($categories as $category)

                    <a
                        href="{{ route('public.umkms.index', ['category' => $category->id]) }}"
                        class="group rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-emerald-200 hover:shadow-xl">

                        {{-- Icon --}}
                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600 transition group-hover:bg-emerald-600 group-hover:text-white">

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





                        {{-- Title --}}
                        <h3
                            class="mt-7 text-xl font-bold tracking-tight text-slate-900">

                            {{ $category->name }}

                        </h3>





                        {{-- Description --}}
                        <p
                            class="mt-3 leading-7 text-slate-500">

                            Lihat daftar UMKM dan berbagai produk lokal
                            yang termasuk dalam kategori usaha ini.

                        </p>





                        {{-- Footer --}}
                        <div
                            class="mt-8 flex items-center justify-between border-t border-slate-100 pt-5">

                            <span
                                class="text-sm font-medium text-slate-500">

                                Jelajahi

                            </span>

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 transition group-hover:bg-emerald-600 group-hover:text-white">

                                <svg
                                    class="h-5 w-5 transition group-hover:translate-x-1"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"/>

                                </svg>

                            </div>

                        </div>

                    </a>

                @endforeach

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
                            d="M3 7h6l2 2h10v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>

                    </svg>

                </div>

                <h3
                    class="mt-6 text-xl font-bold text-slate-900">

                    Belum Ada Kategori

                </h3>

                <p
                    class="mx-auto mt-3 max-w-lg leading-7 text-slate-500">

                    Kategori UMKM akan ditampilkan setelah data tersedia di dalam sistem.

                </p>

            </div>

        @endif

    </div>

</section>

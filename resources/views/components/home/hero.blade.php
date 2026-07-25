<section class="public-hero">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 -z-10 overflow-hidden">

        <div class="absolute -left-32 top-10 h-96 w-96 rounded-full bg-emerald-100/60 blur-3xl"></div>

        <div class="absolute -right-32 bottom-0 h-[30rem] w-[30rem] rounded-full bg-teal-100/50 blur-3xl"></div>

    </div>


    <div class="app-container">

        <div class="grid items-center gap-16 lg:grid-cols-2">


            {{-- Content --}}
            <div>


                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2">


                    <svg
                        class="h-5 w-5 text-emerald-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 21h18M5 21V8l7-4 7 4v13"/>

                    </svg>


                    <span class="text-sm font-semibold text-emerald-700">

                        Portal Digital UMKM Desa

                    </span>


                </div>



                {{-- Heading --}}
                <h1 class="mt-8 text-4xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">


                    Kenali UMKM Lokal,

                    <span class="block text-emerald-600">

                        Temukan Produk Unggulan Desa

                    </span>


                </h1>



                {{-- Description --}}
                <p class="mt-6 max-w-xl text-lg leading-8 text-slate-600">


                    SI UMKM Desa membantu masyarakat menemukan pelaku usaha,
                    produk lokal, dan potensi ekonomi desa melalui informasi
                    digital yang mudah diakses.


                </p>



                {{-- Action --}}
                <div class="mt-8 flex flex-wrap gap-4">


                    <a
                        href="{{ route('public.umkms.index') }}"
                        class="btn btn-primary">


                        Jelajahi UMKM


                    </a>



                    <a
                        href="{{ route('public.products.index') }}"
                        class="btn-secondary">


                        Lihat Produk


                    </a>


                </div>



                {{-- Trust Metrics --}}
                <div class="mt-10 flex flex-wrap gap-x-8 gap-y-4">


                    <div>

                        <p class="text-2xl font-bold text-slate-900">

                            {{ number_format($totalUmkm ?? 0) }}+

                        </p>


                        <p class="text-sm text-slate-500">

                            UMKM Terdaftar

                        </p>


                    </div>



                    <div>

                        <p class="text-2xl font-bold text-slate-900">

                            {{ number_format($totalProduct ?? 0) }}+

                        </p>


                        <p class="text-sm text-slate-500">

                            Produk Lokal

                        </p>


                    </div>


                    <div>

                        <p class="text-2xl font-bold text-slate-900">

                            {{ isset($categories) ? $categories->count() : 0 }}

                        </p>


                        <p class="text-sm text-slate-500">

                            Kategori

                        </p>


                    </div>


                </div>


            </div>





            {{-- Visual Preview --}}
            <div class="relative hidden lg:block">


                <div class="surface-lg shadow-card p-8">


                    <div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">


                        <div>


                            <h3 class="font-bold text-slate-900">

                                Produk Unggulan

                            </h3>


                            <p class="text-sm text-slate-500">

                                Dari UMKM Desa

                            </p>


                        </div>



                        <span class="badge-success">

                            Aktif

                        </span>


                    </div>



                    <div class="space-y-4">


                        @foreach([
                            ['Kopi Arabika', 'Minuman'],
                            ['Keripik Pisang', 'Makanan'],
                            ['Kerajinan Bambu', 'Kerajinan']
                        ] as $item)


                            <div class="surface-sm flex items-center gap-4 p-4 transition hover:border-emerald-200 hover:bg-emerald-50">


                                <div class="icon-wrapper icon-wrapper-md icon-wrapper-primary">


                                    <svg
                                        class="h-6 w-6"
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



                                <div>

                                    <h4 class="font-semibold text-slate-900">

                                        {{ $item[0] }}

                                    </h4>


                                    <p class="text-sm text-slate-500">

                                        {{ $item[1] }}

                                    </p>


                                </div>


                            </div>


                        @endforeach


                    </div>


                </div>




                {{-- Trust Card --}}
                <div class="absolute -bottom-8 -left-8 surface shadow-card p-5">


                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">

                        Digitalisasi UMKM

                    </p>


                    <div class="mt-3 space-y-2 text-sm text-slate-600">


                        <p>

                            ✓ Informasi usaha lokal

                        </p>


                        <p>

                            ✓ Produk unggulan desa

                        </p>


                        <p>

                            ✓ Akses informasi mudah

                        </p>


                    </div>


                </div>


            </div>


        </div>


    </div>


</section>

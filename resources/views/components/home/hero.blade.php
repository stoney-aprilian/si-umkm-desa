<section class="relative overflow-hidden py-24 lg:py-32">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 -z-10">

        <div class="absolute left-0 top-0 h-80 w-80 rounded-full bg-emerald-100 blur-3xl opacity-60"></div>

        <div class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-teal-100 blur-3xl opacity-50"></div>

    </div>

    <div class="app-container">

        <div class="grid items-center gap-20 lg:grid-cols-2">

            {{-- Content --}}
            <div>

                <span class="inline-flex items-center rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm font-medium text-emerald-700">

                    🌿 Digitalisasi UMKM Desa

                </span>

                <h1 class="mt-8 text-5xl font-extrabold leading-tight tracking-tight text-slate-900 lg:text-6xl">

                    Temukan Produk
                    <span class="text-emerald-600">

                        Lokal Terbaik

                    </span>

                    dari UMKM Desa

                </h1>

                <p class="mt-8 max-w-xl text-lg leading-8 text-slate-600">

                    SI UMKM Desa menghadirkan informasi UMKM, produk unggulan,
                    dan potensi ekonomi desa dalam satu platform yang mudah
                    diakses oleh masyarakat, wisatawan, maupun calon mitra.

                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a
                        href="{{ route('public.umkms.index') }}"
                        class="btn-primary">

                        Jelajahi UMKM

                    </a>

                    <a
                        href="{{ route('public.products.index') }}"
                        class="btn-secondary">

                        Lihat Produk

                    </a>

                </div>

                {{-- Highlight --}}
                <div class="mt-12 grid grid-cols-3 gap-6">

                    <div>

                        <h3 class="text-3xl font-bold text-slate-900">

                            {{ number_format($totalUmkm ?? 0) }}+

                        </h3>

                        <p class="mt-2 text-sm text-slate-500">

                            UMKM Terdaftar

                        </p>

                    </div>

                    <div>

                        <h3 class="text-3xl font-bold text-slate-900">

                            {{ number_format($totalProduct ?? 0) }}+

                        </h3>

                        <p class="mt-2 text-sm text-slate-500">

                            Produk Lokal

                        </p>

                    </div>

                    <div>

                        <h3 class="text-3xl font-bold text-slate-900">

                            {{ isset($categories) ? $categories->count() : 0 }}

                        </h3>

                        <p class="mt-2 text-sm text-slate-500">

                            Kategori

                        </p>

                    </div>

                </div>

            </div>

            {{-- Illustration --}}
            <div class="relative hidden lg:block">

                <div class="relative rounded-[32px] border border-slate-200 bg-white p-8 shadow-xl">

                    <div class="aspect-[4/3] rounded-2xl bg-gradient-to-br from-emerald-50 via-white to-teal-50">

                        <div class="flex h-full items-center justify-center">

                            <div class="text-center">

                                <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-emerald-100 text-5xl">

                                    🏪

                                </div>

                                <h3 class="mt-6 text-xl font-bold text-slate-800">

                                    UMKM Desa

                                </h3>

                                <p class="mt-3 max-w-xs text-sm leading-6 text-slate-500">

                                    Promosikan produk lokal, tingkatkan
                                    jangkauan pasar, dan dukung ekonomi desa
                                    melalui platform digital.

                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- Floating Card --}}
                    <div class="absolute -bottom-6 -left-6 rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-lg">

                        <p class="text-xs uppercase tracking-widest text-slate-400">

                            Platform

                        </p>

                        <h4 class="mt-1 font-semibold text-slate-800">

                            SI UMKM Desa

                        </h4>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

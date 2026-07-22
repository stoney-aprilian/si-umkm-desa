<section class="relative overflow-hidden bg-white py-24 lg:py-32">

    {{-- Background --}}
    <div class="absolute inset-0 -z-10 overflow-hidden">

        <div class="absolute -left-24 top-0 h-96 w-96 rounded-full bg-emerald-100/60 blur-3xl"></div>

        <div class="absolute -right-24 bottom-0 h-[28rem] w-[28rem] rounded-full bg-teal-100/60 blur-3xl"></div>

    </div>

    <div class="app-container">

        <div class="grid items-center gap-20 lg:grid-cols-2">

            {{-- Left --}}
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
                            d="M12 2l3 6 6 .9-4.5 4.3 1.1 6.3L12 17l-5.6 2.5 1.1-6.3L3 8.9 9 8l3-6z"/>

                    </svg>

                    <span class="text-sm font-medium text-emerald-700">

                        Platform Digital UMKM Desa

                    </span>

                </div>

                {{-- Heading --}}
                <h1 class="mt-8 text-5xl font-extrabold leading-tight tracking-tight text-slate-900 lg:text-6xl">

                    Temukan

                    <span class="block text-emerald-600">

                        Produk Lokal Terbaik

                    </span>

                    dari UMKM Desa

                </h1>

                {{-- Description --}}
                <p class="mt-8 max-w-2xl text-lg leading-8 text-slate-600">

                    SI UMKM Desa merupakan platform digital yang membantu
                    memperkenalkan pelaku usaha, produk unggulan, dan potensi
                    ekonomi desa agar lebih mudah dikenal oleh masyarakat,
                    wisatawan, maupun calon mitra usaha.

                </p>

                {{-- CTA --}}
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

                {{-- Statistics --}}
                <div class="mt-14 grid grid-cols-3 gap-5">

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <h3 class="text-3xl font-bold text-slate-900">

                            {{ number_format($totalUmkm ?? 0) }}

                        </h3>

                        <p class="mt-2 text-sm text-slate-500">

                            UMKM Terdaftar

                        </p>

                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <h3 class="text-3xl font-bold text-slate-900">

                            {{ number_format($totalProduct ?? 0) }}

                        </h3>

                        <p class="mt-2 text-sm text-slate-500">

                            Produk Lokal

                        </p>

                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <h3 class="text-3xl font-bold text-slate-900">

                            {{ isset($categories) ? $categories->count() : 0 }}

                        </h3>

                        <p class="mt-2 text-sm text-slate-500">

                            Kategori

                        </p>

                    </div>

                </div>

            </div>

            {{-- Right --}}
            <div class="relative hidden lg:block">

                <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-2xl">

                    {{-- Window Header --}}
                    <div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">

                        <div>

                            <h3 class="font-bold text-slate-900">

                                SI UMKM Desa

                            </h3>

                            <p class="text-sm text-slate-500">

                                Produk Unggulan

                            </p>

                        </div>

                        <div class="rounded-xl bg-emerald-100 px-3 py-1 text-sm font-medium text-emerald-700">

                            Online

                        </div>

                    </div>

                    {{-- Product Cards --}}
                    <div class="space-y-4">

                        @foreach ([
                            ['Kopi Arabika', 'Minuman'],
                            ['Keripik Pisang', 'Makanan'],
                            ['Kerajinan Bambu', 'Kerajinan']
                        ] as $item)

                            <div class="flex items-center gap-4 rounded-2xl border border-slate-200 p-4 transition hover:border-emerald-200 hover:bg-emerald-50">

                                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-emerald-100">

                                    <svg
                                        class="h-7 w-7 text-emerald-600"
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

                                <div class="flex-1">

                                    <h4 class="font-semibold text-slate-900">

                                        {{ $item[0] }}

                                    </h4>

                                    <p class="text-sm text-slate-500">

                                        {{ $item[1] }}

                                    </p>

                                </div>

                                <div class="text-right">

                                    <div class="text-xs text-emerald-600">

                                        Dipublikasikan

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

                {{-- Floating Card --}}
                <div class="absolute -left-10 -bottom-8 rounded-2xl border border-slate-200 bg-white p-5 shadow-xl">

                    <p class="text-xs uppercase tracking-widest text-slate-400">

                        Digitalisasi UMKM

                    </p>

                    <div class="mt-3 flex items-center gap-8">

                        <div>

                            <h4 class="text-2xl font-bold text-slate-900">

                                {{ number_format($totalUmkm ?? 0) }}

                            </h4>

                            <p class="text-xs text-slate-500">

                                UMKM

                            </p>

                        </div>

                        <div>

                            <h4 class="text-2xl font-bold text-slate-900">

                                {{ number_format($totalProduct ?? 0) }}

                            </h4>

                            <p class="text-xs text-slate-500">

                                Produk

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

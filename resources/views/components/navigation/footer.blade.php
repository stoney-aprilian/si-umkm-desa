<footer class="mt-24 border-t border-slate-200 bg-white">

    <div class="app-container py-16">

        <div class="grid gap-12 lg:grid-cols-12">

            {{-- Brand --}}
            <div class="lg:col-span-5">

                <div class="flex items-center gap-4">

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-600 text-lg font-bold text-white shadow-sm">

                        SI

                    </div>

                    <div>

                        <h2 class="text-xl font-bold text-slate-900">

                            SI UMKM Desa

                        </h2>

                        <p class="text-sm text-slate-500">

                            Sistem Informasi UMKM

                        </p>

                    </div>

                </div>

                <p class="mt-6 max-w-md leading-7 text-slate-600">

                    Platform digital yang membantu memperkenalkan pelaku UMKM,
                    produk unggulan, dan potensi ekonomi desa kepada masyarakat
                    secara lebih luas melalui media informasi yang mudah diakses.

                </p>

            </div>

            {{-- Navigation --}}
            <div class="lg:col-span-3">

                <h3 class="text-sm font-semibold uppercase tracking-widest text-slate-900">

                    Navigasi

                </h3>

                <ul class="mt-5 space-y-3">

                    <li>

                        <a
                            href="{{ route('home') }}"
                            class="text-slate-600 transition hover:text-emerald-600">

                            Beranda

                        </a>

                    </li>

                    <li>

                        <a
                            href="{{ route('public.umkms.index') }}"
                            class="text-slate-600 transition hover:text-emerald-600">

                            UMKM

                        </a>

                    </li>

                    <li>

                        <a
                            href="{{ route('public.products.index') }}"
                            class="text-slate-600 transition hover:text-emerald-600">

                            Produk

                        </a>

                    </li>

                </ul>

            </div>

            {{-- Contact --}}
            <div class="lg:col-span-4">

                <h3 class="text-sm font-semibold uppercase tracking-widest text-slate-900">

                    Informasi

                </h3>

                <div class="mt-5 space-y-4 text-slate-600">

                    <div>

                        <p class="font-medium text-slate-900">

                            Pemerintah Desa

                        </p>

                        <p class="text-sm">

                            Informasi kontak dapat disesuaikan oleh administrator.

                        </p>

                    </div>

                    <div>

                        <p class="text-sm">

                            Email

                        </p>

                        <p class="font-medium">

                            info@desa.go.id

                        </p>

                    </div>

                    <div>

                        <p class="text-sm">

                            Telepon

                        </p>

                        <p class="font-medium">

                            (0000) 000-000

                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="mt-14 flex flex-col items-center justify-between gap-4 border-t border-slate-200 pt-6 text-sm text-slate-500 md:flex-row">

            <p>

                © {{ date('Y') }}

                <span class="font-medium text-slate-700">

                    SI UMKM Desa

                </span>

                · Seluruh hak cipta dilindungi.

            </p>

            <p>

                Dibangun sebagai bagian dari program Digitalisasi UMKM Desa.

            </p>

        </div>

    </div>

</footer>

<footer class="border-t border-slate-200 bg-white">

    <div class="app-container py-12">

        <div class="grid gap-10 md:grid-cols-3">

            {{-- Brand --}}
            <div>

                <div class="flex items-center gap-3">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 10l9-7 9 7v10a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1V10z"/>

                        </svg>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-900">

                            SI UMKM Desa

                        </h2>

                        <p class="text-sm text-slate-500">

                            Sistem Informasi UMKM

                        </p>

                    </div>

                </div>

                <p class="mt-5 max-w-sm text-sm leading-7 text-slate-500">

                    Platform digital yang membantu memperkenalkan UMKM,
                    produk unggulan, dan potensi ekonomi desa kepada masyarakat
                    secara lebih luas melalui media informasi yang mudah diakses.

                </p>

            </div>

            {{-- Navigasi --}}
            <div>

                <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-slate-900">

                    Navigasi

                </h3>

                <ul class="space-y-3 text-sm">

                    <li>

                        <a
                            href="{{ route('home') }}"
                            class="text-slate-500 transition hover:text-emerald-600">

                            Beranda

                        </a>

                    </li>

                    <li>

                        <a
                            href="{{ route('public.umkms.index') }}"
                            class="text-slate-500 transition hover:text-emerald-600">

                            UMKM

                        </a>

                    </li>

                    <li>

                        <a
                            href="{{ route('public.products.index') }}"
                            class="text-slate-500 transition hover:text-emerald-600">

                            Produk

                        </a>

                    </li>

                </ul>

            </div>

            {{-- Informasi --}}
            <div>

                <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-slate-900">

                    Informasi

                </h3>

                <ul class="space-y-3 text-sm text-slate-500">

                    <li>

                        Versi 1.0

                    </li>

                    <li>

                        Digitalisasi UMKM Desa

                    </li>

                    <li>

                        Laravel 12 & Tailwind CSS

                    </li>

                </ul>

            </div>

        </div>

        <div class="mt-12 flex flex-col items-center justify-between gap-4 border-t border-slate-200 pt-6 text-sm text-slate-500 md:flex-row">

            <p>

                © {{ date('Y') }} <span class="font-medium text-slate-700">SI UMKM Desa</span>.
                Seluruh hak cipta dilindungi.

            </p>

            <p>

                Dibangun sebagai bagian dari program Digitalisasi UMKM Desa.

            </p>

        </div>

    </div>

</footer>

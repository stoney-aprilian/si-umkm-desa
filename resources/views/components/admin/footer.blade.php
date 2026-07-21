<footer class="border-t border-slate-200 bg-white">

    <div class="app-container py-10">

        <div class="grid gap-8 md:grid-cols-3">

            {{-- Brand --}}
            <div>

                <h2 class="text-lg font-bold text-slate-900">

                    SI UMKM Desa

                </h2>

                <p class="mt-3 max-w-sm text-sm leading-6 text-slate-500">

                    Platform digital untuk memperkenalkan UMKM desa,
                    produk unggulan, dan potensi ekonomi lokal kepada masyarakat
                    secara lebih luas.

                </p>

            </div>

            {{-- Navigasi --}}
            <div>

                <h3 class="mb-3 font-semibold text-slate-800">

                    Navigasi

                </h3>

                <ul class="space-y-2 text-sm">

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

                <h3 class="mb-3 font-semibold text-slate-800">

                    Informasi

                </h3>

                <ul class="space-y-2 text-sm text-slate-500">

                    <li>Versi 1.0</li>

                    <li>{{ date('Y') }}</li>

                    <li>Dikembangkan untuk Digitalisasi UMKM Desa</li>

                </ul>

            </div>

        </div>

        <div class="mt-10 flex flex-col items-center justify-between gap-3 border-t border-slate-200 pt-6 text-sm text-slate-500 md:flex-row">

            <p>

                © {{ date('Y') }} SI UMKM Desa. Seluruh hak cipta dilindungi.

            </p>

            <p>

                Dibangun dengan Laravel & Tailwind CSS.

            </p>

        </div>

    </div>

</footer>

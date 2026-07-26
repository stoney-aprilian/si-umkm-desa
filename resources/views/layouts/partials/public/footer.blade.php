<footer class="border-t border-slate-200 bg-slate-950 text-slate-300">

    <div class="app-container py-16">

        <div class="grid gap-12 lg:grid-cols-4">

            {{-- ====================================================== --}}
            {{-- Brand --}}
            {{-- ====================================================== --}}
            <div class="lg:col-span-2">

                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center gap-4">

                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-600 text-lg font-bold text-white">

                        SI

                    </div>

                    <div>

                        <h2
                            class="text-xl font-bold text-white">

                            SI UMKM Desa

                        </h2>

                        <p
                            class="text-sm text-slate-400">

                            Desa Salamnunggal

                        </p>

                    </div>

                </a>

                <p
                    class="mt-6 max-w-lg leading-7 text-slate-400">

                    Sistem Informasi UMKM Desa merupakan platform digital untuk
                    memperkenalkan pelaku usaha, produk unggulan, dan potensi
                    ekonomi lokal kepada masyarakat secara lebih luas.

                </p>

            </div>





            {{-- ====================================================== --}}
            {{-- Navigasi --}}
            {{-- ====================================================== --}}
            <div>

                <h3
                    class="mb-5 text-sm font-semibold uppercase tracking-wider text-white">

                    Navigasi

                </h3>

                <ul class="space-y-3 text-sm">

                    <li>

                        <a
                            href="{{ route('home') }}"
                            class="transition hover:text-white">

                            Beranda

                        </a>

                    </li>

                    <li>

                        <a
                            href="{{ route('public.umkms.index') }}"
                            class="transition hover:text-white">

                            UMKM

                        </a>

                    </li>

                    <li>

                        <a
                            href="{{ route('public.products.index') }}"
                            class="transition hover:text-white">

                            Produk

                        </a>

                    </li>

                    <li>

                        <a
                            href="{{ route('about') }}"
                            class="transition hover:text-white">

                            Tentang

                        </a>

                    </li>

                </ul>

            </div>





            {{-- ====================================================== --}}
            {{-- Kontak --}}
            {{-- ====================================================== --}}
            <div>

                <h3
                    class="mb-5 text-sm font-semibold uppercase tracking-wider text-white">

                    Informasi

                </h3>

                <ul class="space-y-3 text-sm">

                    <li>

                        Pemerintah Desa Salamnunggal

                    </li>

                    <li>

                        Kecamatan Cibeber

                    </li>

                    <li>

                        Kabupaten Cianjur

                    </li>

                    <li>

                        Jawa Barat

                    </li>

                </ul>

            </div>

        </div>





        {{-- ====================================================== --}}
        {{-- Bottom --}}
        {{-- ====================================================== --}}
        <div
            class="mt-14 flex flex-col gap-4 border-t border-slate-800 pt-8 text-sm text-slate-500 md:flex-row md:items-center md:justify-between">

            <p>

                © {{ now()->year }}

                <span class="font-semibold text-slate-300">

                    SI UMKM Desa

                </span>

                • Seluruh hak cipta dilindungi.

            </p>

            <div
                class="flex items-center gap-3">

                <span>

                    Dibangun dengan Laravel

                </span>

                <span class="text-slate-700">

                    •

                </span>

                <span>

                    Tailwind CSS

                </span>

            </div>

        </div>

    </div>

</footer>

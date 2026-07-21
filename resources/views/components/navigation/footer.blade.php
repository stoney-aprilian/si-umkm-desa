<footer class="mt-24 border-t border-slate-200 bg-white">

    <div class="max-w-7xl mx-auto px-6 py-12">

        <div class="grid md:grid-cols-3 gap-10">

            <div>

                <h3 class="font-bold text-lg">
                    Sistem Informasi UMKM Desa
                </h3>

                <p class="mt-3 text-slate-600 leading-relaxed">

                    Platform digital untuk mendukung promosi dan pendataan UMKM desa secara modern, mudah diakses, dan berkelanjutan.

                </p>

            </div>

            <div>

                <h4 class="font-semibold">

                    Menu

                </h4>

                <ul class="mt-4 space-y-2">

                    <li>
                        <a href="{{ route('home') }}" class="hover:text-emerald-600">
                            Beranda
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('public.umkms.index') }}" class="hover:text-emerald-600">
                            UMKM
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('public.products.index') }}" class="hover:text-emerald-600">
                            Produk
                        </a>
                    </li>

                </ul>

            </div>

            <div>

                <h4 class="font-semibold">

                    Kontak

                </h4>

                <p class="mt-4 text-slate-600">

                    Pemerintah Desa

                    <br>

                    Email

                    <br>

                    Nomor Telepon

                </p>

            </div>

        </div>

        <div class="mt-12 pt-6 border-t border-slate-200 text-center text-sm text-slate-500">

            © {{ date('Y') }}

            Sistem Informasi UMKM Desa

        </div>

    </div>

</footer>

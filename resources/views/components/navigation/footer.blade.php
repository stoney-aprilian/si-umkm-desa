<footer class="public-footer">


    <div class="app-container py-16">


        <div class="grid gap-12 lg:grid-cols-12">


            {{-- Brand --}}
            <div class="lg:col-span-5">


                <div class="footer-brand">


                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-600 text-lg font-bold text-white shadow-sm">

                        SI

                    </div>


                    <div>

                        <h2 class="text-xl font-bold text-slate-900">

                            SI UMKM Desa

                        </h2>


                        <p class="text-sm text-slate-500">

                            Portal Digital UMKM Desa

                        </p>


                    </div>


                </div>


                <p class="footer-description">


                    Platform informasi digital yang membantu masyarakat mengenal
                    UMKM lokal, produk unggulan, dan potensi ekonomi desa secara
                    lebih mudah.


                </p>


            </div>



            {{-- Navigation --}}
            <div class="lg:col-span-3">


                <h3 class="footer-title">

                    Navigasi

                </h3>


                <ul class="footer-links">


                    <li>

                        <a
                            href="{{ route('home') }}">

                            Beranda

                        </a>

                    </li>


                    <li>

                        <a
                            href="{{ route('public.umkms.index') }}">

                            Daftar UMKM

                        </a>

                    </li>


                    <li>

                        <a
                            href="{{ route('public.products.index') }}">

                            Produk Unggulan

                        </a>

                    </li>


                </ul>


            </div>



            {{-- Information --}}
            <div class="lg:col-span-4">


                <h3 class="footer-title">

                    Informasi Desa

                </h3>


                <div class="footer-information">


                    <div>

                        <p class="footer-label">

                            Pemerintah Desa

                        </p>


                        <p>

                            Informasi kontak dapat diperbarui oleh administrator.

                        </p>


                    </div>



                    <div>

                        <p class="footer-label">

                            Email

                        </p>


                        <p>

                            info@desa.go.id

                        </p>


                    </div>



                    <div>

                        <p class="footer-label">

                            Telepon

                        </p>


                        <p>

                            (0000) 000-000

                        </p>


                    </div>


                </div>


            </div>


        </div>



        {{-- Bottom --}}
        <div class="footer-bottom">


            <p>

                © {{ date('Y') }}

                <span class="font-semibold text-slate-700">

                    SI UMKM Desa

                </span>

                · Seluruh hak cipta dilindungi.


            </p>



            <p>

                Mendukung digitalisasi UMKM dan ekonomi desa.

            </p>


        </div>


    </div>


</footer>

<footer class="border-t border-slate-200 bg-white">

    <div class="app-container py-20">

        <div class="grid gap-12 lg:grid-cols-12">

            {{-- ====================================================== --}}
            {{-- Brand --}}
            {{-- ====================================================== --}}
            <div class="lg:col-span-5">

                <a href="{{ route('home') }}" class="group inline-flex items-center gap-4">

                    <div
                        class="flex h-14 w-14 items-center justify-center rounded-3xl
                        bg-gradient-to-br from-emerald-500 via-emerald-600 to-emerald-700
                        text-xl font-black tracking-tight text-white
                        shadow-lg shadow-emerald-500/20
                        ring-1 ring-emerald-100
                        transition-all duration-300
                        group-hover:-translate-y-0.5
                        group-hover:scale-105">

                        SI

                    </div>

                    <div>

                        <h2 class="text-xl font-bold tracking-tight text-slate-900">

                            SI UMKM Desa

                        </h2>

                        <p class="mt-0.5 text-sm text-slate-500">

                            Portal Digital Desa Salamnunggal

                        </p>

                    </div>

                </a>

                <p class="mt-6 max-w-md leading-7 text-slate-600">

                    Platform digital yang membantu masyarakat menemukan UMKM,
                    produk unggulan, serta potensi ekonomi Desa Salamnunggal
                    dalam satu tempat yang mudah diakses.

                </p>

            </div>





            {{-- ====================================================== --}}
            {{-- Navigation --}}
            {{-- ====================================================== --}}
            <div class="lg:col-span-3">

                <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-400">

                    Navigasi

                </h3>

                <ul class="mt-6 space-y-4">

                    @foreach ([['Beranda', route('home')], ['Daftar UMKM', route('public.umkms.index')], ['Produk Unggulan', route('public.products.index')], ['Tentang', route('public.about')]] as [$label, $url])
                        <li>

                            <a href="{{ $url }}"
                                class="group inline-flex items-center gap-2 text-slate-600 transition-all duration-200 hover:text-emerald-600">

                                <span
                                    class="h-1.5 w-1.5 rounded-full bg-slate-300 transition-all duration-200 group-hover:bg-emerald-500">
                                </span>

                                <span class="group-hover:translate-x-1 transition-transform duration-200">

                                    {{ $label }}

                                </span>

                            </a>

                        </li>
                    @endforeach

                </ul>

            </div>





            {{-- ====================================================== --}}
            {{-- Contact --}}
            {{-- ====================================================== --}}
            <div class="lg:col-span-4">

                <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-400">

                    Informasi

                </h3>

                <div class="mt-6 space-y-5">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                            Pemerintah Desa

                        </p>

                        <p class="mt-1 text-slate-600">

                            Desa Salamnunggal

                        </p>

                    </div>

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                            Email

                        </p>

                        <a href="mailto:info@desa.go.id"
                            class="mt-1 inline-block text-slate-600 transition hover:text-emerald-600">

                            info@desa.go.id

                        </a>

                    </div>

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                            Telepon

                        </p>

                        <a href="tel:0000000000"
                            class="mt-1 inline-block text-slate-600 transition hover:text-emerald-600">

                            (0000) 000-000

                        </a>

                    </div>

                </div>

            </div>

        </div>





        {{-- ====================================================== --}}
        {{-- Bottom --}}
        {{-- ====================================================== --}}
        <div
            class="mt-16 flex flex-col gap-4 border-t border-slate-200 pt-8 text-sm text-slate-500 md:flex-row md:items-center md:justify-between">

            <p>

                © {{ now()->year }}

                <span class="font-semibold text-slate-700">

                    SI UMKM Desa

                </span>

                · Seluruh hak cipta dilindungi.

            </p>

            <p>

                Mendukung Digitalisasi UMKM Desa Salamnunggal.

            </p>

        </div>

    </div>

</footer>

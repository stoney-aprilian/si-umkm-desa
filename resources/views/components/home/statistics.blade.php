@props([
    'statistics',
    'categories',
])


<section class="public-section">


    <div class="app-container">


        <x-ui.section-title
            title="Potensi UMKM Desa"
            subtitle="Gambaran perkembangan UMKM, produk lokal, dan ragam usaha yang telah terdaftar dalam platform digital desa." />



        <div class="public-stat-grid mt-12">


            {{-- UMKM --}}
            <div class="public-stat">


                <div class="icon-wrapper icon-wrapper-lg icon-wrapper-primary mx-auto">


                    <svg
                        class="h-7 w-7"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 21h18M5 21V8l7-4 7 4v13"/>

                    </svg>


                </div>



                <p class="public-stat-label mt-6">

                    Total UMKM

                </p>


                <h3 class="public-stat-number mt-2">


                    {{ number_format($statistics['umkms'] ?? 0) }}


                </h3>


                <p class="mt-4 text-sm leading-7 text-slate-500">


                    Pelaku usaha lokal yang telah bergabung dan dipublikasikan melalui platform.


                </p>


            </div>





            {{-- Products --}}
            <div class="public-stat">


                <div class="icon-wrapper icon-wrapper-lg icon-wrapper-primary mx-auto">


                    <svg
                        class="h-7 w-7"
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



                <p class="public-stat-label mt-6">

                    Produk Lokal

                </p>



                <h3 class="public-stat-number mt-2">


                    {{ number_format($statistics['products'] ?? 0) }}


                </h3>



                <p class="mt-4 text-sm leading-7 text-slate-500">


                    Produk unggulan desa yang dapat ditemukan dan dijelajahi masyarakat.


                </p>


            </div>





            {{-- Categories --}}
            <div class="public-stat">


                <div class="icon-wrapper icon-wrapper-lg icon-wrapper-primary mx-auto">


                    <svg
                        class="h-7 w-7"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">


                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 7h6l2 2h10v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>


                    </svg>


                </div>



                <p class="public-stat-label mt-6">

                    Kategori Usaha

                </p>



                <h3 class="public-stat-number mt-2">


                    {{ number_format($statistics['categories'] ?? 0) }}


                </h3>



                <p class="mt-4 text-sm leading-7 text-slate-500">


                    Ragam bidang usaha yang menggambarkan potensi ekonomi desa.


                </p>


            </div>



        </div>


    </div>


</section>

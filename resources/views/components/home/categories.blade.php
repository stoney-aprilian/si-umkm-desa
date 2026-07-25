@props([
    'categories',
])


<section class="public-section bg-slate-50">


    <div class="app-container">


        <x-ui.section-title
            title="Kategori UMKM"
            subtitle="Jelajahi berbagai bidang usaha lokal yang menjadi potensi ekonomi Desa Salamnunggal." />



        @if($categories->isNotEmpty())


            <div class="public-category-grid mt-12">


                @foreach($categories as $category)


                    <a
                        href="{{ route('public.umkms.index', ['category' => $category->id]) }}"
                        class="public-category group">


                        <div class="icon-wrapper icon-wrapper-lg icon-wrapper-primary">


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



                        <h3 class="public-category-title mt-5">


                            {{ $category->name }}


                        </h3>



                        <p class="mt-2 text-sm leading-6 text-slate-500">


                            Lihat UMKM dan produk dalam kategori ini.


                        </p>



                        <span class="mt-4 text-sm font-medium text-emerald-600 opacity-0 transition group-hover:opacity-100">


                            Jelajahi →


                        </span>


                    </a>


                @endforeach


            </div>



        @else


            <div class="empty-state mt-10">


                <div class="icon-wrapper icon-wrapper-lg mx-auto">


                    <svg
                        class="h-8 w-8"
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



                <h3 class="mt-6 text-lg font-semibold text-slate-900">


                    Belum Ada Kategori


                </h3>



                <p class="mt-2 text-slate-500">


                    Kategori UMKM akan muncul setelah data tersedia.


                </p>


            </div>


        @endif


    </div>


</section>

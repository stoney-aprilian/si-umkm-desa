@props([
    'products',
])


<section class="public-section">


    <div class="app-container">


        <x-ui.section-title
            title="Produk Unggulan"
            subtitle="Temukan berbagai produk lokal hasil karya pelaku UMKM Desa Salamnunggal yang memiliki nilai ekonomi dan potensi untuk dikembangkan." />



        @if ($products->isNotEmpty())


            <div class="public-product-grid mt-12">


                @foreach ($products as $product)


                    <x-product.card
                        :product="$product" />


                @endforeach


            </div>



            <div class="mt-14 text-center">


                <p class="mb-5 text-sm text-slate-500">


                    Jelajahi lebih banyak produk lokal dari berbagai UMKM desa.


                </p>



                <a
                    href="{{ route('public.products.index') }}"
                    class="btn-secondary">


                    Jelajahi Semua Produk


                </a>


            </div>



        @else


            <div class="mt-10">


                <x-ui.empty-state>

                    Produk akan ditampilkan setelah data tersedia.

                </x-ui.empty-state>


            </div>


        @endif


    </div>


</section>

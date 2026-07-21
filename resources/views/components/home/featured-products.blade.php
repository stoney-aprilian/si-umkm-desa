@props([
    'products',
])

<section class="pb-24">

    <div class="app-container">

        <x-ui.section-title
            title="Produk Terbaru"
            subtitle="Temukan berbagai produk unggulan dari UMKM desa yang siap dipasarkan kepada masyarakat." />

        @if($products->isNotEmpty())

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach($products as $product)

                    <x-product.card
                        :product="$product" />

                @endforeach

            </div>

            <div class="mt-12 text-center">

                <a
                    href="{{ route('public.products.index') }}"
                    class="btn-secondary">

                    Lihat Semua Produk

                </a>

            </div>

        @else

            <x-ui.empty-state>

                Belum ada produk yang tersedia.

            </x-ui.empty-state>

        @endif

    </div>

</section>

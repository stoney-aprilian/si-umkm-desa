@props([
    'products',
])

<section class="bg-white py-24">

    <div class="app-container">

        <x-ui.section-title
            title="Produk Unggulan"
            subtitle="Temukan berbagai produk unggulan hasil karya pelaku UMKM desa yang siap dipasarkan kepada masyarakat." />

        @if ($products->isNotEmpty())

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach ($products as $product)

                    <x-product.card
                        :product="$product" />

                @endforeach

            </div>

            <div class="mt-14 text-center">

                <p class="mb-5 text-sm text-slate-500">

                    Ingin melihat lebih banyak produk dari UMKM Desa?

                </p>

                <a
                    href="{{ route('public.products.index') }}"
                    class="btn-secondary">

                    Lihat Semua Produk

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

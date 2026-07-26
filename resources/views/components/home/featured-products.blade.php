@props([
    'products',
])

<section>

    <div class="app-container">

        {{-- ====================================================== --}}
        {{-- Header --}}
        {{-- ====================================================== --}}
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

            <x-ui.section-title
                title="Produk Unggulan"
                subtitle="Temukan berbagai produk lokal unggulan hasil karya pelaku UMKM Desa Salamnunggal yang siap diperkenalkan kepada masyarakat." />

            @if($products->isNotEmpty())

                <x-ui.button
                    href="{{ route('public.products.index') }}"
                    variant="secondary">

                    Lihat Semua Produk

                </x-ui.button>

            @endif

        </div>





        {{-- ====================================================== --}}
        {{-- Product Grid --}}
        {{-- ====================================================== --}}
        @if($products->isNotEmpty())

            <div
                class="mt-12 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">

                @foreach($products as $product)

                    <x-product.card
                        :product="$product" />

                @endforeach

            </div>





            {{-- Bottom CTA --}}
            <div
                class="mt-14 rounded-3xl border border-emerald-100 bg-emerald-50 px-8 py-8">

                <div
                    class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                    <div>

                        <h3
                            class="text-xl font-bold text-slate-900">

                            Masih banyak produk menarik lainnya.

                        </h3>

                        <p
                            class="mt-2 leading-7 text-slate-600">

                            Jelajahi seluruh katalog produk UMKM Desa Salamnunggal
                            dan temukan berbagai produk lokal berkualitas.

                        </p>

                    </div>

                    <x-ui.button
                        href="{{ route('public.products.index') }}">

                        Jelajahi Produk

                    </x-ui.button>

                </div>

            </div>





        @else

            <div
                class="mt-12 rounded-3xl border border-dashed border-slate-300 bg-slate-50 px-8 py-16 text-center">

                <div
                    class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-slate-100 text-slate-400">

                    <svg
                        class="h-10 w-10"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 7L12 3 4 7l8 4 8-4M4 9l8 4 8-4V9l-8 4z"/>

                    </svg>

                </div>

                <h3
                    class="mt-6 text-xl font-bold text-slate-900">

                    Belum Ada Produk

                </h3>

                <p
                    class="mx-auto mt-3 max-w-lg leading-7 text-slate-500">

                    Produk unggulan akan ditampilkan setelah data tersedia di dalam sistem.

                </p>

            </div>

        @endif

    </div>

</section>

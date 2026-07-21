@props(['product'])

<div
    class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-emerald-200 hover:shadow-xl">

    {{-- Image --}}
    <div class="relative overflow-hidden">

        @if ($product->image)

            <img
                src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->name }}"
                class="h-60 w-full object-cover transition duration-500 group-hover:scale-105">

        @else

            <div class="flex h-60 items-center justify-center bg-slate-100">

                <span class="text-sm text-slate-400">

                    Tidak ada gambar

                </span>

            </div>

        @endif

    </div>

    {{-- Content --}}
    <div class="flex flex-1 flex-col p-6">

        @if ($product->umkm)

            <p class="mb-2 text-sm font-medium text-emerald-600">

                {{ $product->umkm->business_name }}

            </p>

        @endif

        <h3 class="line-clamp-2 text-xl font-bold text-slate-900">

            {{ $product->name }}

        </h3>

        <p class="mt-3 line-clamp-3 flex-1 text-sm leading-6 text-slate-600">

            {{ $product->description ?: 'Belum ada deskripsi produk.' }}

        </p>

        @if ($product->price)

            <div class="mt-6">

                <p class="text-sm text-slate-400">

                    Harga

                </p>

                <p class="text-2xl font-bold text-emerald-600">

                    Rp {{ number_format($product->price, 0, ',', '.') }}

                </p>

            </div>

        @endif

        <a
            href="{{ route('public.products.show', $product) }}"
            class="btn-primary mt-6 w-full justify-center">

            Lihat Detail

        </a>

    </div>

</div>

@props(['product'])

<div
    class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-emerald-200 hover:shadow-2xl">

    {{-- Image --}}
    <div class="relative overflow-hidden">

        @if ($product->image)

            <img
                src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->name }}"
                class="h-64 w-full object-cover transition duration-700 group-hover:scale-110">

        @else

            <div class="flex h-64 items-center justify-center bg-slate-100">

                <svg
                    class="h-12 w-12 text-slate-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/>

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M14 7h.01"/>

                    <rect
                        x="3"
                        y="3"
                        width="18"
                        height="18"
                        rx="2"
                        ry="2"/>

                </svg>

            </div>

        @endif

        {{-- Gradient --}}
        <div
            class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-black/40 to-transparent opacity-0 transition group-hover:opacity-100">
        </div>

        {{-- Price Badge --}}
        @if ($product->price)

            <div
                class="absolute right-4 top-4 rounded-full bg-white/95 px-4 py-2 text-sm font-semibold text-emerald-700 shadow">

                Rp {{ number_format($product->price,0,',','.') }}

            </div>

        @endif

    </div>

    {{-- Content --}}
    <div class="flex flex-1 flex-col p-6">

        @if ($product->umkm)

            <div
                class="mb-4 inline-flex w-fit items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">

                {{ $product->umkm->business_name }}

            </div>

        @endif

        <h3
            class="line-clamp-2 text-xl font-bold leading-snug text-slate-900">

            {{ $product->name }}

        </h3>

        <p
            class="mt-4 line-clamp-3 flex-1 text-sm leading-7 text-slate-600">

            {{ $product->description ?: 'Belum ada deskripsi produk.' }}

        </p>

        @if ($product->price)

            <div class="mt-6">

                <p
                    class="text-xs font-medium uppercase tracking-widest text-slate-400">

                    Harga

                </p>

                <div
                    class="mt-1 text-3xl font-bold tracking-tight text-emerald-600">

                    Rp {{ number_format($product->price,0,',','.') }}

                </div>

            </div>

        @endif

        <a
            href="{{ route('public.products.show',$product) }}"
            class="mt-7 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-emerald-700">

            Lihat Detail

            <svg
                class="h-4 w-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"/>

            </svg>

        </a>

    </div>

</div>

@props(['product'])


<a
    href="{{ route('public.products.show', $product) }}"
    class="group app-card app-card-hover flex h-full flex-col overflow-hidden">


    {{-- Image --}}
    <div class="overflow-hidden bg-slate-100">


        @if ($product->image)


            <img
                src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->name }}"
                loading="lazy"
                decoding="async"
                class="h-56 w-full object-cover transition duration-500 group-hover:scale-105">


        @else


            <div class="flex h-56 items-center justify-center bg-slate-50 text-slate-300">


                <svg
                    class="h-12 w-12"
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


    </div>




    {{-- Content --}}
    <div class="flex flex-1 flex-col p-6">


        {{-- Owner --}}
        @if ($product->umkm)


            <span class="badge-success w-fit">


                {{ $product->umkm->business_name }}


            </span>


        @endif




        {{-- Name --}}
        <h3 class="mt-4 line-clamp-2 text-xl font-bold tracking-tight text-slate-900 group-hover:text-emerald-700">


            {{ $product->name }}


        </h3>




        {{-- Description --}}
        <p class="mt-3 line-clamp-3 flex-1 text-sm leading-7 text-slate-600">


            {{ $product->description ?: 'Belum ada deskripsi produk.' }}


        </p>




        {{-- Price --}}
        @if ($product->price)


            <div class="mt-5">


                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">

                    Harga mulai

                </p>


                <p class="mt-1 text-xl font-bold text-emerald-600">


                    Rp {{ number_format($product->price,0,',','.') }}


                </p>


            </div>


        @endif




        {{-- Action --}}
        <div class="mt-6 flex items-center justify-between">


            <span class="text-sm font-semibold text-emerald-600">


                Lihat Produk →


            </span>


        </div>


    </div>


</a>

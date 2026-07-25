<header
    class="sticky top-0 z-30 border-b border-slate-200 bg-white/90 backdrop-blur">


    <div class="app-container flex h-16 items-center justify-between gap-6">



        {{-- Page Identity --}}
        <div class="min-w-0 shrink-0">


            <h1
                class="truncate text-xl font-bold tracking-tight text-slate-900">

                @yield('title', 'Dashboard')

            </h1>



            <p class="text-xs text-slate-500">

                {{ now()->locale('id')->translatedFormat('l, d F Y') }}

            </p>


        </div>





        {{-- Global Search --}}
        <div class="hidden flex-1 md:block">


            <form
                action="{{ route('admin.search') }}"
                method="GET"
                class="mx-auto max-w-xl">


                <div class="relative">


                    <svg
                        class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">


                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />


                    </svg>



                    <input
                        type="search"
                        name="q"
                        placeholder="Cari UMKM, produk, kategori..."
                        class="app-input pl-12">


                </div>


            </form>


        </div>





        {{-- User Area --}}
        <div class="flex shrink-0 items-center gap-3">



            {{-- User Info --}}
            <div class="hidden text-right leading-tight sm:block">


                <p class="text-sm font-semibold text-slate-900">

                    {{ auth()->user()->name }}

                </p>


                <p class="text-xs capitalize text-slate-500">

                    {{ auth()->user()->role }}

                </p>


            </div>





            {{-- Avatar --}}
            <div
                class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-600 text-sm font-bold text-white">


                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}


            </div>



        </div>



    </div>


</header>

<aside class="flex min-h-screen w-[280px] shrink-0 flex-col border-r border-slate-200 bg-white">


    {{-- Branding --}}
    <div class="border-b border-slate-200 px-6 py-6">

        <a
            href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-4">


            <div
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-600 text-lg font-bold text-white shadow-sm">

                SI

            </div>



            <div class="min-w-0">


                <h1 class="truncate text-lg font-bold tracking-tight text-slate-900">

                    SI UMKM Desa

                </h1>



                <p class="text-xs text-slate-500">

                    Sistem Informasi UMKM

                </p>


                <p class="mt-1 text-[11px] text-slate-400">

                    Desa Salamnunggal

                </p>


            </div>


        </a>


    </div>







    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto px-5 py-6">


        <div class="space-y-8">





            {{-- Dashboard --}}
            <div>


                <a
                    href="{{ route('admin.dashboard') }}"
                    class="group relative flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200

                    {{ request()->routeIs('admin.dashboard')
                        ? 'bg-emerald-50 font-semibold text-emerald-700'
                        : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'
                    }}">


                    @if(request()->routeIs('admin.dashboard'))

                        <span
                            class="absolute left-0 h-6 w-1 rounded-r-full bg-emerald-600">
                        </span>

                    @endif



                    <svg
                        class="h-5 w-5 shrink-0"

                        fill="none"

                        stroke="currentColor"

                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 10l9-7 9 7v10a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1V10z"/>

                    </svg>



                    <span>
                        Dashboard
                    </span>


                </a>


            </div>








            {{-- Master Data --}}
            <div>


                <p
                    class="mb-3 px-3 text-[11px] font-bold uppercase tracking-[0.18em] text-slate-400">

                    Master Data

                </p>



                <div class="space-y-1">





                    {{-- Kategori --}}
                    <a
                        href="{{ route('admin.categories.index') }}"

                        class="group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200

                        {{ request()->routeIs('admin.categories.*')
                            ? 'bg-emerald-50 font-semibold text-emerald-700'
                            : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'
                        }}">



                        <svg
                            class="h-5 w-5 shrink-0"

                            fill="none"

                            stroke="currentColor"

                            viewBox="0 0 24 24">


                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 7h6l2 2h10v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>


                        </svg>



                        <span>
                            Kategori
                        </span>



                    </a>







                    {{-- UMKM --}}
                    <a
                        href="{{ route('admin.umkms.index') }}"

                        class="group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200

                        {{ request()->routeIs('admin.umkms.*')
                            ? 'bg-emerald-50 font-semibold text-emerald-700'
                            : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'
                        }}">



                        <svg
                            class="h-5 w-5 shrink-0"

                            fill="none"

                            stroke="currentColor"

                            viewBox="0 0 24 24">


                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 21h18M5 21V9l7-6 7 6v12"/>


                        </svg>



                        <span>
                            UMKM
                        </span>


                    </a>








                    {{-- Produk --}}
                    <a
                        href="{{ route('admin.products.index') }}"

                        class="group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200

                        {{ request()->routeIs('admin.products.*')
                            ? 'bg-emerald-50 font-semibold text-emerald-700'
                            : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'
                        }}">



                        <svg
                            class="h-5 w-5 shrink-0"

                            fill="none"

                            stroke="currentColor"

                            viewBox="0 0 24 24">


                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 7L12 3 4 7l8 4 8-4zM4 9v8l8 4 8-4V9"/>


                        </svg>



                        <span>
                            Produk
                        </span>


                    </a>



                </div>


            </div>






            {{-- Future Section --}}
            <div>


                <p
                    class="mb-3 px-3 text-[11px] font-bold uppercase tracking-[0.18em] text-slate-400">

                    Sistem

                </p>


                <div class="space-y-1">


                    <a
                        href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-slate-400 cursor-not-allowed">


                        <svg
                            class="h-5 w-5"

                            fill="none"

                            stroke="currentColor"

                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10.325 4.317a1 1 0 011.35-.936l1.8.72a1 1 0 011.3.58l.5 1.2a8 8 0 011.5.87l1.3-.25a1 1 0 011.1.55l.9 1.8a1 1 0 01-.25 1.15l-1 .9a8 8 0 010 1.74l1 .9a1 1 0 01.25 1.15l-.9 1.8a1 1 0 01-1.1.55l-1.3-.25a8 8 0 01-1.5.87l-.5 1.2a1 1 0 01-1.3.58l-1.8.72a1 1 0 01-1.35-.94V17a8 8 0 010-10.68V4.317z"/>

                        </svg>


                        Pengaturan

                    </a>


                </div>


            </div>



        </div>


    </nav>









    {{-- User --}}
    <div class="border-t border-slate-200 px-5 py-5">



        <div class="flex items-center gap-3">


            <div
                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-emerald-100 font-bold text-emerald-700">


                {{ strtoupper(substr(auth()->user()->name,0,1)) }}


            </div>



            <div class="min-w-0">


                <p class="truncate text-sm font-semibold text-slate-900">

                    {{ auth()->user()->name }}

                </p>


                <p class="text-xs capitalize text-slate-500">

                    {{ auth()->user()->role }}

                </p>


            </div>


        </div>





        <form
            method="POST"
            action="{{ route('logout') }}"
            class="mt-4">


            @csrf


            <button
                type="submit"

                class="flex w-full items-center justify-center rounded-lg bg-red-50 px-4 py-2.5 text-sm font-medium text-red-600 transition hover:bg-red-100">

                Logout

            </button>


        </form>




        <p class="mt-4 text-center text-[11px] text-slate-400">

            SI UMKM Desa v1.0

        </p>


    </div>


</aside>

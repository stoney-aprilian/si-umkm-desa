<header class="public-navbar">

    <div class="app-container">

        <div class="flex h-20 items-center justify-between">


            {{-- Brand --}}
            <a
                href="{{ route('home') }}"
                class="navbar-brand group">


                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-600 text-white shadow-sm transition duration-300 group-hover:-translate-y-1">


                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 21h18M5 21V8l7-4 7 4v13"/>

                    </svg>


                </div>


                <div>

                    <h1 class="text-lg font-bold tracking-tight text-slate-900">

                        SI UMKM Desa

                    </h1>


                    <p class="text-xs text-slate-500">

                        Platform Digital UMKM

                    </p>

                </div>


            </a>



            {{-- Desktop Navigation --}}
            <nav class="navbar-menu hidden md:flex">


                <a
                    href="{{ route('home') }}"
                    class="navbar-link
                    {{ request()->routeIs('home')
                        ? 'navbar-link-active'
                        : '' }}">

                    Beranda

                </a>


                <a
                    href="{{ route('public.umkms.index') }}"
                    class="navbar-link
                    {{ request()->routeIs('public.umkms.*')
                        ? 'navbar-link-active'
                        : '' }}">

                    UMKM

                </a>


                <a
                    href="{{ route('public.products.index') }}"
                    class="navbar-link
                    {{ request()->routeIs('public.products.*')
                        ? 'navbar-link-active'
                        : '' }}">

                    Produk

                </a>


            </nav>



            {{-- Actions --}}
            <div class="navbar-actions">


                <a
                    href="{{ route('login') }}"
                    class="btn-primary hidden md:inline-flex">


                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">


                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m-6-3h11.25m0 0l-3-3m3 3l-3 3"/>


                    </svg>


                    Login


                </a>



                {{-- Mobile Menu --}}
                <button
                    type="button"
                    class="mobile-menu-toggle"
                    aria-label="Buka menu">


                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">


                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>


                    </svg>


                </button>


            </div>


        </div>

    </div>

</header>

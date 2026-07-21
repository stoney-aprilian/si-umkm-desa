<header class="sticky top-0 z-30 border-b border-slate-200 bg-white/90 backdrop-blur">

    <div class="app-container flex h-20 items-center justify-between">

        {{-- Left --}}
        <div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-900">

                @yield('title', 'Dashboard')

            </h1>

            <p class="mt-1 text-sm text-slate-500">

                {{ now()->translatedFormat('l, d F Y') }}

            </p>

        </div>

        {{-- Right --}}
        <div class="flex items-center gap-4">

            {{-- Search --}}
            <div class="hidden lg:block">

                <div class="relative">

                    <input
                        type="text"
                        placeholder="Cari..."
                        class="app-input w-72 pl-10">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m21 21-4.35-4.35m1.85-5.15a7 7 0 1 1-14 0a7 7 0 0 1 14 0Z"/>

                    </svg>

                </div>

            </div>

            {{-- Notification --}}
            <button
                type="button"
                class="flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 transition-all duration-200 hover:bg-slate-100 hover:text-slate-700">

                🔔

            </button>

            {{-- User --}}
            <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white px-3 py-2 shadow-sm">

                <div class="text-right">

                    <p class="text-sm font-semibold text-slate-800">

                        {{ auth()->user()->name }}

                    </p>

                    <p class="text-xs capitalize text-slate-500">

                        {{ auth()->user()->role }}

                    </p>

                </div>

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-600 text-sm font-bold text-white">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

            </div>

        </div>

    </div>

</header>

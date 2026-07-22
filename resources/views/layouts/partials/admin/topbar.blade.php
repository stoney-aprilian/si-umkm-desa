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
        <div class="flex items-center gap-3">

            {{-- Search --}}
            <div class="relative hidden lg:block">

                <svg
                    class="pointer-events-none absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 110-15 7.5 7.5 0 010 15z"/>

                </svg>

                <input
                    type="text"
                    placeholder="Pencarian (Segera Hadir)"
                    disabled
                    class="app-input w-72 cursor-not-allowed bg-slate-50 pl-10 text-slate-400">

            </div>

            {{-- Notification --}}
            <button
                type="button"
                title="Notifikasi"
                class="flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 transition hover:bg-slate-100 hover:text-slate-700">

                <svg
                    class="h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 11-6 0h6z"/>

                </svg>

            </button>

            {{-- User --}}
            <div class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-3 py-2 shadow-sm">

                <div class="text-right leading-tight">

                    <p class="text-sm font-semibold text-slate-900">

                        {{ auth()->user()->name }}

                    </p>

                    <p class="text-xs capitalize text-slate-500">

                        {{ auth()->user()->role }}

                    </p>

                </div>

                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-600 text-sm font-bold text-white">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

            </div>

        </div>

    </div>

</header>

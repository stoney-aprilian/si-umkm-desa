<footer
    class="border-t border-slate-200 bg-white/70 backdrop-blur-sm">

    <div
        class="app-container">

        <div
            class="flex flex-col gap-3 py-5 text-sm text-slate-500 md:flex-row md:items-center md:justify-between">

            {{-- Left --}}
            <div
                class="flex flex-wrap items-center gap-2">

                <span class="font-medium text-slate-700">

                    © {{ now()->year }}

                </span>

                <span>

                    SI UMKM Desa Salamnunggal

                </span>

            </div>

            {{-- Right --}}
            <div
                class="flex flex-wrap items-center gap-3 text-xs text-slate-400">

                <span>

                    Powered by Laravel {{ app()->version() }}

                </span>

                <span class="text-slate-300">

                    •

                </span>

                <span>

                    Build v{{ config('app.version', '1.0.0') }}

                </span>

            </div>

        </div>

    </div>

</footer>

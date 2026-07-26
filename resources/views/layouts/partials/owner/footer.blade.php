<footer class="border-t border-slate-200 bg-white">

    <div class="app-container flex flex-col items-center justify-between gap-3 py-5 text-sm text-slate-500 md:flex-row">

        {{-- Copyright --}}
        <p>

            &copy; {{ now()->year }}
            {{ config('app.name') }}.
            Seluruh hak cipta dilindungi.

        </p>





        {{-- Panel Information --}}
        <div class="flex items-center gap-2">

            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

            <span>

                Owner Panel

            </span>

        </div>

    </div>

</footer>

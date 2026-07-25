<footer class="border-t border-slate-200 bg-white">

    <div class="app-container py-6">

        <div
            class="flex flex-col gap-3 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between">


            {{-- Copyright --}}
            <p>

                © {{ now()->year }}

                <span class="font-semibold text-slate-700">

                    SI UMKM Desa

                </span>

            </p>




            {{-- System Information --}}
            <div class="flex items-center gap-3">


                <span>

                    Portal Digital UMKM Desa

                </span>



                <span class="text-slate-300">

                    •

                </span>



                <span>

                    v{{ config('app.version', '1.0') }}

                </span>


            </div>


        </div>


    </div>

</footer>

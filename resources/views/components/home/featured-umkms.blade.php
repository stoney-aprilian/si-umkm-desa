@props([
    'umkms',
])


<section class="public-section bg-slate-50">


    <div class="app-container">


        <x-ui.section-title
            title="UMKM Unggulan"
            subtitle="Kenali pelaku usaha lokal dan temukan berbagai potensi ekonomi Desa Salamnunggal melalui platform digital ini." />



        @if ($umkms->isNotEmpty())


            <div class="public-umkm-grid mt-12">


                @foreach ($umkms as $umkm)


                    <x-umkm.card
                        :umkm="$umkm" />


                @endforeach


            </div>



            <div class="mt-14 text-center">


                <p class="mb-5 text-sm text-slate-500">


                    Masih banyak UMKM lokal lainnya yang dapat Anda jelajahi.


                </p>



                <a
                    href="{{ route('public.umkms.index') }}"
                    class="btn-secondary">


                    Jelajahi Semua UMKM


                </a>


            </div>


        @else


            <div class="mt-10">


                <x-ui.empty-state>

                    Data UMKM akan ditampilkan setelah tersedia.

                </x-ui.empty-state>


            </div>


        @endif


    </div>


</section>

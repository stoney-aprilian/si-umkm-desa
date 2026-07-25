@props(['umkm'])


<a
    href="{{ route('public.umkms.show', $umkm) }}"
    class="group app-card app-card-hover flex h-full flex-col overflow-hidden">


    {{-- Image --}}
    <div class="overflow-hidden bg-slate-100">


        @if ($umkm->logo)


            <img
                src="{{ asset('storage/' . $umkm->logo) }}"
                alt="Logo {{ $umkm->business_name }}"
                loading="lazy"
                decoding="async"
                class="h-52 w-full object-cover transition duration-500 group-hover:scale-105">


        @else


            <div class="flex h-52 flex-col items-center justify-center bg-slate-50 text-slate-400">


                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white shadow-sm">


                    <svg
                        class="h-8 w-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M3.75 21h16.5M5.25 21V8.25l6.75-4.5 6.75 4.5V21M9 21v-6h6v6"/>

                    </svg>


                </div>


                <p class="mt-4 text-sm font-medium">

                    Logo belum tersedia

                </p>


            </div>


        @endif


    </div>



    {{-- Content --}}
    <div class="flex flex-1 flex-col p-6">


        <div>

            <x-ui.badge>

                {{ $umkm->category?->name ?? 'Tanpa Kategori' }}

            </x-ui.badge>

        </div>



        <h3
            class="mt-4 text-xl font-bold tracking-tight text-slate-900 transition-colors group-hover:text-emerald-700">


            {{ $umkm->business_name }}


        </h3>



        <p class="mt-3 line-clamp-2 flex-1 text-sm leading-7 text-slate-600">


            {{ $umkm->description ?: 'Belum ada deskripsi.' }}


        </p>



        {{-- Location --}}
        <div class="mt-5 flex items-center gap-2 text-sm text-slate-500">


            <svg
                class="h-4 w-4 shrink-0"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">


                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0L6.343 16.657A8 8 0 1117.657 16.657z"/>


                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>


            </svg>



            <span class="line-clamp-1">


                {{
                    collect([
                        $umkm->village,
                        $umkm->district,
                        $umkm->regency,
                    ])->filter()->implode(', ')
                }}


            </span>


        </div>



        {{-- Footer --}}
        <div class="mt-6 flex items-center justify-between">


            <span class="text-sm font-medium text-emerald-600">

                Lihat Profil →

            </span>


        </div>


    </div>


</a>

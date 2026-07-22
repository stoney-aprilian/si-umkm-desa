@props(['umkm'])

<a
    href="{{ route('public.umkms.show', $umkm) }}"
    class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-emerald-200 hover:shadow-xl">

    {{-- Logo --}}
    <div class="overflow-hidden bg-slate-100">

        @if ($umkm->logo)

            <img
                src="{{ asset('storage/' . $umkm->logo) }}"
                alt="Logo {{ $umkm->business_name }}"
                loading="lazy"
                decoding="async"
                class="h-60 w-full object-cover transition-transform duration-500 group-hover:scale-105">

        @else

            <div class="flex h-60 flex-col items-center justify-center bg-slate-50 text-slate-400">

                <div
                    class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white shadow-sm">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M3.75 21h16.5M5.25 21V8.25l6.75-4.5l6.75 4.5V21M9 21v-6h6v6M8.25 9.75h.008v.008H8.25V9.75zm7.5 0h.008v.008h-.008V9.75z" />

                    </svg>

                </div>

                <p class="mt-4 text-sm font-medium">

                    Logo belum tersedia

                </p>

            </div>

        @endif

    </div>

    {{-- Body --}}
    <div class="flex flex-1 flex-col p-6">

        <div class="mb-3">

            <x-ui.badge>

                {{ $umkm->category?->name ?? 'Tanpa Kategori' }}

            </x-ui.badge>

        </div>

        <h3
            class="text-xl font-bold tracking-tight text-slate-900 transition-colors group-hover:text-emerald-700">

            {{ $umkm->business_name }}

        </h3>

        <p class="mt-3 flex-1 line-clamp-2 text-sm leading-7 text-slate-600">

            {{ $umkm->description ?: 'Belum ada deskripsi.' }}

        </p>

        <div class="mt-5 flex items-center gap-2 text-sm text-slate-500">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 shrink-0"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0L6.343 16.657A8 8 0 1117.657 16.657z" />

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />

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

        <div class="mt-6">

            <span
                class="btn-primary inline-flex w-full justify-center transition-all duration-300 group-hover:shadow-md">

                Lihat Detail

            </span>

        </div>

    </div>

</a>

@props(['umkm'])

<a
    href="{{ route('public.umkms.show', $umkm) }}"
    class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-emerald-200 hover:shadow-xl">

    {{-- Logo --}}
    <div class="overflow-hidden bg-slate-100">

        @if ($umkm->logo)

            <img
                src="{{ asset('storage/' . $umkm->logo) }}"
                alt="{{ $umkm->business_name }}"
                class="h-60 w-full object-cover transition duration-500 group-hover:scale-105">

        @else

            <div class="flex h-60 flex-col items-center justify-center text-slate-400">

                <div class="text-5xl">
                    🏪
                </div>

                <p class="mt-3 text-sm">
                    Logo UMKM
                </p>

            </div>

        @endif

    </div>

    {{-- Body --}}
    <div class="flex flex-1 flex-col p-6">

        <div class="mb-3">

            <x-ui.badge>

                {{ $umkm->category->name }}

            </x-ui.badge>

        </div>

        <h3 class="text-xl font-bold text-slate-900">

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
                    d="M15 11a3 3 0 11-6 0 3 0 016 0z"/>

            </svg>

            <span class="line-clamp-1">

                {{ collect([
                    $umkm->village,
                    $umkm->district,
                    $umkm->regency,
                ])->filter()->implode(', ') }}

            </span>

        </div>

        <div class="mt-6">

            <span class="btn-primary inline-flex w-full justify-center">

                Lihat Detail

            </span>

        </div>

    </div>

</a>

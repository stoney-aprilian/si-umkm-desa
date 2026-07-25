<x-ui.card>

    <div class="flex items-start justify-between">

        <div>

            <h2 class="text-lg font-semibold text-slate-900">

                Ringkasan UMKM

            </h2>

            <p class="mt-2 text-sm text-slate-500">

                Informasi singkat mengenai UMKM yang Anda kelola.

            </p>

        </div>

        <x-ui.button
            size="sm"
            variant="secondary"
            :href="route('owner.profile.edit')">

            Edit Profil

        </x-ui.button>

    </div>

    <div class="mt-6 grid gap-6 md:grid-cols-2">

        <div>

            <p class="text-sm font-medium text-slate-500">

                Nama UMKM

            </p>

            <p class="mt-1 text-base font-semibold text-slate-900">

                {{ $umkm?->name ?? '-' }}

            </p>

        </div>

        <div>

            <p class="text-sm font-medium text-slate-500">

                Kategori

            </p>

            <p class="mt-1 text-base font-semibold text-slate-900">

                {{ $stats['category'] ?? '-' }}

            </p>

        </div>

        <div>

            <p class="text-sm font-medium text-slate-500">

                Status

            </p>

            <p class="mt-1">

                @if ($stats['status'])

                    <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-sm font-medium text-emerald-700">

                        {{ ucfirst($stats['status']) }}

                    </span>

                @else

                    <span class="text-slate-500">

                        -

                    </span>

                @endif

            </p>

        </div>

        <div>

            <p class="text-sm font-medium text-slate-500">

                Bergabung Sejak

            </p>

            <p class="mt-1 text-base font-semibold text-slate-900">

                {{ $stats['joined_at'] ?? '-' }}

            </p>

        </div>

    </div>

</x-ui.card>

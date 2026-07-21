@props([
    'categories',
])

<section class="pb-24">

    <div class="app-container">

        <x-ui.section-title
            title="Kategori UMKM"
            subtitle="Jelajahi berbagai kategori usaha yang tersedia di desa." />

        @if($categories->isNotEmpty())

            <div class="mt-10 flex flex-wrap justify-center gap-4">

                @foreach($categories as $category)

                    <x-ui.badge>

                        {{ $category->name }}

                    </x-ui.badge>

                @endforeach

            </div>

        @else

            <div class="app-card py-12 text-center">

                <h3 class="text-lg font-semibold text-slate-800">

                    Belum Ada Kategori

                </h3>

                <p class="mt-2 text-slate-500">

                    Kategori UMKM akan ditampilkan setelah data tersedia.

                </p>

            </div>

        @endif

    </div>

</section>

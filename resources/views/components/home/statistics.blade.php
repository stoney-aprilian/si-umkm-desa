@props([
    'statistics',
    'categories',
])

<section class="pb-24">

    <div class="app-container">

        <x-ui.section-title
            title="Potensi UMKM Desa"
            subtitle="Gambaran singkat perkembangan UMKM dan produk lokal yang telah terdaftar dalam sistem." />

        <div class="mt-12 grid grid-cols-1 gap-6 md:grid-cols-3">

            <x-ui.stat-card
                title="Total UMKM"
                :value="$statistics['umkms']" />

            <x-ui.stat-card
                title="Total Produk"
                :value="$statistics['products']" />

            <x-ui.stat-card
                title="Kategori"
                :value="$statistics['categories']" />

        </div>

    </div>

</section>

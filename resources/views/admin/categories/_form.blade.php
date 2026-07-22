<div class="space-y-8">

    {{-- Basic Information --}}
    <section>
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-900">
                Informasi Kategori
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Lengkapi informasi kategori yang akan digunakan untuk mengelompokkan UMKM dan produk.
            </p>
        </div>

        <div class="space-y-6">

            <x-ui.field
                name="name"
                helper="Nama kategori harus unik dan mudah dikenali oleh pengguna.">

                <x-ui.label
                    for="name"
                    required>
                    Nama Kategori
                </x-ui.label>

                <x-ui.input
                    id="name"
                    name="name"
                    :value="old('name', $category->name ?? '')"
                    placeholder="Contoh: Kuliner Tradisional"
                    autocomplete="off"
                    required />

            </x-ui.field>

            <x-ui.field
                name="description">

                <x-ui.label
                    for="description">
                    Deskripsi
                </x-ui.label>

                <x-ui.textarea
                    id="description"
                    name="description"
                    rows="4"
                    placeholder="Tuliskan deskripsi singkat mengenai kategori ini (opsional)...">{{ old('description', $category->description ?? '') }}</x-ui.textarea>

            </x-ui.field>

        </div>
    </section>

    @isset($category)

        <section class="border-t border-gray-200 pt-6">

            <h3 class="text-base font-semibold text-gray-900">
                Status
            </h3>

            <p class="mt-1 mb-4 text-sm text-gray-500">
                Nonaktifkan kategori apabila sudah tidak digunakan. Data yang telah tersimpan tidak akan terhapus.
            </p>

            <x-ui.field>

                <x-ui.checkbox
                    name="is_active"
                    :checked="old('is_active', $category->is_active)"
                    label="Kategori Aktif" />

            </x-ui.field>

        </section>

    @endisset

</div>

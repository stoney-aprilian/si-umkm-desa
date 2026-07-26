<div class="space-y-8">

    {{-- ====================================================== --}}
    {{-- Basic Information --}}
    {{-- ====================================================== --}}
    <x-ui.card>

        <x-ui.section-title
            title="Informasi Kategori"
            subtitle="Data dasar kategori yang akan digunakan untuk mengelompokkan UMKM dan produk." />

        <div class="mt-8 space-y-6">

            {{-- Nama --}}
            <x-ui.field
                name="name"
                helper="Gunakan nama yang singkat, jelas, dan mudah dipahami oleh pengguna.">

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
                    maxlength="100"
                    required />

            </x-ui.field>



            {{-- Slug Information --}}
            <div
                class="rounded-2xl border border-dashed border-slate-200 bg-slate-50 px-5 py-4">

                <p
                    class="text-sm font-medium text-slate-700">

                    Slug URL

                </p>

                <p
                    class="mt-2 text-sm leading-6 text-slate-500">

                    Slug akan dibuat secara otomatis berdasarkan nama kategori.

                </p>

                <code
                    class="mt-3 inline-flex rounded-lg bg-white px-3 py-2 text-xs font-medium text-emerald-700 shadow-sm">

                    contoh:
                    kuliner-tradisional

                </code>

            </div>



            {{-- Deskripsi --}}
            <x-ui.field
                name="description"
                helper="Opsional. Maksimal 500 karakter.">

                <x-ui.label
                    for="description">

                    Deskripsi

                </x-ui.label>

                <x-ui.textarea
                    id="description"
                    name="description"
                    rows="5"
                    maxlength="500"
                    placeholder="Tuliskan deskripsi singkat mengenai kategori ini...">{{ old('description', $category->description ?? '') }}</x-ui.textarea>

            </x-ui.field>

        </div>

    </x-ui.card>



    {{-- ====================================================== --}}
    {{-- Status --}}
    {{-- ====================================================== --}}
    @isset($category)

        <x-ui.card>

            <x-ui.section-title
                title="Status Kategori"
                subtitle="Atur apakah kategori dapat digunakan oleh UMKM dan produk." />

            <div class="mt-8">

                <x-ui.checkbox
                    name="is_active"
                    :checked="old('is_active', $category->is_active)"
                    label="Kategori aktif"
                    description="Kategori yang dinonaktifkan tidak akan muncul sebagai pilihan ketika membuat atau mengubah data UMKM maupun Produk." />

            </div>

        </x-ui.card>

    @endisset

</div>

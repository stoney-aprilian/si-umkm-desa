@php
    /** @var \App\Models\Product|null $product */
    $product ??= null;
@endphp

<div class="space-y-10">

    {{-- ====================================================== --}}
    {{-- Informasi Produk --}}
    {{-- ====================================================== --}}
    <section>

        <div class="mb-6">

            <h2 class="text-lg font-semibold tracking-tight text-slate-900">

                Informasi Produk

            </h2>

            <p class="mt-1 text-sm leading-6 text-slate-500">

                Lengkapi informasi dasar produk yang akan ditampilkan kepada masyarakat.

            </p>

        </div>

        <div class="grid gap-6 lg:grid-cols-2">

            {{-- Nama Produk --}}
            <x-ui.field name="name" class="lg:col-span-2"
                helper="Gunakan nama yang jelas dan mudah dikenali pelanggan.">

                <x-ui.label for="name" required>

                    Nama Produk

                </x-ui.label>

                <x-ui.input id="name" name="name" maxlength="150" :value="old('name', $product?->name)"
                    placeholder="Contoh: Keripik Pisang Original" required />

            </x-ui.field>





            {{-- Harga --}}
            <x-ui.field name="price" helper="Masukkan harga jual produk.">

                <x-ui.label for="price" required>

                    Harga (Rp)

                </x-ui.label>

                <x-ui.input id="price" type="number" name="price" min="0" step="1" :value="old('price', $product?->price)"
                    placeholder="Contoh: 25000" required />

            </x-ui.field>





            {{-- Status --}}
            <div class="flex items-end">

                <x-ui.checkbox name="is_active" :checked="old('is_active', $product?->is_active ?? true)" label="Produk Aktif" />

            </div>





            {{-- Deskripsi --}}
            <x-ui.field name="description" class="lg:col-span-2">

                <x-ui.label for="description">

                    Deskripsi Produk

                </x-ui.label>

                <x-ui.textarea id="description" name="description" rows="5" maxlength="1000"
                    placeholder="Jelaskan produk Anda secara singkat...">{{ old('description', $product?->description) }}</x-ui.textarea>

            </x-ui.field>

        </div>

    </section>





    {{-- ====================================================== --}}
    {{-- Gambar --}}
    {{-- ====================================================== --}}
    <section class="border-t border-slate-200 pt-8">

        <div class="mb-6">

            <h2 class="text-lg font-semibold tracking-tight text-slate-900">

                Gambar Produk

            </h2>

            <p class="mt-1 text-sm leading-6 text-slate-500">

                Gunakan gambar yang jelas agar produk lebih menarik bagi calon pembeli.

            </p>

        </div>

        <x-ui.field name="image">

            <x-ui.file-upload id="image" name="image" label="Foto Produk" :preview="$product?->image" />

        </x-ui.field>

    </section>





    {{-- ====================================================== --}}
    {{-- Pengaturan --}}
    {{-- ====================================================== --}}
    <section class="border-t border-slate-200 pt-8">

        <div class="mb-6">

            <h2 class="text-lg font-semibold tracking-tight text-slate-900">

                Pengaturan Produk

            </h2>

            <p class="mt-1 text-sm leading-6 text-slate-500">

                Atur status publikasi dan tampilan produk pada portal SI UMKM Desa.

            </p>

        </div>

        <div class="space-y-4">

            <x-ui.checkbox name="is_featured" :checked="old('is_featured', $product?->is_featured ?? false)" label="Jadikan sebagai Produk Unggulan" />

            <x-ui.checkbox name="is_active" :checked="old('is_active', $product?->is_active ?? true)" label="Produk Aktif" />

        </div>

    </section>

</div>

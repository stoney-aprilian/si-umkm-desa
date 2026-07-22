<div class="space-y-8">

    {{-- Product Information --}}
    <section>

        <div class="mb-6">

            <h2 class="text-lg font-semibold text-gray-900">
                Informasi Produk
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Lengkapi informasi produk yang akan ditampilkan pada katalog UMKM.
            </p>

        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            {{-- UMKM --}}
            <x-ui.field
                name="umkm_id">

                <x-ui.label
                    for="umkm_id"
                    required>

                    UMKM

                </x-ui.label>

                <select
                    id="umkm_id"
                    name="umkm_id"
                    class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500"
                    required>

                    <option value="">
                        Pilih UMKM
                    </option>

                    @foreach($umkms as $umkm)

                        <option
                            value="{{ $umkm->id }}"
                            @selected(old('umkm_id', $product->umkm_id ?? '') == $umkm->id)>

                            {{ $umkm->business_name }}

                        </option>

                    @endforeach

                </select>

            </x-ui.field>

            {{-- Nama Produk --}}
            <x-ui.field
                name="name"
                helper="Gunakan nama produk yang jelas dan mudah dikenali.">

                <x-ui.label
                    for="name"
                    required>

                    Nama Produk

                </x-ui.label>

                <x-ui.input
                    id="name"
                    name="name"
                    :value="old('name', $product->name ?? '')"
                    placeholder="Contoh: Keripik Singkong Original"
                    required />

            </x-ui.field>

            {{-- Harga --}}
            <x-ui.field
                name="price"
                helper="Kosongkan apabila harga belum ditentukan.">

                <x-ui.label
                    for="price">

                    Harga

                </x-ui.label>

                <x-ui.input
                    id="price"
                    type="number"
                    name="price"
                    min="0"
                    step="0.01"
                    :value="old('price', $product->price ?? '')"
                    placeholder="Contoh: 25000" />

            </x-ui.field>

        </div>

    </section>

    {{-- Product Description --}}
    <section class="border-t border-gray-200 pt-8">

        <h3 class="text-base font-semibold text-gray-900">
            Deskripsi Produk
        </h3>

        <p class="mt-1 mb-5 text-sm text-gray-500">
            Jelaskan produk secara singkat agar calon pembeli lebih mudah memahami keunggulannya.
        </p>

        <x-ui.field
            name="description">

            <x-ui.label
                for="description">

                Deskripsi

            </x-ui.label>

            <x-ui.textarea
                id="description"
                name="description"
                rows="5"
                placeholder="Masukkan deskripsi produk (opsional)...">{{ old('description', $product->description ?? '') }}</x-ui.textarea>

        </x-ui.field>

    </section>

    {{-- Product Status --}}
    <section class="border-t border-gray-200 pt-8">

        <h3 class="text-base font-semibold text-gray-900">
            Status Produk
        </h3>

        <p class="mt-1 mb-5 text-sm text-gray-500">
            Atur status produk sebelum ditampilkan kepada pengunjung website.
        </p>

        <div class="space-y-4">

            <x-ui.checkbox
                name="is_featured"
                :checked="old('is_featured', $product->is_featured ?? false)"
                label="Jadikan sebagai Produk Unggulan" />

            <x-ui.checkbox
                name="is_active"
                :checked="old('is_active', $product->is_active ?? true)"
                label="Produk Aktif" />

        </div>

    </section>

</div>

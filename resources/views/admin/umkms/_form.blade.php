<div class="space-y-10">

    {{-- Basic Information --}}
    <section>

        <div class="mb-6">

            <h2 class="text-lg font-semibold text-gray-900">
                Informasi UMKM
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Informasi utama mengenai UMKM yang akan ditampilkan pada website.
            </p>

        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            {{-- Nama UMKM --}}
            <x-ui.field
                name="business_name"
                helper="Gunakan nama resmi UMKM.">

                <x-ui.label
                    for="business_name"
                    required>

                    Nama UMKM

                </x-ui.label>

                <x-ui.input
                    id="business_name"
                    name="business_name"
                    :value="old('business_name', $umkm->business_name ?? '')"
                    placeholder="Contoh: Keripik Singkong Bu Ijah"
                    required />

            </x-ui.field>

            {{-- Kategori --}}
            <x-ui.field
                name="category_id">

                <x-ui.label
                    for="category_id"
                    required>

                    Kategori

                </x-ui.label>

                <select
                    id="category_id"
                    name="category_id"
                    class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500"
                    required>

                    <option value="">
                        Pilih Kategori
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(old('category_id', $umkm->category_id ?? '') == $category->id)>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </x-ui.field>

            {{-- Owner --}}
            <x-ui.field
                name="user_id">

                <x-ui.label
                    for="user_id"
                    required>

                    Pemilik UMKM

                </x-ui.label>

                <select
                    id="user_id"
                    name="user_id"
                    class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500"
                    required>

                    <option value="">
                        Pilih Pemilik
                    </option>

                    @foreach($owners as $owner)

                        <option
                            value="{{ $owner->id }}"
                            @selected(old('user_id', $umkm->user_id ?? '') == $owner->id)>

                            {{ $owner->name }}

                        </option>

                    @endforeach

                </select>

            </x-ui.field>

            {{-- Nomor HP --}}
            <x-ui.field
                name="phone">

                <x-ui.label
                    for="phone">

                    Nomor HP

                </x-ui.label>

                <x-ui.input
                    id="phone"
                    name="phone"
                    type="text"
                    :value="old('phone', $umkm->phone ?? '')"
                    placeholder="08xxxxxxxxxx" />

            </x-ui.field>

        </div>

    </section>

    {{-- Description --}}
    <section class="border-t border-gray-200 pt-8">

        <h3 class="text-base font-semibold text-gray-900">
            Deskripsi
        </h3>

        <p class="mt-1 mb-5 text-sm text-gray-500">
            Jelaskan secara singkat profil dan keunggulan UMKM.
        </p>

        <x-ui.field
            name="description">

            <x-ui.label
                for="description">

                Deskripsi UMKM

            </x-ui.label>

            <x-ui.textarea
                id="description"
                name="description"
                rows="5"
                placeholder="Tuliskan deskripsi singkat mengenai UMKM...">{{ old('description', $umkm->description ?? '') }}</x-ui.textarea>

        </x-ui.field>

    </section>

    {{-- Address --}}
    <section class="border-t border-gray-200 pt-8">

        <h3 class="text-base font-semibold text-gray-900">
            Informasi Lokasi
        </h3>

        <p class="mt-1 mb-5 text-sm text-gray-500">
            Masukkan alamat lengkap lokasi usaha.
        </p>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            <div class="md:col-span-2">

                <x-ui.field
                    name="address">

                    <x-ui.label
                        for="address">

                        Alamat

                    </x-ui.label>

                    <x-ui.textarea
                        id="address"
                        name="address"
                        rows="3"
                        placeholder="Masukkan alamat lengkap UMKM...">{{ old('address', $umkm->address ?? '') }}</x-ui.textarea>

                </x-ui.field>

            </div>

            <x-ui.field name="village">

                <x-ui.label for="village">
                    Desa
                </x-ui.label>

                <x-ui.input
                    id="village"
                    name="village"
                    :value="old('village', $umkm->village ?? '')"
                    placeholder="Nama desa" />

            </x-ui.field>

            <x-ui.field name="district">

                <x-ui.label for="district">
                    Kecamatan
                </x-ui.label>

                <x-ui.input
                    id="district"
                    name="district"
                    :value="old('district', $umkm->district ?? '')"
                    placeholder="Nama kecamatan" />

            </x-ui.field>

            <x-ui.field name="regency">

                <x-ui.label for="regency">
                    Kabupaten
                </x-ui.label>

                <x-ui.input
                    id="regency"
                    name="regency"
                    :value="old('regency', $umkm->regency ?? '')"
                    placeholder="Nama kabupaten" />

            </x-ui.field>

            <x-ui.field name="maps_url">

                <x-ui.label for="maps_url">
                    Google Maps
                </x-ui.label>

                <x-ui.input
                    id="maps_url"
                    type="url"
                    name="maps_url"
                    :value="old('maps_url', $umkm->maps_url ?? '')"
                    placeholder="https://maps.google.com/..." />

            </x-ui.field>

        </div>

    </section>

    {{-- Status --}}
    <section class="border-t border-gray-200 pt-8">

        <h3 class="text-base font-semibold text-gray-900">
            Status Publikasi
        </h3>

        <p class="mt-1 mb-5 text-sm text-gray-500">
            Atur status verifikasi dan visibilitas UMKM.
        </p>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            <x-ui.field
                name="status">

                <x-ui.label
                    for="status">

                    Status Verifikasi

                </x-ui.label>

                <select
                    id="status"
                    name="status"
                    class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500">

                    <option
                        value="pending"
                        @selected(old('status', $umkm->status ?? '') == 'pending')>

                        Pending

                    </option>

                    <option
                        value="approved"
                        @selected(old('status', $umkm->status ?? '') == 'approved')>

                        Approved

                    </option>

                    <option
                        value="rejected"
                        @selected(old('status', $umkm->status ?? '') == 'rejected')>

                        Rejected

                    </option>

                </select>

            </x-ui.field>

            <div class="flex items-end">

                <x-ui.checkbox
                    name="is_active"
                    :checked="old('is_active', $umkm->is_active ?? true)"
                    label="UMKM Aktif" />

            </div>

        </div>

    </section>

</div>

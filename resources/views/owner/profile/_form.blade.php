<div class="grid gap-6 lg:grid-cols-2">

    <x-ui.field
        name="business_name"
        class="lg:col-span-2">

        <x-ui.label
            for="business_name"
            required>

            Nama UMKM

        </x-ui.label>

        <x-ui.input
            id="business_name"
            name="business_name"
            :value="old('business_name', $umkm?->business_name)"
            required />

    </x-ui.field>

    <x-ui.field
        name="category_id">

        <x-ui.label
            for="category_id"
            required>

            Kategori

        </x-ui.label>

        <x-ui.select
            id="category_id"
            name="category_id"
            required>

            <option value="">
                -- Pilih Kategori --
            </option>

            @foreach ($categories as $category)

                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id', $umkm?->category_id) == $category->id)>

                    {{ $category->name }}

                </option>

            @endforeach

        </x-ui.select>

    </x-ui.field>

    <x-ui.field
        name="phone">

        <x-ui.label
            for="phone"
            required>

            Nomor Telepon

        </x-ui.label>

        <x-ui.input
            id="phone"
            name="phone"
            :value="old('phone', $umkm?->phone)"
            required />

    </x-ui.field>

    <x-ui.field
        name="description"
        class="lg:col-span-2">

        <x-ui.label
            for="description">

            Deskripsi

        </x-ui.label>

        <x-ui.textarea
            id="description"
            name="description"
            rows="5">{{ old('description', $umkm?->description) }}</x-ui.textarea>

    </x-ui.field>

    <x-ui.field
        name="address"
        class="lg:col-span-2">

        <x-ui.label
            for="address"
            required>

            Alamat

        </x-ui.label>

        <x-ui.textarea
            id="address"
            name="address"
            rows="3"
            required>{{ old('address', $umkm?->address) }}</x-ui.textarea>

    </x-ui.field>

    <x-ui.field
        name="village">

        <x-ui.label
            for="village"
            required>

            Desa

        </x-ui.label>

        <x-ui.input
            id="village"
            name="village"
            :value="old('village', $umkm?->village)"
            required />

    </x-ui.field>

    <x-ui.field
        name="district">

        <x-ui.label
            for="district"
            required>

            Kecamatan

        </x-ui.label>

        <x-ui.input
            id="district"
            name="district"
            :value="old('district', $umkm?->district)"
            required />

    </x-ui.field>

    <x-ui.field
        name="regency">

        <x-ui.label
            for="regency"
            required>

            Kabupaten

        </x-ui.label>

        <x-ui.input
            id="regency"
            name="regency"
            :value="old('regency', $umkm?->regency)"
            required />

    </x-ui.field>

    <x-ui.field
        name="maps_url">

        <x-ui.label
            for="maps_url">

            Google Maps URL

        </x-ui.label>

        <x-ui.input
            id="maps_url"
            name="maps_url"
            type="url"
            :value="old('maps_url', $umkm?->maps_url)" />

    </x-ui.field>

    <x-ui.field
        name="logo">

        <x-ui.file-upload
            id="logo"
            name="logo"
            label="Logo UMKM"
            :preview="$umkm?->logo" />

    </x-ui.field>

    <x-ui.field
        name="banner">

        <x-ui.file-upload
            id="banner"
            name="banner"
            label="Banner UMKM"
            :preview="$umkm?->banner" />

    </x-ui.field>

</div>

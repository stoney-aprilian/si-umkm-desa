<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- UMKM --}}
    <div>
        <label class="block mb-2 font-medium">
            UMKM
        </label>

        <select
            name="umkm_id"
            class="w-full rounded-lg border-slate-300"
            required>

            <option value="">Pilih UMKM</option>

            @foreach($umkms as $umkm)

                <option
                    value="{{ $umkm->id }}"
                    @selected(old('umkm_id', $product->umkm_id ?? '') == $umkm->id)>

                    {{ $umkm->business_name }}

                </option>

            @endforeach

        </select>

        @error('umkm_id')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Nama Produk --}}
    <div>

        <label class="block mb-2 font-medium">
            Nama Produk
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $product->name ?? '') }}"
            class="w-full rounded-lg border-slate-300"
            required>

        @error('name')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Harga --}}
    <div>

        <label class="block mb-2 font-medium">
            Harga
        </label>

        <input
            type="number"
            step="0.01"
            min="0"
            name="price"
            value="{{ old('price', $product->price ?? '') }}"
            class="w-full rounded-lg border-slate-300">

        @error('price')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Status --}}
    <div>

        <label class="block mb-2 font-medium">
            Status
        </label>

        <div class="flex gap-6">

            <label class="inline-flex items-center gap-2">

                <input
                    type="checkbox"
                    name="is_featured"
                    value="1"
                    {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}>

                Produk Unggulan

            </label>

            <label class="inline-flex items-center gap-2">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>

                Aktif

            </label>

        </div>

    </div>

    {{-- Deskripsi --}}
    <div class="md:col-span-2">

        <label class="block mb-2 font-medium">
            Deskripsi
        </label>

        <textarea
            name="description"
            rows="5"
            class="w-full rounded-lg border-slate-300">{{ old('description', $product->description ?? '') }}</textarea>

    </div>

</div>

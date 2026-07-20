<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="block mb-2 font-medium">Nama UMKM</label>

        <input
            type="text"
            name="business_name"
            value="{{ old('business_name', $umkm->business_name ?? '') }}"
            class="w-full rounded-lg border-slate-300"
            required>

        @error('business_name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Kategori</label>

        <select
            name="category_id"
            class="w-full rounded-lg border-slate-300"
            required>

            <option value="">Pilih Kategori</option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id', $umkm->category_id ?? '') == $category->id)>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>
    </div>

    <div>
        <label class="block mb-2 font-medium">Owner</label>

        <select
            name="user_id"
            class="w-full rounded-lg border-slate-300"
            required>

            <option value="">Pilih Owner</option>

            @foreach($owners as $owner)

                <option
                    value="{{ $owner->id }}"
                    @selected(old('user_id', $umkm->user_id ?? '') == $owner->id)>

                    {{ $owner->name }}

                </option>

            @endforeach

        </select>
    </div>

    <div>
        <label class="block mb-2 font-medium">Nomor HP</label>

        <input
            type="text"
            name="phone"
            value="{{ old('phone', $umkm->phone ?? '') }}"
            class="w-full rounded-lg border-slate-300">
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Deskripsi</label>

        <textarea
            name="description"
            rows="4"
            class="w-full rounded-lg border-slate-300">{{ old('description', $umkm->description ?? '') }}</textarea>
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Alamat</label>

        <textarea
            name="address"
            rows="3"
            class="w-full rounded-lg border-slate-300">{{ old('address', $umkm->address ?? '') }}</textarea>
    </div>

    <div>
        <label class="block mb-2 font-medium">Desa</label>

        <input
            type="text"
            name="village"
            value="{{ old('village', $umkm->village ?? '') }}"
            class="w-full rounded-lg border-slate-300">
    </div>

    <div>
        <label class="block mb-2 font-medium">Kecamatan</label>

        <input
            type="text"
            name="district"
            value="{{ old('district', $umkm->district ?? '') }}"
            class="w-full rounded-lg border-slate-300">
    </div>

    <div>
        <label class="block mb-2 font-medium">Kabupaten</label>

        <input
            type="text"
            name="regency"
            value="{{ old('regency', $umkm->regency ?? '') }}"
            class="w-full rounded-lg border-slate-300">
    </div>

    <div>
        <label class="block mb-2 font-medium">Google Maps</label>

        <input
            type="url"
            name="maps_url"
            value="{{ old('maps_url', $umkm->maps_url ?? '') }}"
            class="w-full rounded-lg border-slate-300">
    </div>

    <div>
        <label class="block mb-2 font-medium">Status</label>

        <select
            name="status"
            class="w-full rounded-lg border-slate-300">

            <option value="pending">Pending</option>
            <option value="approved">Approved</option>
            <option value="rejected">Rejected</option>

        </select>
    </div>

    <div class="flex items-center">

        <label class="inline-flex items-center gap-2">

            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $umkm->is_active ?? true) ? 'checked' : '' }}>

            <span>Aktif</span>

        </label>

    </div>

</div>

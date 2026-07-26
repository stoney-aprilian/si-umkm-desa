<div class="space-y-8">

    {{-- ====================================================== --}}
    {{-- Informasi UMKM --}}
    {{-- ====================================================== --}}
    <x-ui.card>

        <x-ui.section-title title="Informasi UMKM"
            subtitle="Masukkan identitas utama UMKM yang akan ditampilkan pada website." />

        <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- Nama UMKM --}}
            <x-ui.field name="business_name" helper="Gunakan nama resmi atau nama yang dikenal masyarakat.">

                <x-ui.label for="business_name" required>

                    Nama UMKM

                </x-ui.label>

                <x-ui.input id="business_name" name="business_name" maxlength="150" :value="old('business_name', $umkm->business_name ?? '')"
                    placeholder="Contoh: Keripik Singkong Bu Ijah" required />

            </x-ui.field>



            {{-- Kategori --}}
            <x-ui.field name="category_id" helper="Pilih kategori usaha yang paling sesuai.">

                <x-ui.label for="category_id" required>

                    Kategori

                </x-ui.label>

                <x-ui.select id="category_id" name="category_id" required>

                    <option value="">

                        Pilih Kategori

                    </option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $umkm->category_id ?? '') == $category->id)>

                            {{ $category->name }}

                        </option>
                    @endforeach

                </x-ui.select>

            </x-ui.field>



            {{-- Pemilik --}}
            <x-ui.field name="user_id" helper="Pemilik yang bertanggung jawab terhadap UMKM ini.">

                <x-ui.label for="user_id" required>

                    Pemilik UMKM

                </x-ui.label>

                <x-ui.select id="user_id" name="user_id" required>

                    <option value="">

                        Pilih Pemilik

                    </option>

                    @foreach ($owners as $owner)
                        <option value="{{ $owner->id }}" @selected(old('user_id', $umkm->user_id ?? '') == $owner->id)>

                            {{ $owner->name }}

                        </option>
                    @endforeach

                </x-ui.select>

            </x-ui.field>



            {{-- Nomor HP --}}
            <x-ui.field name="phone" helper="Nomor yang dapat dihubungi oleh pelanggan.">

                <x-ui.label for="phone">

                    Nomor HP

                </x-ui.label>

                <x-ui.input id="phone" name="phone" maxlength="20" :value="old('phone', $umkm->phone ?? '')" placeholder="08xxxxxxxxxx" />

            </x-ui.field>

        </div>

    </x-ui.card>



    {{-- ====================================================== --}}
    {{-- Media UMKM --}}
    {{-- ====================================================== --}}
    <x-ui.card>

        <x-ui.section-title title="Media UMKM"
            subtitle="Tambahkan identitas visual agar profil UMKM terlihat lebih profesional." />

        <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-2">

            {{-- Logo --}}
            <x-ui.file-upload id="logo" name="logo" label="Logo UMKM" :preview="$umkm->logo ?? null"
                accept="image/png,image/jpeg,image/webp" />



            {{-- Banner --}}
            <x-ui.file-upload id="banner" name="banner" label="Banner UMKM" :preview="$umkm->banner ?? null"
                accept="image/png,image/jpeg,image/webp" />

        </div>

        <div class="mt-6 rounded-2xl border border-dashed border-slate-200 bg-slate-50 px-5 py-4">

            <p class="font-medium text-slate-700">

                Rekomendasi Gambar

            </p>

            <ul class="mt-3 space-y-2 text-sm text-slate-500">

                <li>• Format: JPG, PNG, atau WEBP.</li>
                <li>• Ukuran maksimal 2 MB.</li>
                <li>• Gunakan gambar dengan kualitas yang jelas.</li>
                <li>• Banner disarankan menggunakan rasio landscape.</li>

            </ul>

        </div>

    </x-ui.card>

    {{-- ====================================================== --}}
    {{-- Deskripsi UMKM --}}
    {{-- ====================================================== --}}
    <x-ui.card>

        <x-ui.section-title title="Deskripsi UMKM"
            subtitle="Ceritakan profil singkat, produk unggulan, serta kelebihan UMKM agar lebih menarik bagi pengunjung." />

        <div class="mt-8">

            <x-ui.field name="description" helper="Opsional. Maksimal 1000 karakter.">

                <x-ui.label for="description">

                    Deskripsi

                </x-ui.label>

                <x-ui.textarea id="description" name="description" rows="6" maxlength="1000"
                    placeholder="Contoh: UMKM ini bergerak di bidang makanan tradisional khas Desa Salamnunggal yang diproduksi secara rumahan dengan bahan baku pilihan...">{{ old('description', $umkm->description ?? '') }}</x-ui.textarea>

            </x-ui.field>

        </div>

    </x-ui.card>



    {{-- ====================================================== --}}
    {{-- Informasi Lokasi --}}
    {{-- ====================================================== --}}
    <x-ui.card>

        <x-ui.section-title title="Informasi Lokasi"
            subtitle="Masukkan alamat usaha agar pelanggan dapat menemukan lokasi UMKM dengan mudah." />

        <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- Alamat --}}
            <div class="lg:col-span-2">

                <x-ui.field name="address" helper="Masukkan alamat lengkap lokasi usaha.">

                    <x-ui.label for="address">

                        Alamat

                    </x-ui.label>

                    <x-ui.textarea id="address" name="address" rows="4" maxlength="500"
                        placeholder="Contoh: Jl. Raya Salamnunggal No. 10, RT 01/RW 02...">{{ old('address', $umkm->address ?? '') }}</x-ui.textarea>

                </x-ui.field>

            </div>



            {{-- Desa --}}
            <x-ui.field name="village" helper="Nama desa lokasi UMKM.">

                <x-ui.label for="village">

                    Desa

                </x-ui.label>

                <x-ui.input id="village" name="village" :value="old('village', $umkm->village ?? '')" placeholder="Contoh: Salamnunggal" />

            </x-ui.field>



            {{-- Kecamatan --}}
            <x-ui.field name="district" helper="Nama kecamatan lokasi UMKM.">

                <x-ui.label for="district">

                    Kecamatan

                </x-ui.label>

                <x-ui.input id="district" name="district" :value="old('district', $umkm->district ?? '')" placeholder="Contoh: Cibeber" />

            </x-ui.field>



            {{-- Kabupaten --}}
            <x-ui.field name="regency" helper="Nama kabupaten atau kota.">

                <x-ui.label for="regency">

                    Kabupaten / Kota

                </x-ui.label>

                <x-ui.input id="regency" name="regency" :value="old('regency', $umkm->regency ?? '')" placeholder="Contoh: Cianjur" />

            </x-ui.field>



            {{-- Google Maps --}}
            <x-ui.field name="maps_url" helper="Tempel tautan Google Maps lokasi UMKM.">

                <x-ui.label for="maps_url">

                    Google Maps

                </x-ui.label>

                <x-ui.input id="maps_url" type="url" name="maps_url" :value="old('maps_url', $umkm->maps_url ?? '')"
                    placeholder="https://maps.google.com/..." />

            </x-ui.field>

        </div>

        <div class="mt-8 rounded-2xl border border-dashed border-slate-200 bg-slate-50 px-5 py-4">

            <p class="font-medium text-slate-700">

                Tips Pengisian Lokasi

            </p>

            <ul class="mt-3 space-y-2 text-sm leading-6 text-slate-500">

                <li>• Gunakan alamat yang mudah dikenali masyarakat.</li>

                <li>• Sertakan tautan Google Maps agar lokasi dapat langsung dibuka.</li>

                <li>• Pastikan data desa, kecamatan, dan kabupaten sesuai lokasi sebenarnya.</li>

            </ul>

        </div>

    </x-ui.card>

    {{-- ====================================================== --}}
    {{-- Status Publikasi --}}
    {{-- ====================================================== --}}
    @isset($umkm)
        <x-ui.card>

            <x-ui.section-title title="Status UMKM"
                subtitle="Atur status publikasi dan proses verifikasi UMKM di dalam sistem." />

            <div class="mt-8 grid gap-6 lg:grid-cols-2">

                {{-- Status Aktif --}}
                <x-ui.checkbox name="is_active" :checked="old('is_active', $umkm->is_active)" label="UMKM Aktif"
                    description="UMKM yang aktif akan ditampilkan pada website dan dapat diakses oleh pengunjung." />



                {{-- Status Verifikasi --}}
                <x-ui.checkbox name="is_verified" :checked="old('is_verified', $umkm->is_verified)" label="Sudah Terverifikasi"
                    description="Menandakan bahwa data UMKM telah diverifikasi oleh administrator." />

            </div>

            <div class="mt-8 rounded-2xl border border-amber-200 bg-amber-50 px-5 py-4">

                <div class="flex items-start gap-3">

                    <div class="mt-0.5 flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01M10.29 3.86l-7 12A2 2 0 005 19h14a2 2 0 001.71-3.14l-7-12a2 2 0 00-3.42 0z" />

                        </svg>

                    </div>

                    <div>

                        <h3 class="font-semibold text-amber-900">

                            Perhatian

                        </h3>

                        <p class="mt-2 text-sm leading-6 text-amber-700">

                            Menonaktifkan UMKM tidak akan menghapus data.
                            Informasi UMKM hanya disembunyikan dari website
                            sampai diaktifkan kembali.

                        </p>

                    </div>

                </div>

            </div>

        </x-ui.card>
    @else
        <x-ui.card>

            <x-ui.section-title title="Status Publikasi"
                subtitle="Status verifikasi dapat diatur setelah data UMKM berhasil dibuat." />

            <div class="mt-8 rounded-2xl border border-sky-200 bg-sky-50 px-5 py-4">

                <div class="flex items-start gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-100 text-sky-600">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                        </svg>

                    </div>

                    <div>

                        <p class="text-sm leading-6 text-sky-700">

                            Setelah UMKM berhasil disimpan,
                            Administrator dapat mengatur status
                            aktif maupun status verifikasi
                            melalui halaman Edit UMKM.

                        </p>

                    </div>

                </div>

            </div>

        </x-ui.card>
    @endisset

</div>

<div class="space-y-8">

    {{-- ====================================================== --}}
    {{-- Informasi Produk --}}
    {{-- ====================================================== --}}
    <x-ui.card>

        <x-ui.section-title title="Informasi Produk"
            subtitle="Masukkan informasi dasar produk yang akan ditampilkan pada katalog UMKM." />

        <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- UMKM --}}
            <x-ui.field name="umkm_id" helper="Pilih UMKM pemilik produk.">

                <x-ui.label for="umkm_id" required>

                    UMKM

                </x-ui.label>

                <x-ui.select id="umkm_id" name="umkm_id" required>

                    <option value="">
                        Pilih UMKM
                    </option>

                    @foreach ($umkms as $umkm)
                        <option value="{{ $umkm->id }}" @selected(old('umkm_id', $product->umkm_id ?? '') == $umkm->id)>

                            {{ $umkm->business_name }}

                        </option>
                    @endforeach

                </x-ui.select>

            </x-ui.field>



            {{-- Nama Produk --}}
            <x-ui.field name="name" helper="Gunakan nama produk yang mudah dikenali pelanggan.">

                <x-ui.label for="name" required>

                    Nama Produk

                </x-ui.label>

                <x-ui.input id="name" name="name" maxlength="150" :value="old('name', $product->name ?? '')"
                    placeholder="Contoh: Keripik Singkong Original" required />

            </x-ui.field>



            {{-- Harga --}}
            <x-ui.field name="price" helper="Masukkan harga jual produk dalam Rupiah.">

                <x-ui.label for="price">

                    Harga

                </x-ui.label>

                <x-ui.input id="price" type="number" name="price" min="0" step="1" :value="old('price', $product->price ?? '')"
                    placeholder="25000" />

            </x-ui.field>

        </div>

    </x-ui.card>



    {{-- ====================================================== --}}
    {{-- Media Produk --}}
    {{-- ====================================================== --}}
    <x-ui.card>

        <x-ui.section-title title="Media Produk"
            subtitle="Gunakan foto produk yang menarik agar katalog terlihat lebih profesional." />

        <div class="mt-8">

            <x-ui.file-upload id="image" name="image" label="Foto Produk" :preview="$product->image ?? null"
                accept="image/png,image/jpeg,image/webp" />

        </div>

        <div class="mt-6 rounded-2xl border border-dashed border-slate-200 bg-slate-50 px-5 py-4">

            <p class="font-medium text-slate-700">

                Rekomendasi Gambar

            </p>

            <ul class="mt-3 space-y-2 text-sm text-slate-500">

                <li>• Format JPG, PNG atau WEBP.</li>
                <li>• Ukuran maksimal 2 MB.</li>
                <li>• Gunakan foto dengan pencahayaan yang baik.</li>
                <li>• Hindari gambar buram atau pecah.</li>

            </ul>

        </div>

    </x-ui.card>

    {{-- ====================================================== --}}
    {{-- Deskripsi Produk --}}
    {{-- ====================================================== --}}
    <x-ui.card>

        <x-ui.section-title title="Deskripsi Produk"
            subtitle="Berikan informasi singkat mengenai produk agar lebih mudah dipahami oleh calon pembeli." />

        <div class="mt-8">

            <x-ui.field name="description" helper="Opsional. Maksimal 1000 karakter.">

                <x-ui.label for="description">

                    Deskripsi Produk

                </x-ui.label>

                <x-ui.textarea id="description" name="description" rows="6" maxlength="1000"
                    placeholder="Contoh: Keripik singkong dibuat dari singkong pilihan tanpa bahan pengawet dengan berbagai varian rasa...">{{ old('description', $product->description ?? '') }}</x-ui.textarea>

            </x-ui.field>

        </div>

    </x-ui.card>



    {{-- ====================================================== --}}
    {{-- Pengaturan Produk --}}
    {{-- ====================================================== --}}
    <x-ui.card>

        <x-ui.section-title title="Pengaturan Produk" subtitle="Atur prioritas tampilan dan status publikasi produk." />

        <div class="mt-8 space-y-6">

            {{-- Produk Unggulan --}}
            <x-ui.checkbox name="is_featured" :checked="old('is_featured', $product->is_featured ?? false)" label="Produk Unggulan"
                description="Produk unggulan akan mendapatkan penanda khusus pada katalog dan halaman utama website." />



            @isset($product)
                {{-- Status Aktif --}}
                <x-ui.checkbox name="is_active" :checked="old('is_active', $product->is_active ?? true)" label="Produk Aktif"
                    description="Produk aktif akan ditampilkan kepada pengunjung website." />

                <div class="rounded-2xl border border-amber-200 bg-amber-50 px-5 py-4">

                    <div class="flex items-start gap-3">

                        <div
                            class="mt-0.5 flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

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

                                Menonaktifkan produk tidak akan menghapus data.
                                Produk hanya disembunyikan dari katalog hingga
                                diaktifkan kembali.

                            </p>

                        </div>

                    </div>

                </div>
            @else
                <div class="rounded-2xl border border-sky-200 bg-sky-50 px-5 py-4">

                    <div class="flex items-start gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-100 text-sky-600">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                            </svg>

                        </div>

                        <div>

                            <p class="text-sm leading-6 text-sky-700">

                                Status aktif dapat diubah setelah produk berhasil
                                disimpan melalui halaman Edit Produk.

                            </p>

                        </div>

                    </div>

                </div>
            @endisset

        </div>

    </x-ui.card>

</div>

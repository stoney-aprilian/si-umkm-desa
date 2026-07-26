<div class="space-y-10">

    {{-- ====================================================== --}}
    {{-- Informasi UMKM --}}
    {{-- ====================================================== --}}
    <section>

        <div class="mb-6">

            <h2 class="text-lg font-semibold tracking-tight text-slate-900">

                Informasi UMKM

            </h2>

            <p class="mt-1 text-sm leading-6 text-slate-500">

                Informasi dasar mengenai usaha Anda yang akan ditampilkan kepada masyarakat.

            </p>

        </div>

        <div class="grid gap-6 lg:grid-cols-2">

            {{-- Nama UMKM --}}
            <x-ui.field name="business_name" class="lg:col-span-2"
                helper="Gunakan nama usaha yang mudah dikenali masyarakat.">

                <x-ui.label for="business_name" required>

                    Nama UMKM

                </x-ui.label>

                <x-ui.input id="business_name" name="business_name" maxlength="150" :value="old('business_name', $umkm?->business_name)"
                    placeholder="Contoh: Kopi Salamnunggal" required />

            </x-ui.field>





            {{-- Kategori --}}
            <x-ui.field name="category_id">

                <x-ui.label for="category_id" required>

                    Kategori

                </x-ui.label>

                <x-ui.select id="category_id" name="category_id" required>

                    <option value="">

                        Pilih kategori

                    </option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $umkm?->category_id) == $category->id)>

                            {{ $category->name }}

                        </option>
                    @endforeach

                </x-ui.select>

            </x-ui.field>





            {{-- Nomor Telepon --}}
            <x-ui.field name="phone" helper="Nomor ini akan digunakan sebagai kontak UMKM.">

                <x-ui.label for="phone" required>

                    Nomor Telepon

                </x-ui.label>

                <x-ui.input id="phone" name="phone" type="tel" :value="old('phone', $umkm?->phone)" placeholder="08xxxxxxxxxx"
                    required />

            </x-ui.field>





            {{-- Deskripsi --}}
            <x-ui.field name="description" class="lg:col-span-2">

                <x-ui.label for="description">

                    Deskripsi UMKM

                </x-ui.label>

                <x-ui.textarea id="description" name="description" rows="5" maxlength="1000"
                    placeholder="Ceritakan secara singkat mengenai usaha Anda...">{{ old('description', $umkm?->description) }}</x-ui.textarea>

            </x-ui.field>

        </div>

    </section>





    {{-- ====================================================== --}}
    {{-- Lokasi --}}
    {{-- ====================================================== --}}
    <section class="border-t border-slate-200 pt-8">

        <div class="mb-6">

            <h2 class="text-lg font-semibold tracking-tight text-slate-900">

                Informasi Lokasi

            </h2>

            <p class="mt-1 text-sm leading-6 text-slate-500">

                Membantu pelanggan mengetahui lokasi usaha Anda.

            </p>

        </div>

        <div class="grid gap-6 lg:grid-cols-2">

            {{-- Alamat --}}
            <x-ui.field name="address" class="lg:col-span-2">

                <x-ui.label for="address" required>

                    Alamat Lengkap

                </x-ui.label>

                <x-ui.textarea id="address" name="address" rows="3"
                    placeholder="Masukkan alamat lengkap UMKM..."
                    required>{{ old('address', $umkm?->address) }}</x-ui.textarea>

            </x-ui.field>





            <x-ui.field name="village">

                <x-ui.label for="village" required>

                    Desa

                </x-ui.label>

                <x-ui.input id="village" name="village" :value="old('village', $umkm?->village)" required />

            </x-ui.field>





            <x-ui.field name="district">

                <x-ui.label for="district" required>

                    Kecamatan

                </x-ui.label>

                <x-ui.input id="district" name="district" :value="old('district', $umkm?->district)" required />

            </x-ui.field>





            <x-ui.field name="regency">

                <x-ui.label for="regency" required>

                    Kabupaten

                </x-ui.label>

                <x-ui.input id="regency" name="regency" :value="old('regency', $umkm?->regency)" required />

            </x-ui.field>





            <x-ui.field name="maps_url" helper="Tempel tautan Google Maps apabila tersedia.">

                <x-ui.label for="maps_url">

                    Google Maps

                </x-ui.label>

                <x-ui.input id="maps_url" name="maps_url" type="url" :value="old('maps_url', $umkm?->maps_url)"
                    placeholder="https://maps.google.com/..." />

            </x-ui.field>

        </div>

    </section>





    {{-- ====================================================== --}}
    {{-- Media --}}
    {{-- ====================================================== --}}
    <section class="border-t border-slate-200 pt-8">

        <div class="mb-6">

            <h2 class="text-lg font-semibold tracking-tight text-slate-900">

                Media UMKM

            </h2>

            <p class="mt-1 text-sm leading-6 text-slate-500">

                Unggah identitas visual agar UMKM terlihat lebih profesional.

            </p>

        </div>

        <div class="grid gap-6 lg:grid-cols-2">

            <x-ui.field name="logo">

                <x-ui.file-upload id="logo" name="logo" label="Logo UMKM" :preview="$umkm?->logo" />

            </x-ui.field>





            <x-ui.field name="banner">

                <x-ui.file-upload id="banner" name="banner" label="Banner UMKM" :preview="$umkm?->banner" />

            </x-ui.field>

        </div>

    </section>

</div>

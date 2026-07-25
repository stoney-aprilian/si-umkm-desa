<div class="space-y-8">


    {{-- Product Information --}}
    <section>

        <div class="mb-6">

            <h2 class="text-lg font-semibold text-slate-900">
                Informasi Produk
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Lengkapi informasi dasar produk yang akan ditampilkan pada katalog UMKM.
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
                    class="app-input"
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





            {{-- Product Name --}}
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

                    maxlength="150"

                    :value="old('name', $product->name ?? '')"

                    placeholder="Contoh: Keripik Singkong Original"

                    required />



            </x-ui.field>





            {{-- Price --}}
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

                    step="1"

                    :value="old('price', $product->price ?? '')"

                    placeholder="Contoh: 25000" />



            </x-ui.field>



        </div>


    </section>





    {{-- Product Image --}}
    <section class="border-t border-slate-200 pt-8">


        <div class="mb-6">

            <h3 class="text-base font-semibold text-slate-900">

                Gambar Produk

            </h3>


            <p class="mt-1 text-sm text-slate-500">

                Gunakan gambar produk dengan kualitas baik agar tampil menarik pada katalog.

            </p>


        </div>




        <x-ui.field
            name="image">


            <x-ui.label
                for="image">

                Gambar Produk

            </x-ui.label>



            @isset($product)

                @if($product->image)

                    <div class="mb-4">

                        <img
                            src="{{ asset('storage/'.$product->image) }}"
                            alt="{{ $product->name }}"
                            class="h-32 w-32 rounded-2xl object-cover border border-slate-200">

                    </div>

                @endif

            @endisset





            <input

                type="file"

                id="image"

                name="image"

                accept="image/png,image/jpeg,image/webp"

                class="app-input">



            <p class="mt-2 text-xs text-slate-500">

                Format JPG, JPEG, PNG, WEBP maksimal 2MB.

            </p>



        </x-ui.field>



    </section>





    {{-- Description --}}
    <section class="border-t border-slate-200 pt-8">


        <div class="mb-5">


            <h3 class="text-base font-semibold text-slate-900">

                Deskripsi Produk

            </h3>


            <p class="mt-1 text-sm text-slate-500">

                Jelaskan produk secara singkat agar calon pembeli memahami karakteristik produk.

            </p>


        </div>




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

                maxlength="1000"

                placeholder="Masukkan deskripsi produk (opsional)...">{{ old('description', $product->description ?? '') }}</x-ui.textarea>



        </x-ui.field>



    </section>





    {{-- Product Settings --}}
    <section class="border-t border-slate-200 pt-8">


        <div class="mb-5">


            <h3 class="text-base font-semibold text-slate-900">

                Pengaturan Produk

            </h3>


            <p class="mt-1 text-sm text-slate-500">

                Atur status publikasi dan prioritas tampilan produk.

            </p>


        </div>




        <div class="space-y-4">



            {{-- Featured --}}
            <x-ui.checkbox

                name="is_featured"

                :checked="old('is_featured', $product->is_featured ?? false)"

                label="Jadikan sebagai Produk Unggulan" />





            {{-- Active only edit --}}
            @isset($product)

                <x-ui.checkbox

                    name="is_active"

                    :checked="old('is_active', $product->is_active ?? true)"

                    label="Produk Aktif" />


            @endisset



        </div>



    </section>



</div>

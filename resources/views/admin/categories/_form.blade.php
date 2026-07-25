<div class="space-y-10">


    {{-- Basic Information --}}
    <section>

        <div class="mb-6">

            <h2 class="text-lg font-semibold tracking-tight text-slate-900">

                Informasi Kategori

            </h2>


            <p class="mt-1 text-sm leading-6 text-slate-500">

                Digunakan untuk mengelompokkan UMKM dan produk berdasarkan jenis usaha.

            </p>

        </div>



        <div class="space-y-6">


            {{-- Name --}}
            <x-ui.field
                name="name"
                helper="Gunakan nama kategori yang singkat dan mudah dikenali.">


                <x-ui.label
                    for="name"
                    required>

                    Nama Kategori

                </x-ui.label>



                <x-ui.input

                    id="name"

                    name="name"

                    :value="old('name', $category->name ?? '')"

                    placeholder="Contoh: Kuliner Tradisional"

                    autocomplete="off"

                    maxlength="100"

                    required />



            </x-ui.field>





            {{-- Description --}}
            <x-ui.field
                name="description">


                <x-ui.label
                    for="description">

                    Deskripsi

                </x-ui.label>



                <x-ui.textarea

                    id="description"

                    name="description"

                    rows="4"

                    maxlength="500"

                    placeholder="Tuliskan deskripsi singkat mengenai kategori ini (opsional)...">{{ old('description', $category->description ?? '') }}</x-ui.textarea>



            </x-ui.field>



        </div>


    </section>





    {{-- Status --}}
    @isset($category)


        <section class="border-t border-slate-200 pt-8">


            <div class="mb-5">


                <h3 class="text-base font-semibold text-slate-900">

                    Status Kategori

                </h3>



                <p class="mt-1 text-sm leading-6 text-slate-500">

                    Nonaktifkan kategori apabila sudah tidak digunakan.
                    Data yang tersimpan tidak akan terhapus.

                </p>


            </div>




            <x-ui.field>


                <x-ui.checkbox

                    name="is_active"

                    :checked="old('is_active', $category->is_active)"

                    label="Status kategori aktif" />


            </x-ui.field>



        </section>


    @endisset



</div>

<x-ui.field
    name="name"
    helper="Nama kategori harus unik.">

    <x-ui.label
        for="name"
        required>

        Nama Kategori

    </x-ui.label>

    <x-ui.input
        id="name"
        name="name"
        :value="old('name', $category->name ?? '')"
        placeholder="Contoh: Makanan Tradisional"
        required />

</x-ui.field>

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
        placeholder="Masukkan deskripsi kategori (opsional)...">{{ old('description', $category->description ?? '') }}</x-ui.textarea>

</x-ui.field>

@isset($category)

    <x-ui.field>

        <x-ui.checkbox
            name="is_active"
            :checked="old('is_active', $category->is_active)"
            label="Aktif" />

    </x-ui.field>

@endisset

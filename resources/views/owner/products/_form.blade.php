@php
    /** @var \App\Models\Product|null $product */
    $product ??= null;
@endphp

<div class="grid gap-6 lg:grid-cols-2">

    <x-ui.field
        name="name"
        class="lg:col-span-2">

        <x-ui.label
            for="name"
            required>

            Nama Produk

        </x-ui.label>

        <x-ui.input
            id="name"
            name="name"
            :value="old('name', $product?->name)"
            required />

    </x-ui.field>

    <x-ui.field
        name="price">

        <x-ui.label
            for="price"
            required>

            Harga (Rp)

        </x-ui.label>

        <x-ui.input
            id="price"
            name="price"
            type="number"
            min="0"
            step="0.01"
            :value="old('price', $product?->price)"
            required />

    </x-ui.field>

    <x-ui.field
        name="is_active"
        class="flex items-end">

        <x-ui.checkbox
            id="is_active"
            name="is_active"
            label="Produk Aktif"
            :checked="old('is_active', $product?->is_active ?? true)" />

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
            rows="5">{{ old('description', $product?->description) }}</x-ui.textarea>

    </x-ui.field>

    <x-ui.field
        name="image"
        class="lg:col-span-2">

        <x-ui.file-upload
            id="image"
            name="image"
            label="Foto Produk"
            :preview="$product?->image" />

    </x-ui.field>

</div>

@props([
    'id',
    'name',
    'label' => null,
    'preview' => null,
    'accept' => 'image/*',
])


<div class="space-y-3">


    @if ($label)

        <x-ui.label
            :for="$id">

            {{ $label }}

        </x-ui.label>

    @endif



    @if ($preview)

        <div class="overflow-hidden rounded-xl border border-slate-200">

            <img
                src="{{ asset('storage/' . $preview) }}"
                alt="{{ $label ?? 'Preview gambar' }}"
                class="h-40 w-full object-cover"
                onerror="this.style.display='none'">

        </div>

    @endif



    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="file"
        accept="{{ $accept }}"

        {{ $attributes->merge([
            'class' =>
                'block w-full cursor-pointer rounded-xl border border-slate-300 bg-white text-sm text-slate-700 shadow-sm transition
                file:mr-4 file:rounded-lg file:border-0 file:bg-emerald-600 file:px-4 file:py-2 file:text-sm file:font-medium file:text-white
                hover:file:bg-emerald-700
                focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20'
        ]) }}>


    @error($name)

        <p
            role="alert"
            class="text-sm font-medium text-red-600">

            {{ $message }}

        </p>

    @enderror


</div>

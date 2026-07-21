@props([
    'name',
    'label' => null,
    'checked' => false,
    'value' => 1,
])

<label class="inline-flex items-center gap-3 cursor-pointer">

    <input
        type="checkbox"
        name="{{ $name }}"
        value="{{ $value }}"
        @checked($checked)
        class="h-4 w-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">

    @if($label)
        <span class="text-sm text-slate-700">
            {{ $label }}
        </span>
    @else
        {{ $slot }}
    @endif

</label>

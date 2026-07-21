@props([
    'rows' => 4,
])

<textarea
    rows="{{ $rows }}"
    {{ $attributes->merge([
        'class' => 'app-input resize-y',
    ]) }}>{{ $slot }}</textarea>

@props([
    'rows' => 4,
])

<textarea
    rows="{{ $rows }}"
    {{
        $attributes->class([
            'app-input resize-y',
        ])
    }}>{{ $slot }}</textarea>

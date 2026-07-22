@props([
    'type' => 'text',
])

<input
    type="{{ $type }}"
    {{
        $attributes->class([
            'app-input',
        ])
    }}>

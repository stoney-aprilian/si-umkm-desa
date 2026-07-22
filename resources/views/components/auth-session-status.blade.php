@props([
    'status',
])

@if ($status)

    <div
        {{
            $attributes->class([
                'flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700',
            ])
        }}>

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="mt-0.5 h-5 w-5 shrink-0"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            aria-hidden="true">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 12.75L11.25 15L15 9.75m6.75 2.25A9 9 0 1112 3a9 9 0 019 9z" />

        </svg>

        <span>

            {{ $status }}

        </span>

    </div>

@endif

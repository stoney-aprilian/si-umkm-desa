@props([
    'name' => 'search',
    'value' => request('search'),
    'placeholder' => 'Cari...',
])


<div
    role="search"

    {{ $attributes->merge([
        'class' => 'relative flex-1',
    ]) }}>


    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        aria-hidden="true">


        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0a7 7 0 0114 0z"/>


    </svg>



    <x-ui.input
        :name="$name"
        :value="$value"
        :placeholder="$placeholder"
        class="pl-11" />


</div>

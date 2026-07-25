@props([
    'padding' => true,
    'header' => null,
    'footer' => null,
])


<div
    {{ $attributes->merge([
        'class' => 'overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm',
    ]) }}>


    {{-- Header --}}
    @if ($header)

        <div class="border-b border-slate-200 px-6 py-5">

            {{ $header }}

        </div>

    @endif



    {{-- Body --}}
    @if ($padding)

        <div class="px-6 py-6">

            {{ $slot }}

        </div>

    @else

        {{ $slot }}

    @endif



    {{-- Footer --}}
    @if ($footer)

        <div class="border-t border-slate-200 bg-slate-50 px-6 py-5">

            {{ $footer }}

        </div>

    @endif


</div>

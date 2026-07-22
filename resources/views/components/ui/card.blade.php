@props([
    'padding' => true,
    'header' => null,
    'footer' => null,
])

<div
    {{ $attributes->merge([
        'class' => 'app-card overflow-hidden',
    ]) }}>

    @if ($header)

        <div class="border-b border-slate-200 px-6 py-5">

            {{ $header }}

        </div>

    @endif

    @if ($padding)

        <div class="card-body">

            {{ $slot }}

        </div>

    @else

        {{ $slot }}

    @endif

    @if ($footer)

        <div class="border-t border-slate-200 px-6 py-5">

            {{ $footer }}

        </div>

    @endif

</div>

@props([
    'action' => '',
    'method' => 'GET',
])


<form
    action="{{ $action }}"
    method="{{ strtoupper($method) === 'GET' ? 'GET' : 'POST' }}"

    {{ $attributes->merge([
        'class' => '',
    ]) }}>


    @if (strtoupper($method) !== 'GET')

        @csrf

        @if (!in_array(strtoupper($method), ['POST']))

            @method(strtoupper($method))

        @endif

    @endif



    <x-ui.card>

        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">

            {{ $slot }}

        </div>

    </x-ui.card>


</form>

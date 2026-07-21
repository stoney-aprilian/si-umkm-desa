@props([
    'action' => '',
    'method' => 'GET',
])

<form
    action="{{ $action }}"
    method="{{ strtoupper($method) === 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes }}>

    @if(strtoupper($method) !== 'GET')
        @csrf
    @endif

    <x-ui.card>

        <div class="flex flex-col gap-4 lg:flex-row lg:items-center">

            {{ $slot }}

        </div>

    </x-ui.card>

</form>

<x-guest-layout>

    <div class="space-y-8">

        {{-- Header --}}
        <div class="text-center">

            <h1 class="text-2xl font-bold text-gray-900">
                Konfirmasi Password
            </h1>

            <p class="mt-2 text-sm leading-6 text-gray-500">
                Demi keamanan akun Anda, silakan masukkan kembali password
                untuk melanjutkan proses ini.
            </p>

        </div>

        {{-- Form --}}
        <form
            method="POST"
            action="{{ route('password.confirm') }}"
            class="space-y-6">

            @csrf

            <x-ui.field
                name="password">

                <x-ui.label
                    for="password"
                    required>

                    Password

                </x-ui.label>

                <x-ui.input
                    id="password"
                    type="password"
                    name="password"
                    autocomplete="current-password"
                    placeholder="Masukkan password Anda"
                    required />

            </x-ui.field>

            <div class="pt-2">

                <x-ui.button
                    type="submit"
                    class="w-full justify-center">

                    Konfirmasi Password

                </x-ui.button>

            </div>

        </form>

    </div>

</x-guest-layout>

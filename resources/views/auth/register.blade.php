<x-guest-layout>

    <div class="space-y-8">

        {{-- Header --}}
        <div class="text-center">

            <h1 class="text-3xl font-bold text-gray-900">
                Buat Akun
            </h1>

            <p class="mt-2 text-sm leading-6 text-gray-500">
                Lengkapi data berikut untuk membuat akun baru pada
                Sistem Informasi UMKM Desa.
            </p>

        </div>

        {{-- Register Form --}}
        <form
            method="POST"
            action="{{ route('register') }}"
            class="space-y-6">

            @csrf

            {{-- Nama --}}
            <x-ui.field
                name="name">

                <x-ui.label
                    for="name"
                    required>

                    Nama Lengkap

                </x-ui.label>

                <x-ui.input
                    id="name"
                    name="name"
                    type="text"
                    :value="old('name')"
                    autocomplete="name"
                    autofocus
                    placeholder="Masukkan nama lengkap"
                    required />

            </x-ui.field>

            {{-- Email --}}
            <x-ui.field
                name="email">

                <x-ui.label
                    for="email"
                    required>

                    Alamat Email

                </x-ui.label>

                <x-ui.input
                    id="email"
                    name="email"
                    type="email"
                    :value="old('email')"
                    autocomplete="username"
                    placeholder="contoh@email.com"
                    required />

            </x-ui.field>

            {{-- Password --}}
            <x-ui.field
                name="password">

                <x-ui.label
                    for="password"
                    required>

                    Password

                </x-ui.label>

                <x-ui.input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="new-password"
                    placeholder="Masukkan password"
                    required />

            </x-ui.field>

            {{-- Konfirmasi Password --}}
            <x-ui.field
                name="password_confirmation">

                <x-ui.label
                    for="password_confirmation"
                    required>

                    Konfirmasi Password

                </x-ui.label>

                <x-ui.input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    placeholder="Ulangi password"
                    required />

            </x-ui.field>

            {{-- Submit --}}
            <x-ui.button
                type="submit"
                class="w-full justify-center">

                Daftar

            </x-ui.button>

        </form>

        <div class="border-t border-gray-200 pt-6 text-center">

            <p class="text-sm text-gray-500">

                Sudah memiliki akun?

                <a
                    href="{{ route('login') }}"
                    class="font-semibold text-green-600 transition hover:text-green-700">

                    Masuk sekarang

                </a>

            </p>

        </div>

    </div>

</x-guest-layout>

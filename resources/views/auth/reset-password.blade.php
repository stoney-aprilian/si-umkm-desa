<x-guest-layout>

    <div class="space-y-8">

        {{-- Header --}}
        <div class="text-center">

            <h1 class="text-2xl font-bold text-gray-900">
                Reset Password
            </h1>

            <p class="mt-2 text-sm leading-6 text-gray-500">
                Silakan buat password baru untuk akun Anda. Pastikan password
                yang digunakan kuat dan mudah Anda ingat.
            </p>

        </div>

        {{-- Form --}}
        <form
            method="POST"
            action="{{ route('password.store') }}"
            class="space-y-6">

            @csrf

            {{-- Token --}}
            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}">

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
                    type="email"
                    name="email"
                    :value="old('email', $request->email)"
                    autocomplete="username"
                    autofocus
                    placeholder="contoh@email.com"
                    required />

            </x-ui.field>

            {{-- Password Baru --}}
            <x-ui.field
                name="password">

                <x-ui.label
                    for="password"
                    required>

                    Password Baru

                </x-ui.label>

                <x-ui.input
                    id="password"
                    type="password"
                    name="password"
                    autocomplete="new-password"
                    placeholder="Masukkan password baru"
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
                    type="password"
                    name="password_confirmation"
                    autocomplete="new-password"
                    placeholder="Ulangi password baru"
                    required />

            </x-ui.field>

            {{-- Submit --}}
            <x-ui.button
                type="submit"
                class="w-full justify-center">

                Simpan Password Baru

            </x-ui.button>

        </form>

    </div>

</x-guest-layout>

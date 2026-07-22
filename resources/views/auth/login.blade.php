<x-guest-layout>

    <div class="space-y-8">

        {{-- Header --}}
        <div class="text-center">

            <h1 class="text-3xl font-bold text-gray-900">
                Selamat Datang
            </h1>

            <p class="mt-2 text-sm leading-6 text-gray-500">
                Masuk ke Sistem Informasi UMKM Desa untuk mengelola data UMKM,
                kategori, dan produk.
            </p>

        </div>

        {{-- Session Status --}}
        @if (session('status'))

            <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">

                {{ session('status') }}

            </div>

        @endif

        {{-- Login Form --}}
        <form
            method="POST"
            action="{{ route('login') }}"
            class="space-y-6">

            @csrf

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
                    :value="old('email')"
                    autocomplete="username"
                    autofocus
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
                    type="password"
                    name="password"
                    autocomplete="current-password"
                    placeholder="Masukkan password"
                    required />

            </x-ui.field>

            {{-- Remember --}}
            <div class="flex items-center justify-between">

                <x-ui.checkbox
                    name="remember"
                    label="Ingat saya" />

                @if (Route::has('password.request'))

                    <a
                        href="{{ route('password.request') }}"
                        class="text-sm font-medium text-green-600 transition hover:text-green-700">

                        Lupa Password?

                    </a>

                @endif

            </div>

            {{-- Submit --}}
            <x-ui.button
                type="submit"
                class="w-full justify-center">

                Masuk

            </x-ui.button>

        </form>

        @if (Route::has('register'))

            <div class="border-t border-gray-200 pt-6 text-center">

                <p class="text-sm text-gray-500">

                    Belum memiliki akun?

                    <a
                        href="{{ route('register') }}"
                        class="font-semibold text-green-600 hover:text-green-700">

                        Daftar sekarang

                    </a>

                </p>

            </div>

        @endif

    </div>

</x-guest-layout>

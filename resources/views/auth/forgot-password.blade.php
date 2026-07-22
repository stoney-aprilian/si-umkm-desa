<x-guest-layout>

    <div class="space-y-8">

        {{-- Header --}}
        <div class="text-center">

            <h1 class="text-2xl font-bold text-gray-900">
                Lupa Password
            </h1>

            <p class="mt-2 text-sm leading-6 text-gray-500">
                Masukkan alamat email yang terdaftar. Kami akan mengirimkan
                tautan untuk mengatur ulang password akun Anda.
            </p>

        </div>

        {{-- Success Message --}}
        @if (session('status'))

            <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">

                {{ session('status') }}

            </div>

        @endif

        {{-- Form --}}
        <form
            method="POST"
            action="{{ route('password.email') }}"
            class="space-y-6">

            @csrf

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
                    autocomplete="email"
                    autofocus
                    placeholder="contoh@email.com"
                    required />

            </x-ui.field>

            <div class="space-y-3">

                <x-ui.button
                    type="submit"
                    class="w-full justify-center">

                    Kirim Tautan Reset Password

                </x-ui.button>

                <x-ui.button
                    href="{{ route('login') }}"
                    variant="secondary"
                    class="w-full justify-center">

                    Kembali ke Login

                </x-ui.button>

            </div>

        </form>

    </div>

</x-guest-layout>

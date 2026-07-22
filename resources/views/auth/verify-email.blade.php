<x-guest-layout>

    <div class="space-y-8">

        {{-- Header --}}
        <div class="text-center">

            <h1 class="text-2xl font-bold text-gray-900">
                Verifikasi Email
            </h1>

            <p class="mt-2 text-sm leading-6 text-gray-500">
                Sebelum melanjutkan, silakan verifikasi alamat email Anda
                melalui tautan yang telah kami kirimkan. Jika email belum
                diterima, Anda dapat meminta pengiriman ulang.
            </p>

        </div>

        {{-- Success Message --}}
        @if (session('status') === 'verification-link-sent')

            <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">

                Tautan verifikasi baru berhasil dikirim ke alamat email Anda.

            </div>

        @endif

        {{-- Actions --}}
        <div class="space-y-4">

            <form
                method="POST"
                action="{{ route('verification.send') }}">

                @csrf

                <x-ui.button
                    type="submit"
                    class="w-full justify-center">

                    Kirim Ulang Email Verifikasi

                </x-ui.button>

            </form>

            <form
                method="POST"
                action="{{ route('logout') }}">

                @csrf

                <x-ui.button
                    type="submit"
                    variant="secondary"
                    class="w-full justify-center">

                    Keluar

                </x-ui.button>

            </form>

        </div>

    </div>

</x-guest-layout>

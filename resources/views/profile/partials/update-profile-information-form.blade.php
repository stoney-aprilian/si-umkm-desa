<section class="space-y-6">

    <header class="space-y-2">

        <h2 class="text-lg font-semibold text-slate-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="text-sm leading-6 text-slate-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>

    </header>

    <form
        id="send-verification"
        method="POST"
        action="{{ route('verification.send') }}">

        @csrf

    </form>

    <form
        method="POST"
        action="{{ route('profile.update') }}"
        class="space-y-6">

        @csrf
        @method('PATCH')

        <div>

            <x-input-label
                for="name"
                :value="__('Name')" />

            <x-ui.input
                id="name"
                name="name"
                type="text"
                class="mt-1 w-full"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name" />

            <x-input-error
                :messages="$errors->get('name')"
                class="mt-2" />

        </div>

        <div>

            <x-input-label
                for="email"
                :value="__('Email')" />

            <x-ui.input
                id="email"
                name="email"
                type="email"
                class="mt-1 w-full"
                :value="old('email', $user->email)"
                required
                autocomplete="username" />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div class="mt-4 rounded-xl border border-amber-200 bg-amber-50 p-4">

                    <p class="text-sm leading-6 text-amber-900">

                        {{ __('Your email address is unverified.') }}

                    </p>

                    <button
                        form="send-verification"
                        class="mt-3 text-sm font-medium text-amber-700 underline underline-offset-4 transition-colors duration-200 hover:text-amber-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500">

                        {{ __('Click here to re-send the verification email.') }}

                    </button>

                    @if (session('status') === 'verification-link-sent')

                        <p
                            class="mt-3 text-sm font-medium text-emerald-600">

                            {{ __('A new verification link has been sent to your email address.') }}

                        </p>

                    @endif

                </div>

            @endif

        </div>

        <div class="flex items-center gap-4">

            <x-ui.button>

                {{ __('Save Changes') }}

            </x-ui.button>

            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition.opacity.duration.300ms
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-emerald-600">

                    {{ __('Profile updated successfully.') }}

                </p>

            @endif

        </div>

    </form>

</section>

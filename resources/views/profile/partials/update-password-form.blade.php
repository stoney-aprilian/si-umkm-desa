<section class="space-y-6">

    <header class="space-y-2">

        <h2 class="text-lg font-semibold text-slate-900">
            {{ __('Update Password') }}
        </h2>

        <p class="text-sm leading-6 text-slate-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>

    </header>

    <form
        method="POST"
        action="{{ route('password.update') }}"
        class="space-y-6">

        @csrf
        @method('PUT')

        <div>

            <x-input-label
                for="update_password_current_password"
                :value="__('Current Password')" />

            <x-ui.input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 w-full"
                autocomplete="current-password" />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2" />

        </div>

        <div>

            <x-input-label
                for="update_password_password"
                :value="__('New Password')" />

            <x-ui.input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 w-full"
                autocomplete="new-password" />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2" />

        </div>

        <div>

            <x-input-label
                for="update_password_password_confirmation"
                :value="__('Confirm Password')" />

            <x-ui.input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 w-full"
                autocomplete="new-password" />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2" />

        </div>

        <div class="flex items-center gap-4">

            <x-ui.button>

                {{ __('Save Changes') }}

            </x-ui.button>

            @if (session('status') === 'password-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition.opacity.duration.300ms
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-emerald-600">

                    {{ __('Password updated successfully.') }}

                </p>

            @endif

        </div>

    </form>

</section>

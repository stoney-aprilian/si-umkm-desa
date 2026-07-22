<section class="space-y-6">

    <header class="space-y-2">

        <h2 class="text-lg font-semibold text-slate-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="text-sm leading-6 text-slate-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>

    </header>

    <x-ui.button
        variant="danger"
        type="button"
        x-data
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">

        {{ __('Delete Account') }}

    </x-ui.button>

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable>

        <form
            method="POST"
            action="{{ route('profile.destroy') }}"
            class="space-y-6 p-8">

            @csrf
            @method('DELETE')

            <div class="space-y-2">

                <h2 class="text-lg font-semibold text-slate-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="text-sm leading-6 text-slate-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

            </div>

            <div>

                <x-input-label
                    for="password"
                    value="{{ __('Password') }}"
                    class="sr-only" />

                <x-ui.input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 w-full md:w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2" />

            </div>

            <div class="flex justify-end gap-3">

                <x-ui.button
                    variant="secondary"
                    type="button"
                    x-on:click="$dispatch('close')">

                    {{ __('Cancel') }}

                </x-ui.button>

                <x-ui.button variant="danger">

                    {{ __('Delete Account') }}

                </x-ui.button>

            </div>

        </form>

    </x-modal>

</section>

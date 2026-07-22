<nav
    x-data="{ open: false }"
    class="sticky top-0 z-40 border-b border-slate-200 bg-white">

    <div class="app-container">

        <div class="flex h-18 items-center justify-between">

            {{-- Left --}}
            <div class="flex items-center gap-10">

                {{-- Logo --}}
                <a
                    href="{{ route('dashboard') }}"
                    class="flex items-center">

                    <x-application-logo class="h-10 w-auto" />

                </a>

                {{-- Desktop Navigation --}}
                <div class="hidden items-center gap-2 sm:flex">

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')">

                        {{ __('Dashboard') }}

                    </x-nav-link>

                </div>

            </div>

            {{-- Right --}}
            <div class="hidden items-center sm:flex">

                <x-dropdown
                    align="right"
                    width="48">

                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-slate-700 transition-colors duration-200 hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">

                            <span>{{ Auth::user()->name }}</span>

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m19 9-7 7-7-7" />

                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">

                            {{ __('Profile') }}

                        </x-dropdown-link>

                        <form
                            method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">

                                {{ __('Log Out') }}

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            {{-- Mobile Toggle --}}
            <button
                @click="open = !open"
                class="inline-flex items-center justify-center rounded-xl p-2 text-slate-600 transition-colors duration-200 hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 sm:hidden">

                <svg
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        :class="{ 'hidden': open, 'inline-flex': !open }"
                        class="inline-flex"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />

                    <path
                        :class="{ 'hidden': !open, 'inline-flex': open }"
                        class="hidden"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />

                </svg>

            </button>

        </div>

    </div>

    {{-- Mobile Navigation --}}
    <div
        x-show="open"
        x-transition
        class="border-t border-slate-200 bg-white sm:hidden">

        <div class="space-y-2 p-4">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')">

                {{ __('Dashboard') }}

            </x-responsive-nav-link>

        </div>

        <div class="border-t border-slate-200 p-4">

            <div class="mb-4">

                <div class="font-semibold text-slate-900">

                    {{ Auth::user()->name }}

                </div>

                <div class="text-sm text-slate-500">

                    {{ Auth::user()->email }}

                </div>

            </div>

            <div class="space-y-2">

                <x-responsive-nav-link
                    :href="route('profile.edit')">

                    {{ __('Profile') }}

                </x-responsive-nav-link>

                <form
                    method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">

                        {{ __('Log Out') }}

                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>

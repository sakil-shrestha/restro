<x-guest-layout>

<div class="min-h-screen bg-[#F1EAE2]">

    <div class="grid min-h-screen lg:grid-cols-2">

        <!-- Left Image -->
        <div class="relative hidden lg:block">

            <img
                src="{{ asset('images/cafe-interior.jpg') }}"
                class="absolute inset-0 h-full w-full object-cover"
                alt="Cafe Selah"
            >

            <div class="absolute inset-0 bg-black/50"></div>

            <div class="absolute bottom-16 left-16 right-16 text-white">

                <h1 class="font-serif text-6xl leading-tight">
                    Welcome to
                    <br>
                    Cafe Selah
                </h1>

                <p class="mt-6 text-lg text-gray-200">
                    Pause • Reflect • Rest
                </p>

            </div>

        </div>

        <!-- Login Card -->
        <div class="flex items-center justify-center px-8 py-10">

            <div
                class="w-full max-w-md rounded-3xl bg-white p-10 shadow-2xl">

                <div class="mb-10 text-center">

                    <img
                        src="{{ asset('images/logo.png') }}"
                        class="mx-auto mb-5 h-24 w-24"
                        alt="Logo"
                    >

                    <h2 class="font-serif text-4xl text-[#271D14]">
                        Admin Login
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Sign in to access the dashboard
                    </p>

                </div>

                <x-auth-session-status
                    class="mb-4"
                    :status="session('status')"
                />

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <!-- Email -->

                    <div>

                        <x-input-label
                            for="email"
                            :value="__('Email Address')"
                        />

                        <x-text-input
                            id="email"
                            class="mt-2 block w-full rounded-xl border-gray-300 px-4 py-3 focus:border-[#c9a84c] focus:ring-[#c9a84c]"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />

                    </div>

                    <!-- Password -->

                    <div class="mt-6">

                        <x-input-label
                            for="password"
                            :value="__('Password')"
                        />

                        <x-text-input
                            id="password"
                            class="mt-2 block w-full rounded-xl border-gray-300 px-4 py-3 focus:border-[#c9a84c] focus:ring-[#c9a84c]"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                        />

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />

                    </div>

                    <!-- Remember -->

                    <div class="mt-6 flex items-center justify-between">

                        <label class="flex items-center">

                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="rounded border-gray-300 text-[#271D14] focus:ring-[#c9a84c]"
                            >

                            <span class="ml-2 text-sm text-gray-600">
                                Remember me
                            </span>

                        </label>

                        @if (Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                class="text-sm font-medium text-[#c9a84c] hover:text-[#271D14]"
                            >
                                Forgot Password?
                            </a>

                        @endif

                    </div>

                    <!-- Button -->

                    <div class="mt-8">

                        <x-primary-button
                            class="w-full justify-center rounded-xl bg-[#271D14] py-4 text-base font-semibold transition hover:bg-[#c9a84c] hover:text-[#271D14]"
                        >
                            {{ __('Log In') }}
                        </x-primary-button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</x-guest-layout>

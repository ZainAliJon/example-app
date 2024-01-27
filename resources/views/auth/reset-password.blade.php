<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <div class="input-group" style="position: relative;">
                        <input
                        id="password"
                        type="password"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Password"
                        >
                        <span class="" style="position:absolute;right: 10px;top: 10px;cursor: pointer;">
                            <span class="input-group-text">
                                <i id="togglePassword" class="fas fa-eye"></i>
                            </span>
                        </span>
                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <div class="input-group" style="position: relative;">
                            <input
                            id="password_confirmation"
                            type="password"
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Password"
                            >
                            <span class="" style="position:absolute;right: 10px;top: 10px;cursor: pointer;">
                                <span class="input-group-text">
                                    <i id="togglePassword" class="fas fa-eye"></i>
                                </span>
                            </span>
                        </div>

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Reset Password') }}
                            </x-primary-button>
                        </div>
                    </form>
                </x-guest-layout>

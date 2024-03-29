<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="user_name" :value="__('Username')" />
            <x-text-input id="user_name" class="block mt-1 w-full" type="text" name="user_name" :value="old('user_name')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
    <x-input-label for="password" :value="__('Password')" />

    <div class="input-group" style="position: relative;">
        <input
            id="password"
            type="password"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full togglePasswordinput"
            name="password"
            required
            autocomplete="current-password"
            placeholder="Password"
        >
        <span class="" style="position:absolute;right: 10px;top: 10px;cursor: pointer;">
            <span class="input-group-text">
                <i id="" class="fas fa-eye togglePassword"></i>
            </span>
        </span>
    </div>

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>


        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
               
                
<!-- 
                <a class="btn bg-gray-800 px-4 py-2 text-white " href="{{url('/register') }}" style="font-size:13px;font-weight: 700; border-radius:7px;">  
                  SIGN UP
                 </a> -->
           
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

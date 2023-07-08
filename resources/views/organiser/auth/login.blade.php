<x-guest-layout>

    <div class="mt-4 flex items-center justify-center">
        <x-input-label for="login" :value="__('Organiser Login')" />
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('organiser.login') }}">
        @csrf

        <!-- Error / Success Message -->
        @if(Session::has('org-status'))
            <p class="alert alert-success">{{ Session::get('org-status') }}</p>
        @endif
        @if (session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="organiser_email" :value="old('organiser_email')" autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('organiser_email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4 text-primary">
            @if (Route::has('password.request'))
                <a class="underline" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3 bg-dark">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="ml-2 pt-100 flex text-sm text-gray-600 dark:text-gray-400" style="justify-content: space-between; margin-top:20px">
        <a href="{{ route('organiser.register'); }}">Register as Organiser</a>
        <a href="{{ route('register'); }}">Register as User</a>
    </div>
    
    <div class="ml-2 pt-100 flex text-sm text-gray-600 dark:text-gray-400" style="justify-content: space-between; margin-top:20px; justify-item:center">
        <a href="{{ route('admin.login'); }}">Login as Admin</a>
        <a href="{{ route('login'); }}">Login as User</a>
    </div>
</x-guest-layout>

<x-guest-layout>

    <div class="mt-1 flex items-center justify-center">
        <x-input-label for="login" :value="__('User Register')" />
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
    
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="user_name" :value="old('user_name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="user_email" :value="old('user_email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('user_email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4 text-primary">
            <x-primary-button class="ml-4 bg-dark">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <div class="ml-2 pt-100 flex text-sm text-gray-600 dark:text-gray-400" style="justify-content: space-between; margin-top:20px">
        <a href="{{ route('admin.login'); }}">Login as Admin</a>
        <a href="{{ route('organiser.login'); }}">Login as Organiser</a>
    </div>
    
    <div class="ml-2 pt-100 flex text-sm text-gray-600 dark:text-gray-400" style="justify-content: space-between; margin-top:20px; justify-item:center">
        <a href="{{ route('login'); }}">Login as User</a>
        <a href="{{ route('organiser.register'); }}">Register as Organiser</a>
    </div>
</x-guest-layout>

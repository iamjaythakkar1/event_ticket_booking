<x-guest-layout>

    <div class="mt-4 flex items-center justify-center">
        <x-input-label for="login" :value="__('Organiser Register')" />
    </div>

    <form method="POST" action="{{ route('organiser.register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="organiser_name" :value="old('organiser_name')"  autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('organiser_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="organiser_email" :value="old('organiser_email')"  autocomplete="username" />
            <x-input-error :messages="$errors->get('organiser_email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phoneno" :value="__('Phone Number')" />
            <x-text-input id="phoneno" class="block mt-1 w-full" type="text" name="phoneno" :value="old('phoneno')"  autocomplete="phoneno" />
            <x-input-error :messages="$errors->get('phoneno')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="organiser_description" :value="old('organiser_description')"  autocomplete="description" />
            <x-input-error :messages="$errors->get('organiser_description')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4 text-primary">
            <a class="underline" href="{{ route('organiser.login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4 bg-dark">
                {{ __('Request to Admin') }}
            </x-primary-button>
        </div>
    </form>

    <div class="ml-2 pt-100 flex text-sm text-gray-600 dark:text-gray-400" style="justify-content: space-between; margin-top:20px">
        <a href="{{ route('organiser.login'); }}">Login as Organiser</a>
        <a href="{{ route('register'); }}">Register as User</a>
    </div>
    
    <div class="ml-2 pt-100 flex text-sm text-gray-600 dark:text-gray-400" style="justify-content: space-between; margin-top:20px; justify-item:center">
        <a href="{{ route('admin.login'); }}">Login as Admin</a>
        <a href="{{ route('login'); }}">Login as User</a>
    </div>
</x-guest-layout>

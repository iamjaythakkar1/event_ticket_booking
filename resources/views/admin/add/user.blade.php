<x-admin-layout>

    <x-slot name='title'>Admin - Add User</x-slot>

    <x-slot name='main'>
    <div class="container m-t-20">
        <div class="wrap-login100 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 25%">
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('admin.user.store') }}" method="post">
                @csrf
                <span class="login100-form-title p-b-30">
                    Add User
                </span>

                @error('user_name')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 m-b-30">
                    <input class="input100" type="text" name="user_name" placeholder="User Name" value="{{ old('user_name') }}">
                    <span class="focus-input100"></span>
                </div>

                @error('user_email')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 m-b-30" >
                    <input class="input100" type="text" name="user_email" placeholder="User Email" value="{{ old('user_email') }}">
                    <span class="focus-input100"></span>
                </div>
                   
                @error('password')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 m-b-30">
                    <input class="input100" type="password" name="password" placeholder="User Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 m-b-30">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Repeat Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Add New User
                    </button>
                </div>
            </form>
        </div>
    </div>

    </x-slot>
</x-admin-layout>
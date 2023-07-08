<x-admin-layout>

    <x-slot name='title'>Admin - Profile</x-slot>

    <x-slot name='main'>
    <div class="container m-t-20">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="wrap-login100 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 12%; width: 750px">
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('admin.profile.update') }}" method="post">
                @csrf
                <span class="login100-form-title p-b-30">
                    Edit Your Details
                </span>

                @error('name')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 m-b-30">
                    <input class="input100" type="text" name="name" placeholder="Your Name" value="{{ $data->admin_name }}">
                    <span class="focus-input100"></span>
                </div>

                @error('email')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 m-b-30">
                    <input class="input100" type="text" name="email" placeholder="Your Email" value="{{ $data->admin_email }}">
                    <span class="focus-input100"></span>
                </div>

                @error('current_password')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 m-b-30">
                    <input class="input100" type="password" name="current_password" placeholder="Current Password">
                    <span class="focus-input100"></span>
                </div>

                @error('password')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 m-b-30">
                    <input class="input100" type="password" name="password" placeholder="New Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 m-b-30">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Repeat Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Save Your Details
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-slot>
</x-admin-layout>
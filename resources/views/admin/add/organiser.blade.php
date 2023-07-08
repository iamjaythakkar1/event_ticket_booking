<x-admin-layout>

    <x-slot name='title'>Admin - Add Organiser</x-slot>

    <x-slot name='main'>

    <div class="container m-t-20">
        <div class="wrap-login100 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 25%">
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('admin.organiser.store') }}" method="post">
                @csrf
                <span class="login100-form-title p-b-30">
                    Add Organiser
                </span>

                @error('organiser_name')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 m-b-30" >
                    <input class="input100" type="text" name="organiser_name" placeholder="Organisation Name" value="{{ old('organiser_name') }}">
                    <span class="focus-input100"></span>
                </div>

                @error('organiser_email')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 m-b-30" >
                    <input class="input100" type="text" name="organiser_email" placeholder="Organisation Email" value="{{ old('organiser_email') }}">
                    <span class="focus-input100"></span>
                </div>

                @error('phoneno')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 m-b-30">
                    <input class="input100" type="text" name="phoneno" placeholder="Phone Number" value="{{ old('phoneno') }}">
                    <span class="focus-input100"></span>
                </div>

                @error('organiser_description')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 m-b-30">
                    <textarea class="input100" type="text" rows="4" cols="50" name="organiser_description" placeholder="Describe Your Organisation">{{ old('organiser_description') }}</textarea>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Add Organiser & <br> Send Password Via Email
                    </button>
                </div>
            </form>
        </div>
    </div>
    </x-slot>
</x-admin-layout>
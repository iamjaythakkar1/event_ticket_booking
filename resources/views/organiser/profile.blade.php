<x-organiser-layout>

    <x-slot name='title'>Organiser - Profile</x-slot>

    <x-slot name='main'>
    <div class="container m-t-20">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
     @endif
        <div class="wrap-login100 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 12%; width: 750px">
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('organiser.profile.update')}}" method="post">
              @csrf
                <span class="login100-form-title p-b-30">
                    Edit Your Details
                </span>
               
                @error('name')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 validate-input m-b-30" data-validate="Name is required">
                    <input class="input100" type="text" name="name" placeholder="Your Name" value="{{ $data->organiser_name }}">
                    <span class="focus-input100"></span>
                </div>

                @error('email')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 validate-input m-b-30" data-validate="Email is required">
                    <input class="input100" type="text" name="email" placeholder="Your Email" value="{{ $data->organiser_email }}" disabled>
                    <input type="hidden" name="orgemail" value="{{ 'Test' }}">
                    <span class="focus-input100"></span>
                </div>

                @error('phoneno')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 validate-input m-b-30" data-validate="Phone Number is required">
                    <input class="input100" type="text" name="phoneno" placeholder="Your Phone Number" value="{{ $data->phoneno }}">
                    <span class="focus-input100"></span>
                </div>

                @error('description')
                    <div class="text-danger">* {{ $message }}</div>
                @enderror
                <div class="wrap-input100 validate-input m-b-30 p-t-10" data-validate="Description is required">
                    <textarea class="input100" type="text" rows="10" cols="50" name="description" placeholder="Describe Your Organisation">{{ $data->organiser_description }}</textarea>
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
</x-organiser-layout>

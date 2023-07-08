<x-admin-layout>

    <x-slot name='title'>Admin - Add Speaker</x-slot>

    <x-slot name='main'>
    <div class="container m-t-20">
    <div class="wrap-login100 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 25%">
        <form class="login100-form validate-form flex-sb flex-w" action="{{ route('admin.speaker.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <span class="login100-form-title p-b-30">
                Add Speaker
            </span>

            @error('name')
                <div class="text-danger">* {{ $message }}</div>
            @enderror
            <div class="wrap-input100 m-b-30">
                <input class="input100" type="text" name="name" placeholder="Speaker Name" value="{{ old('name') }}">
                <span class="focus-input100"></span>
            </div>

            @error('description')
                <div class="text-danger">* {{ $message }}</div>
            @enderror
            <div class="wrap-input100 m-b-30">
                <input class="input100" type="text" name="description" placeholder="Speaker Description" value="{{ old('description') }}">
                <span class="focus-input100"></span>
            </div>

            @error('image')
                <div class="text-danger">* {{ $message }}</div>
            @enderror
            <div class="wrap-input100 m-b-30">
                <div class="input100 m-t-10" style="color:black">Speaker Image</div>
                <input class="input100 m-t-10" type="file" name="image" required>
                <span class=" focus-input100"></span>
            </div>

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn" name="submit">
                    Add New Speaker
                </button>
            </div>
        </form>
    </div>
    </div>
    </x-slot>
</x-admin-layout>
<x-admin-layout>

    <x-slot name='title'>Admin - Edit Speaker</x-slot>

    <x-slot name='main'>
    <div class="container m-t-20">
    <div class="wrap-login100 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 25%">
        <form class="login100-form validate-form flex-sb flex-w" action="{{ route('admin.speaker.update',  $speaker->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <span class="login100-form-title p-b-30">
                Edit Speaker
            </span>

            @error('name')
                <div class="text-danger">* {{ $message }}</div>
            @enderror
            <div class="wrap-input100 m-b-30">
                <input class="input100" type="text" name="name" placeholder="Speaker Name" value="{{ $speaker->speaker_name }}">
                <span class="focus-input100"></span>
            </div>

            @error('description')
                <div class="text-danger">* {{ $message }}</div>
            @enderror
            <div class="wrap-input100 m-b-30">
                <input class="input100" type="text" name="description" placeholder="Speaker Description" value="{{ $speaker->speaker_description }}">
                <span class="focus-input100"></span>
            </div>

            @error('image')
                <div class="text-danger">* {{ $message }}</div>
            @enderror
            <div class="wrap-input100 m-b-30">
                <div class="input100 m-t-10" style="color:black">Speaker Image</div>
                <input class="input100 m-t-10" type="file" name="image">
                <span class=" focus-input100"></span>
            </div>

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn" name="submit">
                    Edit Speaker
                </button>
            </div>
        </form>
    </div>
    </div>
    </x-slot>
</x-admin-layout>
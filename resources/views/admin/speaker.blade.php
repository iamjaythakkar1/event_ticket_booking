<x-admin-layout>

    <x-slot name='title'>Admin - Speakers</x-slot>

    <x-slot name='main'>
    <main class="dash-content">
        <div class="container-fluid">
            <h1 class="dash-title">Speakers Created By Admin</h1>
            <p><a href="{{ url('admin/speaker/create') }}" class="btn btn-success"> + Add New Speaker</a></p><br />

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="" style="background: white; border:1px solid #d3d3d3">
                <div class="card-body ">
                    <table class="table table-hover table-in-card" >
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Show admin created speakers --}}
                            @foreach($speakers as $speaker)
                                <tr>
                                    <th scope="row">{{ $speaker->id }}</th>
                                    <td>{{ $speaker->speaker_name }}</td>
                                    {{-- Check For Image - Stored in Admin or Organiser Folder  --}}
                                        @if (file_exists('storage/admin/speaker/' . $speaker->speaker_image)) 
                                            <td><img src="{{ asset('storage/admin/speaker/'.$speaker->speaker_image) }}" width="100" height="100" /></td>
                                        @else 
                                            <td><img src="{{ asset('storage/organiser/speaker/'.$speaker->speaker_image) }}" width="100" height="100" /></td>
                                        @endif
                    
                                    <td>{{ $speaker->speaker_description }}</td>
                                    <td>

                                        <a href="{{ route('admin.speaker.edit', $speaker->id) }}" name='update' class='form-control btn btn-success'>Update</a><br /><br />

                                        <form action="{{ route('admin.speaker.destroy', $speaker->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type='submit' name='delete' class='form-control btn btn-danger' onclick="return confirm('Are you sure? You want to delete?')">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                           @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
    </main>

    <main class="dash-content">
        <div class="container-fluid">
            <h1 class="dash-title">All Speakers</h1>
            <div class="" style="background: white; border:1px solid #d3d3d3">
                <div class="card-body ">
                    <table class="table table-hover table-in-card" >
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Organiser Email</th>
                            </tr>
                        </thead>
                        <tbody>

                           {{-- Show organiser created speakers --}}
                           @foreach($orgspeaker as $speaker)
                                <tr>
                                <th scope="row">{{ $speaker->id }}</th>
                                    <td>{{ $speaker->speaker_name }}</td>
                                    {{-- Check For Image - Stored in Admin or Organiser Folder  --}}
                                    @if (file_exists('storage/admin/speaker/' . $speaker->speaker_image)) 
                                       <td><img src="{{ asset('storage/admin/speaker/'.$speaker->speaker_image) }}" width="100" height="100" /></td>
                                    @else 
                                       <td><img src="{{ asset('storage/organiser/speaker/'.$speaker->speaker_image) }}" width="100" height="100" /></td>
                                    @endif
               
                                    <td>{{ $speaker->speaker_description }}</td>

                                    {{-- Retrieve Organiser Email From Database --}}
                                    @php
                                    $organiser = App\Models\Organiser::where('id', $speaker->speakerable_id)->first();
                                    @endphp

                                    <td>{{ $organiser->organiser_email }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
    </main>
</x-slot>
</x-admin-layout>
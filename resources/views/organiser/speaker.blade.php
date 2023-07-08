<x-organiser-layout>

    <x-slot name='title'>Organiser - Speakers</x-slot>

    <x-slot name='main'>
    <main class="dash-content">
        <div class="container-fluid">
            <h1 class="dash-title">Speakers</h1>
            <p><a href="{{ url('organiser/speaker/create') }}" class="btn btn-success"> + Add New Speaker</a></p><br />

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
                            @foreach($data as $speaker)
                                <tr>
                                    <th scope="row">{{ $speaker->id }}</th>
                                    <td>{{ $speaker->speaker_name }}</td>
                                    <td><img src="{{ asset('storage/organiser/speaker/'.$speaker->speaker_image) }}" width="100" height="100" /></td>
                                    <td>{{ $speaker->speaker_description }}</td>
                                    <td>

                                        <a href="{{ route('organiser.speaker.edit', $speaker->id) }}" name='update' class='form-control btn btn-success'>Update</a><br /><br />

                                        <form action="{{ route('organiser.speaker.destroy', $speaker->id) }}" method="post">
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
</x-slot>
</x-organiser-layout>
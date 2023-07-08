<x-admin-layout>

    <x-slot name='title'>Admin - Organisers</x-slot>

    <x-slot name='main'>
    <main class="dash-content">
        <div class="container-fluid">
            <h1 class="dash-title">Organisers</h1>
            <p><a href="{{ url('admin/organiser/create') }}" class="btn btn-success"> + Add New Organiser</a></p><br />

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card spur-card">
                <div class="card-body ">
                    <table class="table table-hover table-in-card">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Description</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($organisers as $org)
                                <tr>
                                    <th scope="row">{{$org->id}}</th>
                                    <td>{{ $org->organiser_name }}</td>
                                    <td>{{ $org->organiser_email }}</td>
                                    <td>{{ $org->organiser_description }}</td>
                                    <td>{{ $org->phoneno }}</td>
                                    <td>{{ $org->created_at }}</td>
                                    <td>{{ $org->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                       @if($org->status == 0)
                                            <form action="{{ url()->current(). '/'. $org->id }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type='submit' name='allow' class='form-control btn btn-success' onclick="return confirm('Are you sure? You want to allow?')">Allow</button>
                                            </form>
                                        @else
                                            <form action="{{ url()->current().'/'.$org->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type='submit' name='reject' class='form-control btn btn-danger' onclick="return confirm('Are you sure? You want to reject?')">Reject</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-l-30 p-b-10">
                    {{ $organisers->links() }}
                </div>
                    <br />
                
            </div>
    </main>
</x-slot>
</x-admin-layout>
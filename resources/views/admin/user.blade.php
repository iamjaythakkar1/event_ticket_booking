<x-admin-layout>

    <x-slot name='title'>Admin - Users</x-slot>

    <x-slot name='main'>
    <main class="dash-content">
        <div class="container-fluid">
            <h1 class="dash-title">Users</h1>
            <p><a href="{{ url('admin/user/create') }}" class="btn btn-success"> + Add New User</a></p><br />

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
                                <th scope="col">Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->user_name }}</td>
                                    <td>{{ $user->user_email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <form action="{{ url()->current().'/'.$user->id }}" method="post">
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
                <div class="p-l-30 p-b-10">
                {{ $users->links() }}
            </div>
                <br />
            </div>
    </main>

</x-slot>
</x-admin-layout>
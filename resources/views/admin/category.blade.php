<x-admin-layout>

    <x-slot name='title'>Admin - Category</x-slot>

    <x-slot name='main'>
    <main class="dash-content">
        <div class="container-fluid">
            <h1 class="dash-title">Categories</h1>
            <p><a href="{{ url('admin/category/create') }}" class="btn btn-success"> + Add New Category</a></p><br />

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
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td><img src="{{ asset('storage/admin/category/'.$category->category_image) }}" width="100" height="100" alt="Category Image" /></td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', $category->id) }}" name='update' class='form-control btn btn-success'>Update</a><br /><br />
                                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
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
</x-admin-layout>
<x-admin-layout>

    <x-slot name='title'>Admin - Events</x-slot>

    <x-slot name='main'>
    <main class="dash-content">
        <div class="container-fluid">
            <h1 class="dash-title">Events Created By Admin</h1>
            <p><a href="{{ url('admin/event/create') }}" class="btn btn-success"> + Add New Event</a></p><br />

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="" style="background: white; border:1px solid #d3d3d3">
                <div class="card-body ">
                    <table class="table table-hover table-in-card" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Available Ticket</th>
                                <th scope="col">Total Ticket</th>
                                <th scope="col">Price</th>
                                <th scope="col">Speaker Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Show admin created events --}}
                            @foreach($events as $event)
                                <tr>
                                    <th scope="row">{{ $event->id }}</th>
                                    <td>{{ $event->event_name }}</td>
                                        {{-- Check For Image - Stored in Admin or Organiser Folder  --}}
                                        @if (file_exists('storage/admin/event/' . $event->event_image)) 
                                            <td><img src="{{ asset('storage/admin/event/'.$event->event_image) }}" width="100" height="100" /></td>
                                        @else 
                                            <td><img src="{{ asset('storage/organiser/event/'.$event->event_image) }}" width="100" height="100" /></td>
                                        @endif
                                    <td>{{ $event->event_description }}</td>
                                    <td>{{ $event->category_name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($event->event_date)) }}</td>
                                    <td>{{ date('H:i A', strtotime($event->start_time)) }}</td>
                                    <td>{{ date('H:i A', strtotime($event->end_time)) }}</td>
                                    <td>{{ $event->available_ticket }}</td>
                                    <td>{{ $event->total_ticket }}</td>
                                    <td>{{ $event->event_price }}</td>
                                    <td>
                                        @foreach($event->speakers as $speaker)
                                            * {{ $speaker->speaker_name }} <br /><br />
                                        @endforeach
                                    </td>
                                    <td>{{ $event->event_address }}</td>
                                    <td>{{ $event->event_city .', '. $event->event_state . '.'}}</td>
                                    <td>{{ $event->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        @if($event->status == 1)
                                        <a href="{{ route('admin.event.edit', $event->id) }}" name='update' class='form-control btn btn-success'>Update</a><br /><br />

                                        <form action="{{ route('admin.event.destroy', $event->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type='submit' name='delete' class='form-control btn btn-danger' onclick="return confirm('Are you sure? You want to delete?')">Delete</button>
                                        </form>
                                        @endif
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
            <h1 class="dash-title">All Events</h1>
            <div class="" style="background: white; border:1px solid #d3d3d3">
                <div class="card-body ">
                    <table class="table table-hover table-in-card" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Organiser Email</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Available Ticket</th>
                                <th scope="col">Total Ticket</th>
                                <th scope="col">Price</th>
                                <th scope="col">Speaker Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Show organiser created events --}}
                            @foreach($orgevent as $event)
                            <tr>
                                <th scope="row">{{ $event->id }}</th>
                                <td>{{ $event->event_name }}</td>
                                    {{-- Check For Image - Stored in Admin or Organiser Folder  --}}
                                    @if (file_exists('storage/admin/event/' . $event->event_image)) 
                                        <td><img src="{{ asset('storage/admin/event/'.$event->event_image) }}" width="100" height="100" /></td>
                                    @else 
                                        <td><img src="{{ asset('storage/organiser/event/'.$event->event_image) }}" width="100" height="100" /></td>
                                    @endif
                                <td>{{ $event->event_description }}</td>

                                {{-- Retrieve Organiser Email From Database --}}
                                @php
                                $organiser = App\Models\Organiser::where('id', $event->creatable_id)->first();
                                @endphp

                                <td>{{ $organiser->organiser_email }}</td>
                                <td>{{ $event->category_name }}</td>
                                <td>{{ date('d-m-Y', strtotime($event->event_date)) }}</td>
                                <td>{{ date('H:i A', strtotime($event->start_time)) }}</td>
                                <td>{{ date('H:i A', strtotime($event->end_time)) }}</td>
                                <td>{{ $event->available_ticket }}</td>
                                <td>{{ $event->total_ticket }}</td>
                                <td>{{ $event->event_price }}</td>
                                <td>
                                    @foreach($event->speakers as $speaker)
                                        * {{ $speaker->speaker_name }} <br /><br />
                                    @endforeach
                                </td>
                                <td>{{ $event->event_address }}</td>
                                <td>{{ $event->event_city .', '. $event->event_state . '.'}}</td>
                                <td>{{ $event->status == 1 ? 'Active' : 'Inactive' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
</x-slot>
</x-admin-layout>
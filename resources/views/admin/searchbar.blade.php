<x-admin-layout>

    <x-slot name='title'>Admin - Category</x-slot>

    <x-slot name='main'>

        {{-- User Table Data --}}
        <main class="dash-content">
            <div class="container-fluid">
                <h1 class="dash-title">Users</h1>
                <div style="display: flex; justify-content:left"><a href="{{ url('admin/user/create') }}" class="btn btn-success"> + Add New User</a></div><br />
    
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                
                <div class="" style="background: white; border:1px solid #d3d3d3">
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
                                @if(count($users) > 0)
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
                                @else
                                <td colspan="5">No Users Found</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        {{-- Organiser Table Data --}}
        <main class="dash-content">
            <div class="container-fluid">
                <h1 class="dash-title">Organisers</h1>
                <p><a href="{{ url('admin/organiser/create') }}" class="btn btn-success"> + Add New Organiser</a></p><br />
    
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
    
                <div class="" style="background: white; border:1px solid #d3d3d3">
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
                                @if(count($organisers) > 0)
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
                                @else
                                <td colspan="8">No Organisers Found</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </main>

        {{-- Event Table Data Created By Admin --}}
        <main class="dash-content">
            <div class="container-fluid">
                <h1 class="dash-title">Events Created By Admin</h1>
                <p><a href="{{ url('admin/event/create') }}" class="btn btn-success"> + Add New Event</a></p><br />
    
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
                                    <th scope="col">Category</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Available Ticket</th>
                                    <th scope="col">Total Ticket</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Speaker Id</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($events) > 0)
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
                                @else
                                    <td colspan="16">No Events Found</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </main>
    
        {{-- Event Table Data Created By Organiser --}}
        <main class="dash-content">
            <div class="container-fluid">
                <h1 class="dash-title">All Events</h1>
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
                                    <th scope="col">Category</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Available Ticket</th>
                                    <th scope="col">Total Ticket</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Speaker Id</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($orgevent) > 0)
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
                            @else
                                <td colspan="16">No Events Found</td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </main>

        {{-- Speaker Table Data Created By Admin --}}
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
                                @if(count($speakers) > 0)
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
                                @else
                                    <td colspan="5">No Speakers Found</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </main>
    
        {{-- Speaker Table Data Created By Oeganiser --}}
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
                                @if(count($orgspeaker) > 0)
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
                                @else
                                    <td colspan="5">No Speakers Found</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </main>

        {{-- Category Table Data --}}
        <main class="dash-content">
            <div class="container-fluid">
                <h1 class="dash-title">Categories</h1>
                <p><a href="{{ url('admin/category/create') }}" class="btn btn-success"> + Add New Category</a></p><br />
    
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
    
                <div class="" style="background: white; border:1px solid #d3d3d3">
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
                                @if(count($categories) > 0)
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
                                @else
                                    <td colspan="4">No Categories Found</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>

            {{-- Payment Table Data --}}
            <main class="dash-content">
                <div class="container-fluid">
                    <h1 class="dash-title">Payments</h1>
                    <!-- <div class="card spur-card"> -->
                    <div class="" style="background: white; border:1px solid #d3d3d3">
                        <div class="card-body ">
                            <table class="table table-hover table-in-card">
                                <thead>
                                    <tr>
                                        <th scope="col">Payment Id</th>
                                        <th scope="col">Payment Number</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">User Email</th>
                                        <th scope="col">Event Name</th>
                                        <th scope="col">Event Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Date / Time</th>
                                        <th scope="col">status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($payments) > 0)
                                    {{-- Foreach Loop --}}
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <th scope="row">{{ $payment->id }}</th>
                                            <td>{{ $payment->paymentno }}</td>
                                            <td>{{ $payment->txn_id }}</td>
                                            <td>{{ $payment->user->user_email }}</td>
                                            <td>{{ $payment->event->event_name }}</td>
                                            <td>{{ $payment->event_price }}</td>
                                            <td>{{ $payment->quantity }}</td>
                                            <td>{{ $payment->payment_amount }}</td>
                                            <td>{{ $payment->payment_method }}</td>
                                            <td>{{ $payment->created_at }}</td>
                                            <td>{{ $payment->status }}</td>
                                        </tr>
                                        @endforeach
                                   {{-- End Foreach Loop --}}
                                    @else
                                        <td colspan="11">No Payments Found</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

    </x-slot>
</x-admin-layout>
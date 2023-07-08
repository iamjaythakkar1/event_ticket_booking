<x-organiser-layout>

    <x-slot name='title'>Organiser - Add Event</x-slot>

    <x-slot name='main'>
    <div class="container m-t-20">
        <div class="wrap-login101 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 15px">
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('organiser.event.update',  $event->id) }}" method="post" enctype="multipart/form-data">
                @csrf   
                @method('PUT')
                <span class="login100-form-title p-b-30">
                    Edit Event
                </span>

                <div class="wrap-input101 m-b-30" >
                    @error('name')
                        <p class="p-l-15 p-t-10 text-danger">* {{ $message }}</p>
                    @enderror
                    <div class="input101 m-t-10" style="color:black">Event Name</div>
                    <input class="input101" type="text" name="name" placeholder="Enter Here" value="{{ $event->event_name }}" >
                    <span class="focus-input101"></span>
                </div>

               
                <div class="wrap-input101 m-b-30"  default>
                @error('category')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event Category</div>
                    <select name="category" id="category" class="input101" >
                        @foreach($category as $ct)
                            @if($ct == $event->category)
                                <option value="{{ $ct->category_name }}" selected>{{ $ct->category_name }}</option>
                            @endif
                                <option value="{{ $ct->category_name }}">{{ $ct->category_name }}</option>
                        @endforeach
                    </select>
                    <span class="focus-input101"></span>
                </div>

               
                <div class="wrap-input100 m-b-30 p-t-10" >
                @error('description')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event Description</div>
                    <textarea class="input100" type="text" rows="25" cols="50" name="description" placeholder="Tell Us Something More About Event" >{{ $event->event_description }}</textarea>
                    <span class="focus-input100"></span>
                </div>

               
                <div class="wrap-input101 m-b-30" >
                @error('date')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event Date</div>
                    <input class="input101" type="date" name="date" id='eventDate' placeholder="dd-mm-yyyy" value="{{ date('Y-m-d', strtotime($event->event_date)) }}">
                    <span class="focus-input101"></span>
                </div>

               
                <div class="wrap-input101 m-b-30">
                @error('image')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event Image</div>
                    <input class="input101 m-t-10" type="file" name="image" placeholder="Event Image" >
                    <span class=" focus-input101"></span>
                </div>

               
                <div class="wrap-input101 m-b-30" >
                @error('starttime')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event Start Time</div>
                    <input class="input101 uk-input" type="time" name="starttime" placeholder="hh:mm am/pm"  value="{{ date('H:i:s', strtotime($event->start_time)) }}">
                    <span class="focus-input101"></span>
                </div>

               
                <div class="wrap-input101 m-b-30" >
                @error('endtime')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event End Time</div>
                    <input class="input101" type="time" name="endtime" placeholder="hh:mm am/pm"  value="{{ date('H:i:s', strtotime($event->end_time)) }}">
                    <span class="focus-input101"></span>
                </div>

               
                <div class="wrap-input101 m-b-30" >
                @error('totalticket')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event Total Ticket To Sell</div>
                    <input class="input101" type="number" name="totalticket" placeholder="Enter Here"  value="{{ $event->total_ticket }}">
                    <span class="focus-input101"></span>
                </div>

               
                <div class="wrap-input101 m-b-30" >
                @error('price')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event Price Per Ticket</div>
                    <input class="input101" type="number" name="price" placeholder="Enter Here"  value="{{ $event->event_price }}">
                    <span class="focus-input101"></span>
                </div>

               
                <div class="wrap-input101 m-b-30" >
                @error('address')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event Address</div>
                    <input class="input101" type="text" name="address" placeholder="Enter Here"  value="{{ $event->event_address }}">
                    <span class="focus-input101"></span>
                </div>

               
                <div class="wrap-input101 m-b-30" >
                @error('pincode')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event Pin Code</div>
                    <input class="input101" type="text" name="pincode" placeholder="Enter Here"  value="{{ $event->pincode }}">
                    <span class="focus-input101"></span>
                </div>

               
                <div class="wrap-input101 m-b-30" >
                @error('city')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event City</div>
                        <input class="input101" type="text" name="city" placeholder="Enter Here"  value="{{ $event->event_city }}">
                    <span class="focus-input101"></span>
                </div>

               
                <div class="wrap-input101 m-b-30" >
                @error('state')
                    <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                @enderror
                    <div class="input101 m-t-10" style="color:black">Event State</div>
                    <input class="input101" type="text" name="state" placeholder="Enter Here"  value="{{ $event->event_state }}">
                    <span class="focus-input101"></span>
                </div>

               
                <div class="wrap-input100 m-b-30">
                    @error('speaker')
                        <div class="p-l-15 p-t-10 text-danger">* {{ $message }}</div>
                    @enderror
                        <div class="input100 m-t-10" style="color:black">Event Speaker
                            <a href="{{ route('organiser.speaker.create') }}" class="btn"> + Add New Speaker</a>
                        </div>
                            @foreach($speaker as $sp)
                                @foreach($event->speakers as $esp)
                                    @if($sp->id == $esp->id)
                                        <div class="form-check input100 checkbox-lg m-l-25 m-t-5">
                                            <input class="form-check-input" type="checkbox" value="{{ $esp->id }}" id="flexCheckDefault" name="speaker[]" style="scale:1.5;" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $esp->speaker_name.' ( '. $esp->speaker_description. ' ) '}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                            
                            {{-- Diiferent speaker which are not selected earlier --}}
                            @php
                                $remainingSpeakers = $speaker->diff($event->speakers);
                            @endphp
                            @foreach ($remainingSpeakers as $remainingSpeaker)
                            <div class="form-check input100 checkbox-lg m-l-25 m-t-5">
                                <input class="form-check-input" type="checkbox" value="{{ $remainingSpeaker->id }}" id="flexCheckDefault" name="speaker[]" style="scale:1.5;" >
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $remainingSpeaker->speaker_name.' ( '. $remainingSpeaker->speaker_description. ' ) '}}
                                </label>
                            </div>
                            @endforeach
                    </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" name="submit">
                        Edit Event
                    </button>
                </div>
            </form>
        </div>
    </div>
    </x-slot>
</x-organiser-layout>
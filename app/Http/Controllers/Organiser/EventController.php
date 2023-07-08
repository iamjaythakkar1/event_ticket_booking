<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Organiser's Event Details
        $authenticatedUser = Auth::guard('organiser')->user();
        $event = Event::whereHas('creatable', function ($query) use ($authenticatedUser) {
            $query->where('creatable_id', $authenticatedUser->id)
                ->where('creatable_type', get_class($authenticatedUser));
        })->orderby('status', 'DESC')->get();
        return view('organiser.event')->with(['data' => $event]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create New Event by Organiser
        $authenticatedUser = Auth::guard('organiser')->user();
        $speaker = Speaker::whereHas('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->get();

        $category = Category::all();
        return view('organiser.add.event', ['speaker' => $speaker, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Data
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'description' => 'required|string|max:255',
            'date' => 'required|date|after:10 day|before:6 months',
            'starttime' => 'required',
            'endtime' => 'required',
            'price' => 'required',
            'totalticket' => 'required',
            'address' => 'required|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pincode' => 'required|numeric',
            'category' => 'required|max:255',
            'speaker' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload Image
        $file = $request->file('image');
        $filename = $file->hashName();

        // Store image with hash name to storage directory
        $image_path = $request->file('image')->storeAs('organiser/event', $filename, 'public');

        $organiser = Auth::guard('organiser')->user();

        // One to Many Polymorphic Relation 
        $event = $organiser->events()->create([
            'event_name' => $request->name,
            'event_description' => $request->description,
            'event_image' => $filename,
            'category_name' => $request->category,
            'start_time' => $request->starttime,
            'end_time' => $request->endtime,
            'event_date' => $request->date,
            'total_ticket' => $request->totalticket,
            'available_ticket' => $request->totalticket,
            'event_price' => $request->price,
            'event_address' => $request->address,
            'event_city' => $request->city,
            'event_state' => $request->state,
            'pincode' => $request->pincode,
            'status' => 1,
        ]);

        // Add Relation in Pivot Table event_speaker
        $event->speakers()->attach($request->speaker);

        return redirect('organiser/event')->with([
            'message' => 'Event Created!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Check if event is created by authenticated user or not
        $authenticatedUser = Auth::guard('organiser')->user();
        $event = Event::whereHas('creatable', function ($query) use ($authenticatedUser) {
            $query->where('creatable_id', $authenticatedUser->id)
                ->where('creatable_type', get_class($authenticatedUser));
        })->where('status', 1)->orderby('status', 'DESC')->findOrFail($id);

        $category = Category::all();

        $authenticatedUser = Auth::guard('organiser')->user();
        $speaker = Speaker::whereHas('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->get();

        return view('organiser.edit.event')->with(['event' => $event, 'category' => $category, 'speaker' => $speaker]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Check if event is created by authenticated user or not
        $authenticatedUser = Auth::guard('organiser')->user();
        $event = Event::whereHas('creatable', function ($query) use ($authenticatedUser) {
            $query->where('creatable_id', $authenticatedUser->id)
                ->where('creatable_type', get_class($authenticatedUser));
        })->where('status', 1)->findOrFail($id);

        // Validate Data
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'description' => 'required|string|max:255',
            'date' => 'required|date|after:10 day|before:6 months',
            'starttime' => 'required',
            'endtime' => 'required',
            'price' => 'required',
            'totalticket' => 'required',
            'address' => 'required|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pincode' => 'required|numeric',
            'category' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update event details
        $event->event_name = $request->name;
        $event->event_description = $request->description;
        $event->category_name = $request->category;
        $event->start_time = $request->starttime;
        $event->end_time = $request->endtime;
        $event->event_date = $request->date;
        $event->total_ticket = $request->totalticket;
        $event->available_ticket = $request->totalticket;
        $event->event_price = $request->price;
        $event->event_address = $request->address;
        $event->event_city = $request->city;
        $event->event_state = $request->state;
        $event->pincode = $request->pincode;

        if ($request->hasFile('image')) {

            // Delete the event image
            if (file_exists('storage/organiser/event/' . $event->event_image)) {
                unlink('storage/organiser/event/' . $event->event_image);
            } elseif (file_exists('storage/admin/event/' . $event->event_image)) {
                unlink('storage/admin/event/' . $event->event_image);
            }

            // Upload Image
            $file = $request->file('image');
            $filename = $file->hashName();

            // Store image with hash name to storage directory
            $image_path = $request->file('image')->storeAs('organiser/event', $filename, 'public');

            $event->event_image = $filename;
        }

        $event->save();

        // Update speakers relation in Pivot Table event_speaker
        $event->speakers()->sync($request->speaker);

        return redirect('organiser/event')->with(['message' => 'Event Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check if event is created by authenticated user or not
        $authenticatedUser = Auth::guard('organiser')->user();
        $event = Event::whereHas('creatable', function ($query) use ($authenticatedUser) {
            $query->where('creatable_id', $authenticatedUser->id)
                ->where('creatable_type', get_class($authenticatedUser));
        })->where('status', 1)->findOrFail($id);

        $event->status = 0;

        $event->save();
        // Remove speakers relation from Pivot Table event_speaker
        // $event->speakers()->detach();
        // $event->delete();

        return redirect('organiser/event')->with(['message' => 'Event Deleted!']);
    }
}

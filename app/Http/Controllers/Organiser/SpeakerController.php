<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Organiser's Speaker Details
        $authenticatedUser = Auth::guard('organiser')->user();
        $speaker = Speaker::whereHas('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->get();
        return view('organiser.speaker')->with(['data' => $speaker]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create New Speaker by Organiser
        return view('organiser.add.speaker');
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
        $speaker = $request->validate([
            'name' => 'required|min:3|max:25',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('image');
        $filename = $file->hashName();

        // Store image with hash name to storage directory
        $image_path = $request->file('image')->storeAs('organiser/speaker', $filename, 'public');

        $organiser = Auth::guard('organiser')->user();

        // One to Many Polymorphic Relation 
        $organiser->speakers()->create([
            'speaker_name' => $request->name,
            'speaker_description' => $request->description,
            'speaker_image' => $filename,
        ]);

        return redirect('organiser/speaker')->with(['message' => 'Speaker Created!']);
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
        // Check if speaker is created by authenticated user or not
        $authenticatedUser = Auth::guard('organiser')->user();
        $speaker = Speaker::whereHas('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->findOrFail($id);
        return view('organiser.edit.speaker')->with(['speaker' => $speaker]);
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
        // Validate Data
        $speaker = $request->validate([
            'name' => 'required|min:3|max:25',
            'description' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Check if speaker is created by authenticated user or not
        $authenticatedUser = Auth::guard('organiser')->user();
        $speaker = Speaker::whereHas('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->findOrFail($id);

        if ($request->hasFile('image')) {

            // Delete the first image
            if (file_exists('storage/organiser/speaker/' . $speaker->speaker_image)) {
                unlink('storage/organiser/speaker/' . $speaker->speaker_image);
            } elseif (file_exists('storage/admin/speaker/' . $speaker->speaker_image)) {
                unlink('storage/admin/speaker/' . $speaker->speaker_image);
            }

            // Update the speaker image
            $file = $request->file('image');
            $filename = $file->hashName();
            $image_path = $request->file('image')->storeAs('organiser/speaker', $filename, 'public');
            $speaker->speaker_image = $filename;
        }

        // Update other speaker details
        $speaker->speaker_name = $request->name;
        $speaker->speaker_description = $request->description;
        $speaker->save();

        return redirect('organiser/speaker')->with(['message' => 'Speaker Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check if speaker is created by authenticated user or not
        $authenticatedUser = Auth::guard('organiser')->user();
        $speaker = Speaker::whereHas('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->findOrFail($id);

        // Delete the first image
        if (file_exists('storage/organiser/speaker/' . $speaker->speaker_image)) {
            unlink('storage/organiser/speaker/' . $speaker->speaker_image);
        } elseif (file_exists('storage/admin/speaker/' . $speaker->speaker_image)) {
            unlink('storage/admin/speaker/' . $speaker->speaker_image);
        }

        // Delete the speaker record
        $speaker->delete();

        return redirect('organiser/speaker')->with(['message' => 'Speaker Deleted!']);
    }
}

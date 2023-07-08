<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Speaker;
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
        // Admin's Speaker Details
        // Check if speaker is created by authenticated user or not
        $authenticatedUser = Auth::guard('admin')->user();
        $speaker = Speaker::whereHas('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->orderBy('id', 'ASC')->get();

        $orgspeaker = Speaker::whereDoesntHave('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->orderBy('id', 'ASC')->get();

        return view('admin.speaker')->with(['speakers' => $speaker, 'orgspeaker' => $orgspeaker]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create New Speaker by Admin
        return view('admin.add.speaker');
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
        $image_path = $request->file('image')->storeAs('admin/speaker', $filename, 'public');

        $admin = Auth::guard('admin')->user();

        // One to Many Polymorphic Relation 
        $admin->speakers()->create([
            'speaker_name' => $request->name,
            'speaker_description' => $request->description,
            'speaker_image' => $filename,
        ]);

        return redirect('admin/speaker')->with(['message' => 'Speaker Created!']);
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
        $authenticatedUser = Auth::guard('admin')->user();
        $speaker = Speaker::whereHas('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->findOrFail($id);

        return view('admin.edit.speaker')->with(['speaker' => $speaker]);
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
        $authenticatedUser = Auth::guard('admin')->user();
        $speaker = Speaker::whereHas('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the speaker image
            if (file_exists('storage/admin/speaker/' . $speaker->speaker_image)) {
                unlink('storage/admin/speaker/' . $speaker->speaker_image);
            } elseif (file_exists('storage/organiser/speaker/' . $speaker->speaker_image)) {
                unlink('storage/organiser/speaker/' . $speaker->speaker_image);
            }

            // Update the speaker image
            $file = $request->file('image');
            $filename = $file->hashName();
            $image_path = $request->file('image')->storeAs('admin/speaker', $filename, 'public');
            $speaker->speaker_image = $filename;
        }

        // Update other speaker details
        $speaker->speaker_name = $request->name;
        $speaker->speaker_description = $request->description;
        $speaker->save();

        return redirect('admin/speaker')->with(['message' => 'Speaker Updated!']);
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
        $authenticatedUser = Auth::guard('admin')->user();
        $speaker = Speaker::whereHas('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->findOrFail($id);

        // Delete the speaker image
        if (file_exists('storage/admin/speaker/' . $speaker->speaker_image)) {
            unlink('storage/admin/speaker/' . $speaker->speaker_image);
        } elseif (file_exists('storage/organiser/speaker/' . $speaker->speaker_image)) {
            unlink('storage/organiser/speaker/' . $speaker->speaker_image);
        }

        // Delete the speaker record
        $speaker->delete();

        return redirect('admin/speaker')->with(['message' => 'Speaker Deleted!']);
    }
}

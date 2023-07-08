<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\OrganiserAllowed;
use App\Jobs\OrganiserCreated;
use App\Jobs\OrganiserRejected;
use App\Models\Organiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrganiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Admin's organiser Details
        $organiser = Organiser::orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('admin.organiser')->with(['organisers' => $organiser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create New Organiser by Admin
        return view('admin.add.organiser');
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
        $validated = $request->validate(
            [
                'organiser_name' => 'required|string|max:255',
                'organiser_email' => 'required|string|email|max:255|unique:organisers',
                'phoneno' => 'required|numeric|digits:10',
                'organiser_description' => 'required|string|max:255',
            ],
            [
                'phoneno.required' => 'Phone number is required.',
                'phoneno.numeric' => 'Phone number is must be numeric.',
                'phoneno.digits' => 'Phone number must contain 10 digits.',
            ]
        );

        // Generate Random Password For Organiser
        $pass = Str::random(8);
        $hashpass = Hash::make($pass);

        // Store Data
        $organiser = Organiser::create([
            'organiser_name' => $request->organiser_name,
            'organiser_email' => $request->organiser_email,
            'phoneno' => $request->phoneno,
            'organiser_description' => $request->organiser_description,
            'password' => $hashpass,
            'status' => 1,
        ]);

        $maildata = ['name' => $request->organiser_name, 'email' => $request->organiser_email, 'password' => $pass];

        // Mail to Organiser to Send Password Through Email
        // Mail::to($request->organiser_email)->send(new OrgCreatedByAdmin($maildata));

        // Run a queue job to send an email to organsier with password
        OrganiserCreated::dispatch($maildata);

        return redirect('admin/organiser')->with(['message' => 'Organiser Created!']);
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
        //
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
        $organiser = Organiser::find($id);

        // Generate Random Password For Organiser
        $pass = Str::random(8);
        $hashpass = Hash::make($pass);

        // Update Password
        Organiser::where('organiser_email', $organiser->organiser_email)->update([
            'password' => $hashpass
        ]);

        // Update Status
        Organiser::where('organiser_email', $organiser->organiser_email)->update([
            'status' => 1
        ]);

        $maildata = ['name' => $organiser->organiser_name, 'email' => $organiser->organiser_email, 'password' => $pass];

        // Mail to Organiser to Send Password Through Email
        // Mail::to($organiser->organiser_email)->send(new OrgAllowByAdmin($maildata));

        // Run a queue job to send an email to organsier with password
        OrganiserAllowed::dispatch($maildata);

        return redirect()->back()->with(['message' => 'Organiser Allowed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organiser = Organiser::find($id);

        // Mail to Organiser to Notify Through Email
        // Mail::to($organiser->organiser_email)->send(new OrgRejectByAdmin($organiser));

        // Run a queue job to send an email to organiser
        OrganiserRejected::dispatch($organiser);

        Organiser::where('id', $id)->update(['status' => 0]);

        return redirect()->back()->with(['message' => 'Organiser Rejected!']);
    }
}

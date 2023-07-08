<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\UserReisterd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Admin's User Details
        $user = User::orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('admin.user')->with(['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create New User by Admin
        return view('admin.add.user');
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
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Make Hash Password to Store in DB
        $pass = $request->password;
        $hashpass = Hash::make($pass);

        // Store Data
        $user = User::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'password' => $hashpass,
        ]);

        $maildata = ['name' => $request->user_name, 'email' => $request->user_email, 'password' => $pass];

        // Mail to User to Send Password Through Email
        // Mail::to($request->user_email)->send(new UserCreatedByAdmin($maildata));

        // Run a queue job to send an email to user with password
        UserReisterd::dispatch($maildata);

        return redirect('admin/user')->with(['message' => 'User Created Successfully.']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete User by Admin
        User::where('id', $id)->first()->delete();
        return redirect()->back()->with(['message' => 'User Deleted!']);
    }
}

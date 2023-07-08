<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Organiser;
use App\Models\Speaker;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display admin dashboard with all data.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::count();
        $organiser = Organiser::count();
        $event = Event::count();
        $ticket = Ticket::count();
        $amount = Ticket::sum('payment_amount');
        $aevent = Event::where('status', 1)->count();
        $cevent = Event::where('status', 0)->count();
        $speaker = Speaker::count();
        $category = Category::count();
        return view('admin.dashboard', ['user' => $user, 'organiser' => $organiser, 'event' => $event, 'ticket' => $ticket, 'amount' => $amount, 'aevent' => $aevent, 'cevent' => $cevent, 'speaker' => $speaker, 'category' => $category]);
    }

    /**
     * Update admin profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request) // Update Admin Profile
    {
        // If Curerent Password Field Has Some Value Then Validate New Password And Update DB

        if ($request->current_password) {
            // Validate Data
            $request->validate(
                [
                    'name' => 'required|min:3|max:25',
                    'email' => 'required|email|max:255',
                    'current_password' => 'required|min:8|max:16',
                    'password' => 'required|min:8|max:16|confirmed',
                ],
            );

            // Update DB
            $admin = Auth::guard('admin')->user();

            // Check If The Current Password Matches The One Stored In The Database
            if (Hash::check($request->current_password, $admin->password)) {
                // Update The Admin's  Password
                $admin->admin_name = $request->name;
                $admin->admin_email = $request->email;
                $admin->password = Hash::make($request->password);
                $admin->save();

                return redirect()->back()->with('message', 'Profile Updated!');
            } else {
                return redirect()->back()->with('error', 'Current Password Is Invalid!');
            }
        } else {
            // Update DB When Current Password Is Empty
            $admin = Auth::guard('admin')->user();
            $admin->admin_name = $request->name;
            $admin->admin_email = $request->email;
            $admin->save();

            return redirect()->back()->with('message', 'Profile Updated!');
        }

        // Return Back With Error
        return redirect()->back()->with('error', 'Somethig Went Wrong!');
    }
}

<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Organiser;
use App\Models\Ticket;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganiserController extends Controller
{
    /**
     * Display organiser dashboard with all data.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrive authenticated organiser 
        $authenticatedUser = Auth::guard('organiser')->user();

        // Get the data from database for dashboard 
        $event = Event::whereHas('creatable', function ($query) use ($authenticatedUser) {
            $query->where('creatable_id', $authenticatedUser->id)
                ->where('creatable_type', get_class($authenticatedUser));
        })->count();
        $ticket = Ticket::count();
        $amount = Ticket::sum('payment_amount');
        $aevent = Event::where('status', 1)->whereHas('creatable', function ($query) use ($authenticatedUser) {
            $query->where('creatable_id', $authenticatedUser->id)
                ->where('creatable_type', get_class($authenticatedUser));
        })->count();
        $cevent = Event::where('status', 0)->whereHas('creatable', function ($query) use ($authenticatedUser) {
            $query->where('creatable_id', $authenticatedUser->id)
                ->where('creatable_type', get_class($authenticatedUser));
        })->count();

        return view('organiser.dashboard', ['event' => $event, 'ticket' => $ticket, 'amount' => $amount, 'aevent' => $aevent, 'cevent' => $cevent]);
    }

    /**
     * Organiser Register Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrganiser()
    {
        // Organiser register view
        return view('organiser.auth.register');
    }

    /**
     * Organiser store data in database.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Organiser register
        $request->validate(
            [
                'organiser_name' => ['required', 'string', 'max:255'],
                'organiser_email' => ['required', 'string', 'email', 'max:255', 'unique:' . Organiser::class],
                'organiser_description' => ['required', 'min:3', 'max:500'],
                'phoneno' => ['required', 'numeric', 'regex:/^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$/'],
            ],
            [
                'phoneno.regex' => 'Invalid Phone Format',
                'phoneno.numeric' => 'Phone Number must be numeric',
                'phoneno.required' => 'Phone Number is required',
            ]
        );

        // Store data in database
        $organiser = Organiser::create([
            'organiser_name' => $request->organiser_name,
            'organiser_email' => $request->organiser_email,
            'organiser_description' => $request->organiser_description,
            'phoneno' => $request->phoneno,
        ]);

        // Show message to organiser
        session::flash('org-status', 'Thanks! You will receive your password via Email.');

        return redirect()->route('organiser.login');
    }

    /**
     * Update organiser profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        // Validate the incoming request data
        $validate = $request->validate([
            'organiser_name' => 'required|string|max:255',
            'phoneno' => 'required|numeric|digits:10',
            'organiser_description' => 'required|string|max:255',
        ]);

        // Retrieve the authenticated user
        $organiser = Auth::guard('organiser')->user();

        // Update the organizer profile
        $organiser->organiser_name = $validate['name'];
        $organiser->phoneno = $validate['phoneno'];
        $organiser->organiser_description = $validate['description'];
        $organiser->save();

        return redirect()->back()->with('message', 'Profile Updated!');
    }

    public function payment()
    {
        // Retrieve Auhenticated Organiser Details
        $authenticatedUser = Auth::guard('organiser')->user();
        // Get all the payment details of organiser's created events
        $payments = Event::whereHas('creatable', function ($query) use ($authenticatedUser) {
            $query->where('creatable_id', $authenticatedUser->id)
                ->where('creatable_type', get_class($authenticatedUser));
        })->get();

        $allTickets = [];
        foreach ($payments as $payment) {
            foreach ($payment->tickets as $ticket) {

                $tickets = Ticket::where('id', $ticket->id)->orderBy('created_at', 'ASC')->get();

                // Append the retrieved tickets to the $allTickets array
                $allTickets = array_merge($allTickets, $tickets->all());

                // dump($allTickets);
            }
        }
        return view('organiser.payment')->with(['events' =>  $allTickets]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Organiser;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;

        $authenticatedUser = Auth::guard('admin')->user();

        // Find Data For Different Table
        $users = Self::users($search, $authenticatedUser);
        $organisers = Self::organisers($search, $authenticatedUser);
        $events = Self::events($search, $authenticatedUser);
        $orgevent = Self::orgEvents($search, $authenticatedUser);
        $speakers = Self::speaker($search, $authenticatedUser);
        $orgspeaker = Self::orgSpeakers($search, $authenticatedUser);
        $categories = Self::categories($search, $authenticatedUser);
        $payments = Self::payments($search, $authenticatedUser);

        return view('admin.searchbar', [
            'users' => $users, 'organisers' => $organisers, 'events' => $events,
            'orgevent' => $orgevent, 'speakers' => $speakers, 'orgspeaker' => $orgspeaker,
            'categories' => $categories, 'payments' => $payments
        ]);
    }

    public function users($search, $authenticatedUser)
    {
        $users = User::where('user_name', 'LIKE', '%' . $search . '%')
            ->orWhere('user_email', 'LIKE', '%' . $search . '%')->get();

        return $users;
    }

    public function organisers($search, $authenticatedUser)
    {
        $organisers = Organiser::where('organiser_name', 'LIKE', '%' . $search . '%')
            ->orWhere('organiser_email', 'LIKE', '%' . $search . '%')
            ->orWhere('organiser_description', 'LIKE', '%' . $search . '%')
            ->orWhere('phoneno', 'LIKE', '%' . $search . '%')
            ->orWhere('status', 'LIKE', '%' . $search . '%')->get();

        return $organisers;
    }

    public function events($search, $authenticatedUser)
    {
        $events = Event::whereHas('creatable', function ($query) use ($authenticatedUser) {
            $query->where('creatable_id', $authenticatedUser->id)
                ->where('creatable_type', get_class($authenticatedUser));
        })->where(function ($query) use ($search) {
            $query->where('event_name', 'LIKE', '%' . $search . '%')
                ->orWhere('event_description', 'LIKE', '%' . $search . '%')
                ->orWhere('category_name', 'LIKE', '%' . $search . '%')
                ->orWhere('event_date', 'LIKE', '%' . $search . '%')
                ->orWhere('start_time', 'LIKE', '%' . $search . '%')
                ->orWhere('end_time', 'LIKE', '%' . $search . '%')
                ->orWhere('total_ticket', 'LIKE', '%' . $search . '%')
                ->orWhere('available_ticket', 'LIKE', '%' . $search . '%')
                ->orWhere('event_price', 'LIKE', '%' . $search . '%')
                ->orWhere('event_address', 'LIKE', '%' . $search . '%')
                ->orWhere('event_city', 'LIKE', '%' . $search . '%')
                ->orWhere('event_state', 'LIKE', '%' . $search . '%')
                ->orWhere('pincode', 'LIKE', '%' . $search . '%')
                ->orWhere('status', 'LIKE', '%' . $search . '%');
        })->orderBy('status', 'DESC')->get();

        return $events;
    }

    public function orgEvents($search, $authenticatedUser)
    {
        $orgevent = Event::whereDoesntHave('creatable', function ($query) use ($authenticatedUser) {
            $query->where('creatable_id', $authenticatedUser->id)
                ->where('creatable_type', get_class($authenticatedUser));
        })->where(function ($query) use ($search) {
            $query->where('event_name', 'LIKE', '%' . $search . '%')
                ->orWhere('event_description', 'LIKE', '%' . $search . '%')
                ->orWhere('category_name', 'LIKE', '%' . $search . '%')
                ->orWhere('event_date', 'LIKE', '%' . $search . '%')
                ->orWhere('start_time', 'LIKE', '%' . $search . '%')
                ->orWhere('end_time', 'LIKE', '%' . $search . '%')
                ->orWhere('total_ticket', 'LIKE', '%' . $search . '%')
                ->orWhere('available_ticket', 'LIKE', '%' . $search . '%')
                ->orWhere('event_price', 'LIKE', '%' . $search . '%')
                ->orWhere('event_address', 'LIKE', '%' . $search . '%')
                ->orWhere('event_city', 'LIKE', '%' . $search . '%')
                ->orWhere('event_state', 'LIKE', '%' . $search . '%')
                ->orWhere('pincode', 'LIKE', '%' . $search . '%')
                ->orWhere('status', 'LIKE', '%' . $search . '%');
        })->orderBy('status', 'DESC')->get();

        return $orgevent;
    }

    public function speaker($search, $authenticatedUser)
    {
        $speakers = Speaker::whereHas('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->where(function ($query) use ($search) {
            $query->where('speaker_name', 'LIKE', '%' . $search . '%')
                ->orWhere('speaker_description', 'LIKE', '%' . $search . '%');
        })->orderBy('id', 'ASC')->get();

        return $speakers;
    }

    public function orgSpeakers($search, $authenticatedUser)
    {
        $orgspeaker = Speaker::whereDoesntHave('speakerable', function ($query) use ($authenticatedUser) {
            $query->where('speakerable_id', $authenticatedUser->id)
                ->where('speakerable_type', get_class($authenticatedUser));
        })->where(function ($query) use ($search) {
            $query->where('speaker_name', 'LIKE', '%' . $search . '%')
                ->orWhere('speaker_description', 'LIKE', '%' . $search . '%');
        })->orderBy('id', 'ASC')->get();

        return $orgspeaker;
    }

    public function categories($search, $authenticatedUser)
    {
        $categories = Category::where('category_name', 'LIKE', '%' . $search . '%')
            ->orderBy('id', 'ASC')->get();

        return $categories;
    }

    public function payments($search, $authenticatedUser)
    {
        $payments = Ticket::where('paymentno', 'LIKE', '%' . $search . '%')
            ->orWhere('txn_id', 'LIKE', '%' . $search . '%')
            ->orWhere('quantity', 'LIKE', '%' . $search . '%')
            ->orWhere('event_price', 'LIKE', '%' . $search . '%')
            ->orWhere('payment_amount', 'LIKE', '%' . $search . '%')
            ->orWhere('payment_method', 'LIKE', '%' . $search . '%')
            ->orWhere('status', 'LIKE', '%' . $search . '%')->get();

        return $payments;
    }
}

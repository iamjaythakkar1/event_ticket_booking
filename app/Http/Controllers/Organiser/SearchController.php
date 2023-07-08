<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
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

        $authenticatedUser = Auth::guard('organiser')->user();

        // Find Data For Different Table
        $events = Self::events($search, $authenticatedUser);
        $speakers = Self::speaker($search, $authenticatedUser);
        $categories = Self::categories($search);
        $payments = Self::payments($search, $authenticatedUser);

        return view('organiser.searchbar', [
            'events' => $events, 'speakers' => $speakers, 'categories' => $categories,
            'payments' => $payments,
        ]);
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

    public function categories($search)
    {
        $categories = Category::where('category_name', 'LIKE', '%' . $search . '%')
            ->orderBy('id', 'ASC')->get();

        return $categories;
    }

    public function payments($search, $authenticatedUser)
    {
        // Get all the payment details of organiser's created events
        $payments = Event::whereHas('creatable', function ($query) use ($authenticatedUser) {
            $query->where('creatable_id', $authenticatedUser->id)
                ->where('creatable_type', get_class($authenticatedUser));
        })->get();

        $allTickets = [];
        foreach ($payments as $payment) {
            foreach ($payment->tickets as $ticket) {

                $tickets = Ticket::where('id', $ticket->id)
                    ->where(function ($query) use ($search) {
                        $query->where('paymentno', 'LIKE', '%' . $search . '%')
                            ->orWhere('txn_id', 'LIKE', '%' . $search . '%')
                            ->orWhere('quantity', 'LIKE', '%' . $search . '%')
                            ->orWhere('event_price', 'LIKE', '%' . $search . '%')
                            ->orWhere('payment_amount', 'LIKE', '%' . $search . '%')
                            ->orWhere('payment_method', 'LIKE', '%' . $search . '%')
                            ->orWhere('status', 'LIKE', '%' . $search . '%');
                    })->orderBy('created_at', 'ASC')->get();

                // Append the retrieved tickets to the $allTickets array
                $allTickets = array_merge($allTickets, $tickets->all());

                // dump($allTickets);
            }
        }
        return $allTickets;
    }
}

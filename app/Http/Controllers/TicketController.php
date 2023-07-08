<?php

namespace App\Http\Controllers;

use App\Jobs\TicketBook;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

// Stripe Payment
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        // Gather event and another details 
        $user = Auth::user();
        $event = Event::find($request->id);
        $quantity = $request->quantity;
        $price = $request->price;
        $amount = $quantity * $price;

        // Generate unique payment number
        $paymentno = rand(100000, 999999);
        $number = Self::paymentno($paymentno);

        return view('homepage.ticketconfirm', ['user' => $user, 'event' => $event, 'quantity' => $quantity, 'price' => $price, 'amount' => $amount, 'paymentno' => $number]);
    }

    public function paymentno($paymentno)
    {
        // Check this payment number is already exits in database
        $check = Ticket::where('paymentno', $paymentno)->get();

        if (count($check) >= 1) {
            // If payment number is exits in database then recall the function with increment
            $paymentno += 1;
            Self::paymentno($paymentno);
        }

        // If payment number is unique then return number
        return $paymentno;
    }

    public function store(Request $request)
    {
        // Retrive User ID
        $user = Auth::user();

        try {
            // Get the secret key from env file
            Stripe::setApiKey('sk_test_51MtVzYCKX69PtaqzLyzEuryRKsiaUkgHENCFeEUYmOUzfuBCwsij1V3egEUn2VOpiBQsBuqzswEosu8CxWkWLDZ400mb98Ngey');

            // Craete customer 
            $customer = Customer::create(array(
                'email' => $user->user_email,
                'source' => $request->stripeToken
            ));

            // Charge the payment
            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->amount * 100,
                'description' => "Payment ID : $request->paymentno",
                'currency' => 'inr'
            ));

            $txnid = $charge->balance_transaction;
            $method = $charge->payment_method_details->type;
            $status = $charge->status;

            // Create new ticket
            $ticket = Ticket::create([
                'event_id' => $request->event_id,
                'user_id' => $request->user_id,
                'event_price' => $request->price,
                'quantity' => $request->quantity,
                'paymentno' => $request->paymentno,
                'payment_amount' => $request->amount,
                'payment_method' => $method,
                'txn_id' => $txnid,
                'status' => $status,
            ]);

            // Update available ticket column in database
            $event = Event::find($ticket->event_id);
            $event->available_ticket -= $ticket->quantity;
            $event->save();

            $maildata = ['name' => $user->user_name, 'ticket_id' => $ticket->id, 'email' => $user->user_email];

            // Mail to Organiser to Send Password Through Email
            // Mail::to($user->user_email)->queue(new TicketBook($maildata));

            // Run a queue job to send an email to organsier with password
            TicketBook::dispatch($maildata);

            return redirect()->route('ticketview', $ticket);
        } catch (\Exception $ex) {
            // Throw error if any
            return $ex->getMessage();
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'paymentno',
        'txn_id',
        'quantity',
        'event_price',
        'payment_amount',
        'payment_method',
        'status',
    ];

    // One to Many Relation With Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // One to Many Relation With User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

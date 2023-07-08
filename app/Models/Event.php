<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_description',
        'category_name',
        'event_date',
        'start_time',
        'end_time',
        'total_ticket',
        'available_ticket',
        'event_price',
        'event_image',
        'event_address',
        'event_city',
        'event_state',
        'pincode',
        'status',
        'eventable',
    ];

    // One to Many Relation for Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Many to Many Relation for Speaker
    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'event_speaker');
    }

    // One to Many Polymorphic Relation for Event Admin/Organiser
    public function creatable()
    {
        return $this->morphTo();
    }

    // One to Many Relation With Ticket
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

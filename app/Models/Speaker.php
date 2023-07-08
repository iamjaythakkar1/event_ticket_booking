<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'speaker_name',
        'speaker_description',
        'speaker_image',
    ];

    // One to Many Polymorphic Relation for Speaker
    public function speakerable()
    {
        return $this->morphTo();
    }

    // Many to Many Relation for Event
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}

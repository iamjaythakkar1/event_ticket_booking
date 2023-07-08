<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Organiser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // Define guard for organiser
    protected $guard = 'organiser';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'organiser_name',
        'organiser_email',
        'organiser_description',
        'password',
        'phoneno',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // One to Many Polymorphic Relation for Speaker
    public function speakers()
    {
        return $this->morphMany(Speaker::class, 'speakerable');
    }

    // One to Many Polymorphic Relation for Event
    public function events()
    {
        return $this->morphMany(Event::class, 'creatable');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_image',
    ];

    // One to Many Relation for Event
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

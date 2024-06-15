<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'director', 'publication_date', 'state', 'image'];


    public function setName($name)
    {
        $this->$name;
    }


    public function getImageAttribute($value)
    {
    return asset('storage/' . $value);
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'movie_schedule')
            ->withTimestamps();
    }
}


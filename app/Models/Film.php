<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'country_id',
        'cover',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class);
    }

}

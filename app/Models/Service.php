<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rating;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image_path',
        'price',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function getAverageRatingAttribute()
    {
        return round($this->ratings()->avg('rating') ?? 0, 1);
    }

    public function getRatingCountAttribute()
    {
        return $this->ratings()->count();
    }
}

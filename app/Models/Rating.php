<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Rating extends Model
{
    protected $fillable = [
        'service_id',
        'rating',
        'ip_address',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

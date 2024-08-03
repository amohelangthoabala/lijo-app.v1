<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name',
        'address',
        'city',
        'district',
        'postal_code',
        'latitude',
        'longitude',
    ];

    /**
     * Get the restaurant that owns the location.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'restaurant_location_id',
        'meal_id',
        'quantity',
        'price',
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function restaurantLocation()
    {
        return $this->belongsTo(Location::class, 'restaurant_location_id');
    }

}

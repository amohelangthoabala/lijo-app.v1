<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'address_id',
        'driver_id',
        'status',
        'time',
    ];

    /**
     * Get the order associated with the delivery.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the address associated with the delivery.
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    /**
     * Get the address associated with the delivery.
     */
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'street',
        'city',
        'district',
        'postal_code',
        'country',
        'latitude',
        'longitude',
        'addressable_id',
        'addressable_type',

    ];

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}

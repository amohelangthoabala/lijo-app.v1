<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'logo', 'contact_information', 'rating', 'opening_hours',
        'status', 'review_count', 'order_count', 'visit_count', 'last_activity_at', 'is_featured', 'sales_volume', 'user_id',
    ];

    protected $casts = [
        'contact_information' => 'array',
        'opening_hours' => 'array',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }

}

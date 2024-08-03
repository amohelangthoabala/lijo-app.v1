<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'logo', 'contact_information', 'rating', 'opening_hours', 'status',
    ];

    protected $casts = [
        'contact_information' => 'array',
        'opening_hours' => 'array',
    ];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name',
        'description',
        'availability'
    ];

    protected $casts = [
        'availability' => 'array',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function categories()
    {
        return $this->hasMany(MenuCategory::class);
    }

    public function items()
    {
        return $this->hasManyThrough(MenuItem::class, MenuCategory::class);
    }
}

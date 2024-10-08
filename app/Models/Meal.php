<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    // Define the table name (optional if the convention is followed)
    protected $table = 'meals';

    // Allow mass-assignment for these fields
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'is_available',
        'preparation_time',
    ];

    // Relationship: Meal belongs to a Category
    public function category()
    {
        return $this->belongsTo(MenuCategory::class);
    }

    // Define the many-to-many relationship between meals and menus
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_meal', 'meal_id', 'menu_id');
    }

    // Relationship: Meal has many dishes
    // public function dishes()
    // {
    //     return $this->hasMany(Dish::class); // Assuming a `Dish` model exists
    // }
}

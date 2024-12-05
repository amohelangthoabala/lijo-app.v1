<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\MenuItem;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search in restaurants and menu_items
        $restaurants = Restaurant::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        $meal = Meal::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        return response()->json([
            'restaurants' => $restaurants,
            'meals' => $meal,
        ]);
    }
}

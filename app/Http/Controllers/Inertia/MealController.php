<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Http\Resources\MealResource;
use App\Models\MenuCategory;
use App\Models\Restaurant;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Meal::query();

        $sortField = request("sort_field", 'created_at');
        $sortDirection = request("sort_direction", "desc");

        if (request("name")) {
            $query->where("name", "like", "%" . request("name") . "%");
        }

        $meals = $query->orderBy($sortField, $sortDirection)
            ->paginate(12);

        // dd($meals);

        // Retrieve unique categories and restaurants
        $categories = MenuCategory::select('name')->distinct()->get(); // Assuming 'category' is a column
        $restaurants = Restaurant::select('name', 'id')->get(); // Assuming `Restaurant` has `id` and `name`

        return inertia("Meal/Index", [
            "meals" => MealResource::collection($meals),
            'categories' => $categories,
            'restaurants' => $restaurants,
            'queryParams' => request()->query() ?: null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMealRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $meal = Meal::with(['category', 'restaurant', 'reviews.user'])->find($id);

        if (!$meal) {
            abort(404, 'Meal not found');
        }

        return inertia('Meal/Show', [
            'meal' => new MealResource($meal),
            // "tasks" => TaskResource::collection($tasks),
            'queryParams' => request()->query() ?: null,
            'success' => session('success'),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMealRequest $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        //
    }
}

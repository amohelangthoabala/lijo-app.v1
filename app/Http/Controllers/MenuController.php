<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Services\MenuService;

class MenuController extends Controller
{
    protected $menuService;

    // Inject the MenuService into the controller
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
  // Fetch paginated menu items with 6 items per page
        $perPage = $request->input('per_page', 6); // Set default to 6 per page if not provided
        $menus = Menu::paginate($perPage);
        return response()->json($menus);
    }

    public function meals(Request $request)
    {
  // Fetch paginated menu items with 6 items per page
        $perPage = $request->input('per_page', 6); // Set default to 6 per page if not provided
        $menus = Meal::paginate($perPage);
        return response()->json($menus);
    }

    public function getMenusByRestaurant($restaurantId)
    {
        $menus = $this->menuService->getMenusByRestaurantId($restaurantId);
        return response()->json($menus);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = $this->menuService->getMealById($id);
        return response()->json($menu);
    }

        /**
     * Display the specified resource.
     */
    public function mealItem(string $id)
    {
        $menu = $this->menuService->getMenuById($id);
        return response()->json($menu);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = $this->menuService->updateMenu($id, $request->all());
        return response()->json($menu);
    }
}

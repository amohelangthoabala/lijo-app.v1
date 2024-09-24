<?php

namespace App\Http\Controllers;

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
    public function index($restaurantId)
    {
        $menus = $this->menuService->getMenusByRestaurantId($restaurantId);
        return response()->json($menus);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, $restaurantId)
    {
        $menu = $this->menuService->getMenuById($id, $restaurantId);
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

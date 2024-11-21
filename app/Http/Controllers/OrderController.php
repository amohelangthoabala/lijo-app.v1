<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
        // $this->middleware('auth:sanctum');
    }

    /**
     * Create a new order.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:delivery,pickup',
            'status' => 'required|in:pending,completed,canceled',
            'date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.restaurant_id' => 'required|exists:restaurants,id',
            'items.*.meal_id' => 'required|exists:meals,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'driver_id' => 'nullable|exists:users,id',
            'address_id' => 'nullable|exists:addresses,id',
        ]);

        echo 'store';

        try {
            $order = $this->orderService->createOrder($validated);
            return response()->json(['order' => $order], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create order.'], 500);
        }
    }

    /**
     * Update an order.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'type' => 'nullable|in:delivery,pickup',
            'status' => 'nullable|in:pending,completed,canceled',
            'date' => 'nullable|date',
            'items' => 'nullable|array',
            'items.*.restaurant_id' => 'required_with:items|exists:restaurants,id',
            'items.*.meal_id' => 'required_with:items|exists:meals,id',
            'items.*.quantity' => 'required_with:items|integer|min:1',
            'items.*.price' => 'required_with:items|numeric|min:0',
            'driver_id' => 'nullable|exists:drivers,id',
            'address_id' => 'nullable|exists:addresses,id',
        ]);

        try {
            $order = $this->orderService->updateOrder($id, $validated);
            return response()->json(['order' => $order], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update order.'], 500);
        }
    }

    /**
     * Delete an order.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $this->orderService->deleteOrder($id);
            return response()->json(['message' => 'Order deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete order.'], 500);
        }
    }

    /**
     * Fetch orders with filters.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['status', 'type', 'date']);

        // echo 'reached here';

        try {
            $orders = $this->orderService->fetchOrders($filters);
            return response()->json(['orders' => $orders], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    /**
     * Fetch a single order by ID.
     *
     * @param int $id
     * @param OrderService $orderService
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $order = $this->orderService->fetchOrder($id);

            return response()->json([
                'success' => true,
                'data' => $order,
                'message' => 'Order fetched successfully.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found.',
            ], 404);
        }
    }
}

// Routes in routes/api.php

// use App\Http\Controllers\Api\OrderController;

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/orders', [OrderController::class, 'index']);
//     Route::post('/orders', [OrderController::class, 'store']);
//     Route::put('/orders/{id}', [OrderController::class, 'update']);
//     Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
// });

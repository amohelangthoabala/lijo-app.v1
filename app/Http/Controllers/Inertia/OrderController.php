<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Address;
use App\Services\OrderService;
use Illuminate\Http\Request;
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Order::query();

        $orders = $query->paginate(10);

        return inertia("Order/Index", [
            "orders" => OrderResource::collection($orders),
            'queryParams' => request()->query() ?: null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addresses = Address::query()->get();

        // dd($query);

        return inertia("Order/Checkout",[
            'addresses'=> $addresses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);

        // Validate the request data
        // $validated = $request->validate([
        //     'address' => 'required|string|max:255',
        //     'phone' => 'required|string|max:15',
        //     'payment_method' => 'required|in:card,wallet,cash',
        //     'cart' => 'required|array|min:1', // Ensure cart items are provided
        //     'cart.*.id' => 'required|exists:meals,id', // Validate meal IDs
        //     'cart.*.quantity' => 'required|integer|min:1', // Ensure quantity is valid
        //     'cart.*.price' => 'required|numeric|min:0', // Ensure price is valid
        // ]);

        // dd($validated);

        try {

            // Retrieve the authenticated user
            $user = Auth::user();

            // Validate the request data
            $validated = $request->validate([
                'type' => 'required|in:delivery,pickup', // Ensure type is valid
                'date' => 'required|date', // Ensure date is provided and valid
                'status' => 'required|in:pending,completed,cancelled', // Validate status
                'delivery' => 'required_if:type,delivery|array', // Validate delivery only for "delivery" type
                'delivery.address_id' => 'required_if:type,delivery|exists:addresses,id', // Ensure valid address ID
                'delivery.status' => 'required_if:type,delivery|in:pending,completed', // Delivery status validation

                'items' => 'required|array|min:1', // Ensure at least one item is present
                'items.*.id' => 'required|exists:meals,id', // Validate item IDs
                'items.*.restaurant.id' => 'required|exists:restaurants,id', // Validate item IDs
                'items.*.quantity' => 'required|integer|min:1', // Ensure quantity is valid
                'items.*.price' => 'required|numeric|min:0', // Ensure price is valid
            ]);

            // Add authenticated user's ID to the request data
            $validated['user_id'] = $user->id;

            // dd($validated);

            $order = $this->orderService->createOrder($validated);

            // dd($order);

            // Return the order data along with the success message
            // return response()->json([
            //     'message' => 'Order created successfully!',
            //     'order' => $order,  // Make sure to return the order object with its ID
            // ], 201);

            return to_route('order.show', $order)->with('success', 'Order created successfully!');

            // If validation passes, continue processing
            // return response()->json([
            //     'message' => 'Validation successful',
            //     'data' => $validated,
            // ], 200);
        } catch (ValidationException $e) {

            dd($e->errors());
            // Return validation errors as JSON response
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }

        return ;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::with(['customer', 'delivery.address', 'delivery.driver', 'items.restaurant', 'items.meal'])->find($id);

        if (!$order) {
            abort(404, 'order not found');
        }

        return inertia('Order/Show', [
            'order' => new OrderResource($order),
            // "tasks" => TaskResource::collection($tasks),
            'queryParams' => request()->query() ?: null,
            'success' => session('success'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}

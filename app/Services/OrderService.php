<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class OrderService
{
    /**
     * Create a new order.
     *
     * @param array $data
     * @return Order
     * @throws \Exception
     */
    public function createOrder(array $data): Order
    {
        DB::beginTransaction();

        try {
            // Generate a unique order number
            $data['number'] = $data['number'] ?? 'OR-' . random_int(100000, 999999);

            // Validate user exists
            if (!User::find($data['user_id'])) {
                throw ValidationException::withMessages(['user_id' => 'Invalid user selected.']);
            }

            // Create the order
            $order = Order::create([
                'number' => $data['number'],
                'user_id' => $data['user_id'],
                'type' => $data['type'],
                'status' => $data['status'],
                'date' => $data['date'],
            ]);

            // Handle delivery-specific details
            if ($data['type'] === 'delivery') {
                $order->delivery()->create([
                    'driver_id' => $data['driver_id'],
                    'address_id' => $data['address_id'],
                    'status' => $data['delivery_status'] ?? 'pending',
                    'time' => $data['delivery_time'] ?? null,
                ]);
            }

            // Handle order items
            if (!empty($data['items'])) {
                foreach ($data['items'] as $item) {
                    $order->items()->create([
                        'restaurant_id' => $item['restaurant_id'],
                        'meal_id' => $item['meal_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }
            }

            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating order: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Update an existing order.
     *
     * @param int $orderId
     * @param array $data
     * @return Order
     * @throws ModelNotFoundException
     */
    public function updateOrder(int $orderId, array $data): Order
    {
        $order = Order::findOrFail($orderId);

        DB::beginTransaction();

        try {
            // Update basic order details
            $order->update([
                'type' => $data['type'] ?? $order->type,
                'status' => $data['status'] ?? $order->status,
                'date' => $data['date'] ?? $order->date,
            ]);

            // Update delivery details if applicable
            if ($order->type === 'delivery') {
                $order->delivery()->updateOrCreate([], [
                    'driver_id' => $data['driver_id'] ?? $order->delivery->driver_id,
                    'address_id' => $data['address_id'] ?? $order->delivery->address_id,
                    'status' => $data['delivery_status'] ?? $order->delivery->status,
                    'time' => $data['delivery_time'] ?? $order->delivery->time,
                ]);
            }

            // Update items if provided
            if (!empty($data['items'])) {
                $order->items()->delete(); // Clear existing items
                foreach ($data['items'] as $item) {
                    $order->items()->create($item);
                }
            }

            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating order: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Delete an order.
     *
     * @param int $orderId
     * @return bool
     * @throws ModelNotFoundException
     */
    public function deleteOrder(int $orderId): bool
    {
        $order = Order::findOrFail($orderId);

        DB::beginTransaction();

        try {
            $order->items()->delete();
            if ($order->delivery) {
                $order->delivery()->delete();
            }
            $order->delete();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting order: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Fetch orders with optional filters.
     *
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchOrders(array $filters = [])
    {
        $query = Order::query();

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (isset($filters['date'])) {
            $query->whereDate('date', $filters['date']);
        }

        return $query->with(['customer', 'items', 'delivery'])->get();
    }
}

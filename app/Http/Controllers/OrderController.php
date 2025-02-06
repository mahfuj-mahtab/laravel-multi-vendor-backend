<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_item;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        return response()->json([
            'message' => 'success',
            'data' => $orders,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'vendor_id' => 'required|exists:vendors,id',
                'phone' => 'required|string',
                'address' => 'required|string',
                'order_price' => 'required|numeric',
                'tracking_info' => 'nullable|string',
                'notes' => 'nullable|string',
                'order_items' => 'required|array|min:1',
                'order_items.*.product_id' => 'required|exists:products,id',
                'order_items.*.quantity' => 'required|integer|min:1',
                'order_items.*.unit_price' => 'required|numeric',
            ]);

            DB::beginTransaction(); // Start transaction

            // Create Order
            $order = Order::create([
                'user_id' => auth()->id(),
                'vendor_id' => $validatedData['vendor_id'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
                'order_price' => $validatedData['order_price'],
                'tracking_info' => $validatedData['tracking_info'] ?? null,
                'notes' => $validatedData['notes'] ?? null,
                'status' => 'PENDING',
            ]);

            // Add Order Items
            foreach ($validatedData['order_items'] as $item) {
                Order_item::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                ]);
            }

            DB::commit(); // Commit transaction

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction if error occurs
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while placing the order',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $order = Order::where('id', $id)->where('user_id', $user->id)->first();
        return response()->json([
            'message' => 'success',
            'data' => $order,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

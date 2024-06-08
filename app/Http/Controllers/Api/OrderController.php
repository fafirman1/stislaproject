<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'transaction_time' => 'required',
    //         'kasir_id' => 'required|exists:users,id',
    //         'total_price' => 'required|numeric',
    //         'total_item' => 'required|numeric',
    //         'order_items' => 'required|array',
    //         'order_items.*.product_id' => 'required|exists:products,id',
    //         'order_items.*.quantity' => 'required|numeric',
    //         'order_items.*.total_price' => 'required|numeric',
    //     ]);

    //     $order = \App\Models\order::create([
    //         'transaction_time' => $request->transaction_time,
    //         'kasir_id' => $request->kasir_id,
    //         'total_price' => $request->total_price,
    //         'total_item' => $request->total_item,
    //         'payment_method'=> $request->payment_method
    //     ]);

    //     foreach ($request->order_items as $item){
    //         \App\Models\OrderItem::create([
    //             'order_id' => $order->id,
    //             'product_id' => $item['product_id'],
    //             'quantity' => $item['quantity'],
    //             'total_price' => $item['total_price']
    //         ]);
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Order Created',
    //     ], 201);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_time' => 'required',
            'kasir_id' => 'required|exists:users,id',
            'total_price' => 'required|numeric',
            'total_item' => 'required|numeric',
            'order_items' => 'required|array',
            'order_items.*.product_id' => 'required|exists:products,id',
            'order_items.*.quantity' => 'required|numeric',
            'order_items.*.total_price' => 'required|numeric',
        ]);

        // Start database transaction
        DB::beginTransaction();

        try {
            // Create order
            $order = \App\Models\Order::create([
                'transaction_time' => $request->transaction_time,
                'kasir_id' => $request->kasir_id,
                'total_price' => $request->total_price,
                'total_item' => $request->total_item,
                'payment_method' => $request->payment_method
            ]);

            // Decrease product stock
            foreach ($request->order_items as $item) {
                $product = \App\Models\Product::findOrFail($item['product_id']);
                $product->decrement('stock', $item['quantity']); // Decrease stock
                \App\Models\OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'total_price' => $item['total_price']
                ]);
            }

            // Commit transaction if all succeeded
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order Created',
            ], 201);
        } catch (\Exception $e) {
            // Rollback transaction if an error occurred
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Order creation failed: ' . $e->getMessage(),
            ], 500);
        }
    }
}

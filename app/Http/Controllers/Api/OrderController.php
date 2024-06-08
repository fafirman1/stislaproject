<?php

// namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class OrderController extends Controller
// {
//     //
//     public function store(Request $request)
//     {
//         $request->validate([
//             'transaction_time' => 'required',
//             'kasir_id' => 'required|exists:users,id',
//             'total_price' => 'required|numeric',
//             'total_item' => 'required|numeric',
//             'order_items' => 'required|array',
//             'order_items.*.product_id' => 'required|exists:products,id',
//             'order_items.*.quantity' => 'required|numeric',
//             'order_items.*.total_price' => 'required|numeric',
//         ]);

//         $order = \App\Models\order::create([
//             'transaction_time' => $request->transaction_time,
//             'kasir_id' => $request->kasir_id,
//             'total_price' => $request->total_price,
//             'total_item' => $request->total_item,
//             'payment_method'=> $request->payment_method
//         ]);

//         foreach ($request->order_items as $item){
//             \App\Models\OrderItem::create([
//                 'order_id' => $order->id,
//                 'product_id' => $item['product_id'],
//                 'quantity' => $item['quantity'],
//                 'total_price' => $item['total_price']
//             ]);
//         }

//         return response()->json([
//             'success' => true,
//             'message' => 'Order Created',
//         ], 201);
//     }
// }

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Tambahkan ini
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
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

        // Use a transaction to ensure data integrity
        DB::beginTransaction();

        try {
            $order = Order::create([
                'transaction_time' => $request->transaction_time,
                'kasir_id' => $request->kasir_id,
                'total_price' => $request->total_price,
                'total_item' => $request->total_item,
                'payment_method' => $request->payment_method,
            ]);

            foreach ($request->order_items as $item) {
                // Create order item
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'total_price' => $item['total_price'],
                ]);

                // Update stock of the product
                $product = Product::find($item['product_id']);
                if ($product) {
                    // Debugging output
                    Log::info("Current stock of product ID {$product->id}: {$product->stock}");
                    Log::info("Order quantity: {$item['quantity']}");

                    if ($product->stock >= $item['quantity']) {
                        $product->stock -= $item['quantity'];
                        $product->save();

                        // Debugging output
                        Log::info("New stock of product ID {$product->id}: {$product->stock}");
                    } else {
                        // Rollback transaction if stock is insufficient
                        DB::rollBack();
                        return response()->json([
                            'success' => false,
                            'message' => 'Insufficient stock for product ID ' . $product->id,
                        ], 400);
                    }
                } else {
                    // Rollback transaction if product not found
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => 'Product not found with ID ' . $item['product_id'],
                    ], 404);
                }
            }

            // Commit transaction
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order Created',
            ], 201);
        } catch (\Exception $e) {
            // Rollback transaction on error
            DB::rollBack();
            Log::error("Order creation failed: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Order creation failed',
            ], 500);
        }
    }
}



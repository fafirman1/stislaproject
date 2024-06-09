<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all products
        $products=\App\Models\Product::orderBy('name', 'desc')->get();
        return response()->json([
            'success'=>true,
            'message'=>'List Data Product',
            'data'=>$products
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'price'=>'required|integer',
            'stock'=>'required|integer',
            'category'=>'required|in:Fresh,Sweet',
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/products', $filename);
        $product = \App\Models\Product::create([
            'name'=>$request->name,
            'price'=>(int) $request->price,
            'stock'=>(int) $request->stock,
            'category'=>$request->category,
            'image'=>$filename
        ]);

        if ($product){
            return response()->json([
                'success'=>true,
                'message'=>'Product Created',
                'data'=>$product
            ], 201);
        } else{
            return response()->json([
                'success'=>false,
                'message'=>'Product failed to create',
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    //update stock
    public function updateStock(Request $request)
    {
        //validate the request...
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'stock' => 'required|numeric',
        ]);

        //get product
        $product = \App\Models\Product::find($request->product_id);
        $currentStock = $product->stock;
        $updateStock = $currentStock-$request->stock;
        //update stock
        $product->stock = $updateStock;
        $product->save();

        //product=find(id)
        //currentStock=product.stock
        //updateSrock=currentStock - qty
        //ProductStock=updatestock
        //productsave

        //return response
        return response()->json([
            'message' => 'Stock updated successfully!',
        ]);
    }
}

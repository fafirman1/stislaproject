<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //index
    public function index()
    {
        $orders = \App\Models\order::with('kasir')->orderBy('created_at','desc')->paginate(10);
        return view('pages.orders.index', compact('orders'));
    }

    //view
    public function view($id)
    {
        $order = \App\Models\order::with('kasir', 'orderItems.product')->findOrFail($id);
        //order items
        $orderItems=$order->orderItems;
        return view('pages.orders.view', compact('order'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('orders.show', compact('order'));
    }
    
    public function index()
    {
        $orders = \App\Models\Order::where('user_id', auth()->id())
            ->latest()
            ->get();
            
        return view('orders.index', compact('orders'));
    }

}

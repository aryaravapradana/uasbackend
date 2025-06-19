<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show(Order $order)
{
    if ($order->user_id !== Auth::id()) {
        abort(403);
    }

    $order->load(['items.product', 'payment']);


    $product = $order->items->first()->product ?? null;

    return view('order.show', compact('order', 'product'));
}


    public function history()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
                       ->with(['items.product', 'payment'])
                       ->latest() 
                       ->paginate(10); 

        return view('order.history', compact('orders'));
    }
}

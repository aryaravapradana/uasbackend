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

    // Ambil produk pertama dari relasi item (kalau hanya 1 produk per order)
    $product = $order->items->first()->product ?? null;

    return view('order.show', compact('order', 'product'));
}


    public function history()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
                       ->with(['items.product', 'payment'])
                       ->latest() // Urutkan dari yang terbaru
                       ->paginate(10); // Paginate untuk performa

        return view('order.history', compact('orders'));
    }
}

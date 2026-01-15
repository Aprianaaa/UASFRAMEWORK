<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
$orders = Order::with('items.product')
    ->where('user_id', auth()->id())
    ->where('status', '!=', 'cancel')
    ->latest()
    ->get();

        return view('orders.index', compact('orders'));
    }
public function cancel(Order $order)
{
    if ($order->user_id !== auth()->id()) {
        abort(403);
    }

    if ($order->status !== 'process') {
        return back();
    }

    $order->update([
        'status' => 'cancel'
    ]);

    return back()->with('success', 'Pesanan dibatalkan');
}


}

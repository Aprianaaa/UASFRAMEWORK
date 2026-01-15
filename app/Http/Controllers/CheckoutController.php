<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $items = Cart::with('product')
            ->where('session_id', session()->getId())
            ->get();

        if ($items->isEmpty()) {
            return redirect('/cart')->with('error','Keranjang kosong');
        }

        $total = 0;

        foreach ($items as $item) {
            if ($item->product->is_boxable && $item->is_box) {
                $total += $item->product->price_box * $item->box_qty;
            } else {
                $total += $item->product->price * $item->quantity;
            }
        }

        // UPLOAD BUKTI
        $proof = null;
        if ($request->hasFile('proof')) {
            $proof = $request->file('proof')->store('proofs','public');
        }

        // SIMPAN ORDER
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'payment_method' => $request->method,
            'proof' => $proof,
            'total' => $total,
            'status' => $request->method == 'cod' ? 'process' : 'pending' , 'Done'
        ]);

        // SIMPAN ITEM
        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'is_box' => $item->is_box,
                'box_qty' => $item->box_qty,
                'price' => $item->is_box
                    ? $item->product->price_box
                    : $item->product->price
            ]);
        }

        // KOSONGKAN CART
        Cart::where('session_id', session()->getId())->delete();

return redirect('/menu')
    ->with('success', 'Pesanan berhasil dibuat');

    }
    
}

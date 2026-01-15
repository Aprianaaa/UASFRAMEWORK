<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //  LIST PESANAN
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.ordersadmin', compact('orders'));
    }

    //  UPDATE STATUS PESANAN
public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);

    // hanya boleh ubah dari process
    if ($order->status !== 'process') {
        return back();
    }

    $order->status = $request->status;
    $order->save();

    return back()->with('success','Status diperbarui');
}



    //  KONFIRMASI PEMBAYARAN (BANK / QRIS)
public function confirmPayment($id)
{
    $order = Order::findOrFail($id);

    if ($order->status !== 'pending') {
        return back();
    }


    $order->status = 'process';
    $order->save();

    return back()->with('success','Pesanan dikonfirmasi & diproses');
}




}

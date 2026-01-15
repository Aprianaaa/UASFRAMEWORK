<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // HALAMAN CART
    public function index()
    {
        $items = Cart::where('session_id', Session::getId())
            ->with('product')
            ->get();

        return view('add-to-cart', compact('items'));
    }

    // ADD TO CART
public function add(Request $request, $id)
{
    $product = Product::where('product_id', $id)->firstOrFail();

    // hanya produk yg boxable yg boleh box
    $isBox = $product->is_boxable && $request->has('is_box');

    Cart::create([
        'session_id' => session()->getId(),
        'product_id' => $product->product_id,
        'quantity'   => $request->quantity ?? 1,
        'is_box'     => $isBox,
        'box_qty'    => $isBox ? ($request->box_qty ?? 1) : 0,
        'price'      => $product->price,
    ]);

    return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');

}

public function remove($id)
{
    Cart::where('id', $id)
        ->where('session_id', Session::getId()) // biar aman, ga hapus cart orang lain
        ->delete();

    return redirect()->back()->with('success', 'Item berhasil dihapus');
}

    // CHECKOUT
    public function checkout(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'address' => 'required',
            'phone'   => 'required',
            'method'  => 'required',
            'proof'   => $request->method === 'cod'
                ? 'nullable'
                : 'required|image|max:2048',
        ]);

        // 👉 di sini nanti simpan order (opsional)
        // sekarang fokus cart dulu

        // kosongin cart setelah checkout
        Cart::where('session_id', Session::getId())->delete();

        return redirect('/menu')->with('success', 'Pesanan berhasil dibuat');
    }
}

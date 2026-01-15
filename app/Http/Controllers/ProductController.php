<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /* =========================
       MENU PELANGGAN
    ==========================*/
    public function index(Request $request)
    {
        $categories = Category::all();

        $products = Product::with('category')
            ->when($request->category, function ($q) use ($request) {
                $q->where('category_id', $request->category);
            })
            ->get();

        return view('menu', compact('products', 'categories'));
    }

    /* =========================
       ADMIN - LIST PRODUK
    ==========================*/
    public function adminIndex()
    {
        $products = Product::with('category')->get();
        return view('dashboard.admin', compact('products'));
    }

    /* =========================
       ADMIN - TAMBAH PRODUK
    ==========================*/
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image'
        ]);

        $image = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $image,
            'is_best_seller' => $request->is_best_seller ? 1 : 0
        ]);

        return back()->with('success','Produk berhasil ditambahkan');
    }
}


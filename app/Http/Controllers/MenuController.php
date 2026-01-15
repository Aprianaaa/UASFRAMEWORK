<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::all();
        $products = Product::when($request->category, function($q) use ($request){
            $q->where('category_id', $request->category);
        })->get();

        return view('menu', compact('products','categories'));
    }
}


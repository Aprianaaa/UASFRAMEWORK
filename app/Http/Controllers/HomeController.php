<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $bestSeller = Product::where('is_best_seller', 1)
                            ->limit(5)
                            ->get();

        return view('dashboard.user', compact('bestSeller'));
    }
}

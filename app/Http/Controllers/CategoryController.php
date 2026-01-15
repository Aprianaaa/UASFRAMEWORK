<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.user', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        Category::create($request->all());

        return back()->with('success','Kategori berhasil ditambahkan');
    }
}

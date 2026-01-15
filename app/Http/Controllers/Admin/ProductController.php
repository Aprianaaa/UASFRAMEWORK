<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric',
            'image'       => 'nullable|image',
            'is_boxable'  => 'nullable',
            'price_box'   => 'nullable|numeric'
        ]);

        $data = $request->all();
        $data['is_boxable'] = $request->has('is_boxable');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->to('/admin/product')
            ->with('success', 'Produk berhasil ditambahkan');
    }

public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.product.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $data = [
        'name'       => $request->name,
        'price'      => $request->price,
        'price_box'  => $request->price_box,
        'is_boxable' => $request->has('is_boxable'),
    ];

    if ($request->hasFile('image')) {

        //  hapus foto lama
        if ($product->image && file_exists(public_path('products/'.$product->image))) {
            unlink(public_path('products/'.$product->image));
        }

        //  simpan foto baru ke public/products
        $file = $request->file('image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('products'), $filename);

        //  simpan NAMA FILE saja ke DB
        $data['image'] = $filename;
    }

    $product->update($data);

    return redirect('/admin/product')->with('success', 'Produk diupdate');
}




    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return back()->with('success', 'Produk berhasil dihapus');
    }

    public function show($id)
    {
        return redirect()->to('/admin/product/' . $id . '/edit');
    }
}

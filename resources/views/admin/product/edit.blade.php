@extends('admin.layout')

@section('content')

<h3>Edit Produk</h3>

<form method="POST" action="/admin/product/update/{{ $product->product_id }}" enctype="multipart/form-data">
    @csrf

    <input class="form-control mb-2" name="name" value="{{ $product->name }}">
    <input class="form-control mb-2" name="price" value="{{ $product->price }}">

    <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="is_boxable"
            {{ $product->is_boxable ? 'checked' : '' }}>
        <label class="form-check-label">Bisa beli per box</label>
    </div>

    <input class="form-control mb-2" name="price_box" value="{{ $product->price_box }}">
    <input type="file" class="form-control mb-3" name="image">

    <button class="btn btn-primary">Update</button>
</form>

@endsection

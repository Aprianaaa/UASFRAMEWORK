@extends('admin.layout')

@section('content')

<h3>Tambah Produk</h3>

<form method="POST" action="/admin/product" enctype="multipart/form-data">
    @csrf

    <input class="form-control mb-2" name="name" placeholder="Nama Produk">
    <input class="form-control mb-2" name="price" placeholder="Harga">

    <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="is_boxable">
        <label class="form-check-label">Bisa beli per box</label>
    </div>

    <input class="form-control mb-2" name="price_box" placeholder="Harga per box">

    <input type="file" class="form-control mb-3" name="image">

    <button class="btn btn-success">Simpan</button>
</form>

@endsection

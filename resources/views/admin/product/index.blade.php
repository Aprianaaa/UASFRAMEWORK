@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Produk</h3>
    <a href="{{ url('admin/product/create') }}" class="btn btn-primary">+ Tambah Produk</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Box</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>Rp {{ number_format($p->price,0,',','.') }}</td>
            <td>
                {{ $p->is_boxable ? 'Rp '.number_format($p->price_box,0,',','.') : '-' }}
            </td>
            <td>
        {{-- EDIT --}}
<a href="{{ url('admin/product/'.$p->product_id.'/edit') }}"
   class="btn btn-warning btn-sm">
    Edit
</a>


        {{-- DELETE --}}
<form action="/admin/product/{{ $p->product_id }}/delete" method="POST" class="d-inline">
    @csrf
    <button class="btn btn-danger btn-sm"
        onclick="return confirm('Yakin hapus produk ini?')">
        Hapus
    </button>
</form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

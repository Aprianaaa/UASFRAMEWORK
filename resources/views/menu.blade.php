@extends('layout')
@section('title', 'Dashboard User')

@section('content')

    <h3 class="mb-4">Daftar Produk Sembako</h3>

    <!-- FILTER KATEGORI -->
<form method="GET" action="/menu" class="mb-4">
    <select name="category"
            class="form-select w-25"
            onchange="this.form.submit()">

        <option value="">Semua Kategori</option>

        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ request('category') == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
</form>



    <div class="row g-4">
@foreach ($products as $p)
    <div class="col-md-3">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('products/' . $p->image) }}"
                 class="card-img-top mx-auto d-block"
                 style="height:150px;width:150px; object-fit:cover;"
                 alt="{{ $p->name }}">

            <div class="card-body d-flex flex-column">
                <h6 class="fw-bold">{{ $p->name }}</h6>
                <p class="text-success mb-2">
                    Rp {{ number_format($p->price) }}
                </p>

                <!-- BUTTON -->
                <button class="btn btn-sm btn-primary mt-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#modal{{ $p->product_id }}">
                    Pesan
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL PESAN -->
    <div class="modal fade" id="modal{{ $p->product_id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <form action="/add-to-cart/{{ $p->product_id }}" method="POST" class="w-100">
                @csrf

                <div class="modal-content shadow-lg border-0 rounded-4">
                    <!-- HEADER -->
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">{{ $p->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- BODY -->
                    <div class="modal-body pt-2">
                        <div class="text-center mb-3">
                            <img src="{{ asset('products/' . $p->image) }}"
                                 class="img-fluid rounded"
                                 style="max-height:180px; object-fit:contain;"
                                 alt="{{ $p->name }}">
                        </div>

                        <p class="text-center fs-5 fw-bold text-success mb-3">
                            Rp {{ number_format($p->price) }}
                        </p>

                        <!-- QTY PCS -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jumlah (pcs)</label>
                            <input type="number"
                                   name="quantity"
                                   class="form-control"
                                   min="1"
                                   value="1">
                        </div>

                        <!-- BOX OPTION (CUMA KALO BOLEH) -->
                        @if($p->is_boxable)
                        <div class="border rounded p-3 bg-light">
                            <div class="form-check mb-2">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="is_box"
                                       value="1"
                                       id="box{{ $p->product_id }}">
                                <label class="form-check-label fw-semibold"
                                       for="box{{ $p->product_id }}">
                                    Beli per Box
                                </label>
                            </div>

                            <div>
                                <label class="form-label">Jumlah Box</label>
                                <input type="number"
                                       name="box_qty"
                                       value="1"
                                       min="1"
                                       class="form-control">
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer border-0 pt-0">
                        <button class="btn btn-success w-100 fw-semibold" type="submit">
                            🛒 Tambah ke Keranjang
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach

    </div>

@endsection

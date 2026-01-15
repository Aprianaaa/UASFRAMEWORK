@extends('layout')

@section('content')

<h3>Keranjang Belanja</h3>

<div class="row">

    {{-- ================= FORM CHECKOUT ================= --}}
    <div class="col-md-6">
        <form action="/checkout" method="POST" enctype="multipart/form-data" id="checkout-form">
            @csrf

            <h5>Data Pengiriman</h5>
            <input class="form-control mb-2" name="name" placeholder="Nama" required>
            <textarea class="form-control mb-2" name="address" placeholder="Alamat" required></textarea>
            <input class="form-control mb-2" name="phone" placeholder="No. Telepon" required>
        </form>
    </div>

    {{-- ================= PESANAN ================= --}}
    <div class="col-md-6">
        <h5>Pesanan</h5>

        <ul class="list-group mb-2">
            @php $total = 0; @endphp

            @forelse($items as $item)
                @php
                    if (!$item->product) {
                        $subtotal = 0;
                        $labelQty = '-';
                    } else {
                        $subtotal = $item->product->price * $item->quantity;
                        $labelQty = $item->quantity . ' pcs';

                        if ($item->product->is_boxable && $item->is_box) {
                            $subtotal = $item->product->price_box * $item->box_qty;
                            $labelQty = $item->box_qty . ' box';
                        }
                    }

                    $total += $subtotal;
                @endphp

                {{-- FORM DELETE (BENAR-BENAR TERPISAH) --}}
                <form id="delete-form-{{ $item->id }}"
                      action="{{ route('cart.remove', $item->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')
                </form>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $item->product ? $item->product->name : 'Produk tidak tersedia' }}</strong><br>
                        <small class="text-muted">{{ $labelQty }}</small>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>

                        <button type="button"
                                class="btn btn-sm btn-danger"
                                onclick="if(confirm('Hapus item ini?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
                            ✖
                        </button>
                    </div>
                </li>

            @empty
                <li class="list-group-item text-center text-muted">
                    Pesanan masih kosong
                </li>
            @endforelse
        </ul>

        <h6 class="text-end">
            Total: <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>
        </h6>

        <select name="method" id="method" class="form-select mt-3" form="checkout-form">
            <option value="cod">COD</option>
            <option value="transfer">Transfer Bank</option>
            <option value="qris">QRIS</option>
        </select>

        <div id="proof-wrapper" class="mt-2 d-none">
            <input type="file" name="proof" class="form-control" form="checkout-form">
        </div>

        <button class="btn btn-success w-100 mt-3" type="submit" form="checkout-form">
            Checkout
        </button>
    </div>
</div>

<script>
    const method = document.getElementById('method');
    const proofWrapper = document.getElementById('proof-wrapper');

    method.addEventListener('change', function () {
        if (this.value === 'transfer' || this.value === 'qris') {
            proofWrapper.classList.remove('d-none');
        } else {
            proofWrapper.classList.add('d-none');
        }
    });
</script>

@endsection

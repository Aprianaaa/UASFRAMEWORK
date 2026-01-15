@extends('layout')

@section('content')

<h3>Pesanan Saya</h3>

@forelse($orders as $order)
<div class="card mb-3">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <strong>Order #{{ $order->id }}</strong>
                <span class="badge bg-info text-dark ms-2">
                    {{ strtoupper($order->status) }}
                </span>
            </div>

            {{-- BUTTON CANCEL (SATU PER ORDER) --}}
            @if($order->status === 'process')
<form action="{{ route('orders.cancel', $order->id) }}"
      method="POST"
      onsubmit="return confirm('Batalkan pesanan ini?')">
    @csrf
    <button class="btn btn-sm btn-danger">
        Cancel Pesanan
    </button>
</form>

            @endif
        </div>

        <p>
    Metode: <strong>{{ strtoupper($order->payment_method) }}</strong>
</p>

        <p class="mb-2">Total: <strong>Rp {{ number_format($order->total,0,',','.') }}</strong></p>

        <ul class="mb-0">
            @foreach($order->items as $item)
                <li>
                    {{ $item->product?->name ?? 'Produk tidak tersedia' }}
                    -
                    {{ $item->is_box ? $item->box_qty.' box' : $item->quantity.' pcs' }}
                </li>
            @endforeach
        </ul>

    </div>
</div>
@empty
<p class="text-muted">Belum ada pesanan</p>
@endforelse

@endsection

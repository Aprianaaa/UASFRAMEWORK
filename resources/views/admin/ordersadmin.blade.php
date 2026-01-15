@extends('admin.layout')

@section('title','Pesanan')

@section('content')

<h3 class="mb-3">Daftar Pesanan</h3>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pelanggan</th>
            <th>Total</th>
            <th>Metode</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $o)
        <tr>
            <td>#{{ $o->id }}</td>
            <td>{{ $o->name }}</td>
            <td>Rp {{ number_format($o->total,0,',','.') }}</td>
            <td>{{ strtoupper($o->payment_method) }}</td>

            <td>
                @if($o->status == 'pending')
                    <span class="badge bg-warning">PENDING</span>
                @elseif($o->status == 'process')
                    <span class="badge bg-primary">PROCESS</span>
                @elseif($o->status == 'done')
                    <span class="badge bg-success">DONE</span>
                @else
                    <span class="badge bg-danger">CANCELLED</span>
                @endif
            </td>

<td>

    {{-- 🔴 JIKA STATUS PENDING --}}
    @if($o->status === 'pending')

        <form method="POST" action="/admin/orders/{{ $o->id }}/confirm">
            @csrf
            <button type="submit"
                class="btn btn-sm btn-success"
                onclick="return confirm('Konfirmasi pesanan ini?')">
                Konfirmasi
            </button>
        </form>

    {{-- 🟢 JIKA STATUS PROCESS --}}
    @elseif($o->status === 'process')

        <form method="POST" action="/admin/orders/{{ $o->id }}/status">
            @csrf
            <select name="status" onchange="this.form.submit()">
                <option value="process" selected>process</option>
                <option value="done">done</option>
                <option value="cancelled">cancelled</option>
            </select>
        </form>

    {{-- ⚪ DONE / CANCELLED --}}
    @else
        <span class="text-muted">-</span>
    @endif

</td>


        </tr>
        @endforeach
    </tbody>
</table>

@endsection

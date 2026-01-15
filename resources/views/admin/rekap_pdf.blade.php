<h3 style="text-align:center">Rekap Transaksi</h3>
<hr>

<table width="100%" border="1" cellspacing="0" cellpadding="6">
    <thead>
        <tr>
            <th>#</th>
            <th>Pelanggan</th>
            <th>Total</th>
            <th>Metode</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $o)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $o->name ?? '-' }}</td>
            <td>Rp {{ number_format($o->total,0,',','.') }}</td>
            <td>{{ strtoupper($o->payment_method ?? '-') }}</td>
            <td>{{ $o->status }}</td>
            <td>{{ $o->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

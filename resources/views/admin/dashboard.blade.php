@extends('admin.layout')

@section('title','Dashboard Admin')

@section('content')

<h3 class="mb-4">Dashboard Admin</h3>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total Pemasukan Bulanan</h6>
                <h4 class="text-success">
                    Rp {{ number_format($totalIncome,0,',','.') }}
                </h4>
            </div>
        </div>
    </div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Rekap Transaksi</h5>

    <div class="d-flex gap-2">
        <a href="{{ route('admin.rekap.pdf') }}" class="btn btn-danger btn-sm">
            📄 PDF
        </a>
        <a href="{{ route('admin.rekap.excel') }}" class="btn btn-success btn-sm">
            📊 Excel
        </a>
    </div>
</div>

</div>

<div class="card shadow-sm">
    <div class="card-body">
        <h6>Pemasukan Harian</h6>
        <canvas id="incomeChart"></canvas>
    </div>
</div>

<script>
const ctx = document.getElementById('incomeChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($dailyIncome->pluck('date')) !!},
        datasets: [{
            label: 'Pemasukan',
            data: {!! json_encode($dailyIncome->pluck('total')) !!},
            borderColor: '#198754',
            backgroundColor: 'rgba(25,135,84,0.2)',
            tension: 0.3
        }]
    }
});
</script>

@endsection

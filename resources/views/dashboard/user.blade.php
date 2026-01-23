@extends('layout')
@section('title', 'Dashboard User')

@section('content')

{{-- HERO --}}
<div class="p-5 rounded-4 mb-5 text-white"
     style="background: linear-gradient(135deg, #14532d, #22c55e);">
    <div class="row align-items-center">
        <div class="col-md-6">

            <span class="badge bg-light text-success mb-3">
                #BelanjaHarian
            </span>

            <h1 class="fw-bold mb-3 display-6">
                Belanja Sembako  
                <span class="text-warning">Tanpa Ribet</span>
            </h1>

            <p class="fs-5 mb-4">
                WARJA bantu kamu belanja kebutuhan dapur  
                lebih cepat, hemat, dan praktis.
            </p>

            <div class="d-flex gap-3">
                <a href="/menu" class="btn btn-light btn-lg fw-semibold">
                    <i class="bi bi-bag-check"></i> Mulai Belanja
                </a>
                <a href="#best-seller" class="btn btn-outline-light btn-lg">
                    Lihat Produk Laris
                </a>
            </div>
        </div>

        <div class="col-md-6 text-center">
            <img src="{{ asset('img/hero_warja.jpg') }}"
                 class="img-fluid rounded-4 shadow"
                 style="max-height:320px">
        </div>
    </div>
</div>

{{-- TRUST STRIP --}}
<div class="row text-center mb-5 g-4">
    <div class="col-md-3">
        <div class="bg-white rounded-4 shadow-sm p-4 h-100">
            <i class="bi bi-house-check fs-1 text-success"></i>
            <h6 class="fw-bold mt-2">Belanja Harian</h6>
            <p class="text-muted mb-0">Untuk Rumah Tangga</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-white rounded-4 shadow-sm p-4 h-100">
            <i class="bi bi-box-seam fs-1 text-success"></i>
            <h6 class="fw-bold mt-2">Produk Segar</h6>
            <p class="text-muted mb-0">Siap Kirim Setiap Hari</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-white rounded-4 shadow-sm p-4 h-100">
            <i class="bi bi-truck fs-1 text-success"></i>
            <h6 class="fw-bold mt-2">Pengiriman Cepat</h6>
            <p class="text-muted mb-0">Langsung ke Rumah</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-white rounded-4 shadow-sm p-4 h-100">
            <i class="bi bi-shield-check fs-1 text-success"></i>
            <h6 class="fw-bold mt-2">Pembayaran Aman</h6>
            <p class="text-muted mb-0">COD / Transfer / QRIS</p>
        </div>
    </div>
</div>

{{-- HOW IT WORKS --}}
<div class="mb-5">
    <h3 class="fw-bold text-center mb-4">
        Cara Belanja di WARJA
    </h3>

    <div class="row text-center g-4">
        <div class="col-md-4">
            <div class="p-4 rounded-4 bg-light h-100">
                <i class="bi bi-search fs-1 text-success"></i>
                <h6 class="fw-bold mt-3">Pilih Produk</h6>
                <p class="text-muted mb-0">
                    Cari kebutuhan dapur favoritmu
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 rounded-4 bg-light h-100">
                <i class="bi bi-cart-check fs-1 text-success"></i>
                <h6 class="fw-bold mt-3">Masuk Keranjang</h6>
                <p class="text-muted mb-0">
                    Atur jumlah & metode pembelian
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 rounded-4 bg-light h-100">
                <i class="bi bi-house-door fs-1 text-success"></i>
                <h6 class="fw-bold mt-3">Diantar ke Rumah</h6>
                <p class="text-muted mb-0">
                    Tunggu pesanan sampai
                </p>
            </div>
        </div>
    </div>
</div>

{{-- ===================== --}}
{{-- BEST SELLER (JANGAN DIUBAH) --}}
{{-- ===================== --}}
<div id="best-seller" class="mb-4 text-center">
    <h2 class="fw-bold mb-2">
         Produk Paling Laris
    </h2>
    <p class="text-muted">
        Favorit pelanggan WARJA
    </p>
</div>

<div class="row g-4">
@foreach ($bestSeller as $p)
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
        <div class="card border-0 shadow-lg rounded-4 h-100 position-relative best-card">
            <span class="position-absolute top-0 start-0 m-3 badge bg-danger px-3 py-2">
                BEST SELLER
            </span>

            <div class="text-center pt-4">
                <img src="{{ asset('products/' . $p->image) }}"
                     style="height:150px;width:150px;object-fit:cover">
            </div>

            <div class="card-body text-center d-flex flex-column">
                <h6 class="fw-bold mb-1">{{ $p->name }}</h6>
                <p class="text-success fw-bold fs-5 mb-3">
                    Rp {{ number_format($p->price) }}
                </p>
                <a href="/menu" class="btn btn-success mt-auto fw-semibold">
                    <i class="bi bi-cart-plus"></i> Beli Sekarang
                </a>
            </div>
        </div>
    </div>
@endforeach
</div>

{{-- CTA --}}
<div class="mt-5 p-5 rounded-4 text-center text-white"
     style="background: linear-gradient(135deg, #064e3b, #166534);">
    <h3 class="fw-bold mb-3">
        Saatnya Belanja Lebih Praktis
    </h3>
    <p class="fs-5 mb-4">
        WARJA siap bantu kebutuhan dapur kamu setiap hari.
    </p>
    <a href="/menu" class="btn btn-light btn-lg fw-semibold">
        <i class="bi bi-basket"></i> Ke Menu Produk
    </a>
</div>

{{-- STYLE --}}
<style>
.best-card {
    transition: transform .25s ease, box-shadow .25s ease;
}
.best-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0,0,0,.18);
}
</style>

@endsection

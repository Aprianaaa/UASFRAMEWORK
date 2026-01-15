@extends('layout')
@section('title', 'Dashboard User')

@section('content')

    <!-- HERO -->
    <div class="bg-light p-5 rounded mb-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold">Selamat Datang di Warja</h1>
                <p class="lead">
                    Warja adalah toko sembako online terpercaya yang menyediakan
                    kebutuhan pokok harian dengan harga terjangkau dan proses cepat.
                </p>
                <a href="/menu" class="btn btn-success btn-lg">
                    Belanja Sekarang
                </a>
            </div>
            <div class="col-md-6 text-center">
                <!-- ganti hero-warja.png dengan gambar yang kamu punya -->
                <img src="{{ asset('img/hero_warja.jpg') }}" class="img-fluid" style="max-height:300px">
            </div>
        </div>
    </div>

    <h5 class="mb-3">Produk Best Seller</h5>

    <div class="row">
        @foreach ($bestSeller as $p)
            <div class="col-md-3">
                <div class="card mb-3 shadow-sm">
                    <img src="{{ asset('products/' . $p->image) }}" class="card-img-top mx-auto d-block"
                        style="height:150px;width:150px; object-fit:cover;" alt="{{ $p->name }}">



                    <div class="card-body text-center">
                        <h6 class="fw-bold">{{ $p->name }}</h6>
                        <p class="text-success mb-2">
                            Rp {{ number_format($p->price) }}
                        </p>
                        <a href="/menu" class="btn btn-sm btn-primary w-100">
                            Lihat Menu
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <br>
    <br>
    <br>
    <br>

{{-- ABOUT US --}}
<div class="container my-5">

    {{-- HERO ABOUT --}}
    <div class="bg-dark text-white rounded-4 p-5 mb-5">
        <h2 class="fw-bold mb-3">Tentang Warja</h2>
        <p class="mb-0 fs-5">
            Warja adalah platform belanja sembako online yang hadir untuk
            memudahkan masyarakat memenuhi kebutuhan sehari-hari dengan
            harga terjangkau, kualitas terjamin, dan proses pemesanan yang cepat.
        </p>
    </div>

    {{-- VALUE --}}
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="p-4 shadow-sm rounded-4 h-100">
                <h5 class="fw-bold"> Harga Terjangkau</h5>
                <p class="text-muted">
                    Kami menyediakan sembako dengan harga kompetitif
                    langsung dari distributor terpercaya.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 shadow-sm rounded-4 h-100">
                <h5 class="fw-bold"> Pengiriman Cepat</h5>
                <p class="text-muted">
                    Pesanan diproses dengan cepat agar kebutuhan Anda
                    sampai tepat waktu.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 shadow-sm rounded-4 h-100">
                <h5 class="fw-bold"> Aman & Terpercaya</h5>
                <p class="text-muted">
                    Sistem pemesanan dan pembayaran yang aman
                    untuk kenyamanan pelanggan
                </p>
            </div>
        </div>
    </div>



</div>


@endsection

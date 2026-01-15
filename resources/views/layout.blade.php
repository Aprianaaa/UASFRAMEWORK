<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#f5f5f5; }
        .navbar { background:#212529; }
        .navbar-brand, .nav-link, .dropdown-toggle { color:white !important; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand fw-bold" href="#">WARJA</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
            @auth
            <li class="nav-item"><a class="nav-link" href="/user">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="/cart">Keranjang</a></li>
            <li class="nav-item"><a class="nav-link" href="/orders">Pesanan</a></li>
            @endauth
        </ul>

        @auth
        <!-- NAMA USER + DROPDOWN -->
        <div class="dropdown">
            <a class="dropdown-toggle text-white text-decoration-none"
               href="#" data-bs-toggle="dropdown">
                {{ auth()->user()->name }} 
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="dropdown-item text-danger">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</nav>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mt-3">
    {{ session('success') }}
    <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
<div class="container mt-4">
    @yield('content')
    
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

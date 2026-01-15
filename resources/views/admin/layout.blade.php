<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Admin')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { background:#f5f5f5; }
        .navbar { background:#212529; }
        .navbar-brand, .nav-link { color:white !important; }
        .nav-link.active { font-weight:bold; text-decoration:underline; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand fw-bold" href="/admin/dashboard">WARJA ADMIN</a>

    <ul class="navbar-nav me-auto ms-4">
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/product">Produk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/ordersadmin">Pesanan</a>
        </li>
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
</nav>

<div class="container my-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

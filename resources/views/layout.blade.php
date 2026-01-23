<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - WARJAA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: 1px;
            color: #ffffff !important;
        }

        /* MENU LINK */
        .nav-link {
            color: #ffffff !important;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 10px;
            transition: 0.3s;
            margin-right: 6px;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.25);
            color: #ffffff !important;
        }

        .nav-link.active {
            background: rgba(255,255,255,0.35);
            color: #ffffff !important;
        }

        /* CART ICON */
        .cart-icon {
            position: relative;
            font-size: 22px;
            margin-right: 18px;
            color: #ffffff;
        }

        .cart-icon:hover {
            opacity: 0.85;
        }

        .cart-badge {
            position: absolute;
            top: -6px;
            right: -10px;
            background: #dc2626;
            color: white;
            font-size: 11px;
            padding: 3px 6px;
            border-radius: 50%;
        }

        /* USER DROPDOWN */
        .user-toggle {
            color: #ffffff !important;
            font-weight: 600;
        }

        .dropdown-menu {
            border-radius: 14px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        /* CONTENT */
        .content-wrapper {
            min-height: calc(100vh - 80px);
            padding-bottom: 40px;
        }
    </style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark sticky-top px-4">
    <a class="navbar-brand" href="/user">
        WARJA
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
        @auth
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('user') ? 'active' : '' }}" href="/user">
                    <i class="bi bi-house"></i> Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('menu*') ? 'active' : '' }}" href="/menu">
                    <i class="bi bi-grid"></i> Menu
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('orders*') ? 'active' : '' }}" href="/orders">
                    <i class="bi bi-receipt"></i> Pesanan
                </a>
            </li>
        </ul>

        {{-- RIGHT --}}
        <div class="d-flex align-items-center">
            {{-- CART --}}
            <a href="/cart" class="cart-icon">
                <i class="bi bi-cart3"></i>
                {{-- contoh badge --}}
                {{-- <span class="cart-badge">3</span> --}}
            </a>

            {{-- USER --}}
            <div class="dropdown">
                <a class="dropdown-toggle user-toggle text-decoration-none"
                   href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i>
                    {{ auth()->user()->name }}
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endauth
    </div>
</nav>

{{-- ALERT --}}
@if(session('success'))
<div class="container mt-3">
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

{{-- CONTENT --}}
<div class="container mt-4 content-wrapper">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

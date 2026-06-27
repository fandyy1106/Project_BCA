<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Project BCA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f7fb; }
        .sidebar { min-height: 100vh; background: linear-gradient(180deg, #005EAA 0%, #003e7a 100%); }
        .sidebar a { color: rgba(255,255,255,.86); text-decoration: none; display: block; padding: .75rem 1rem; border-radius: .75rem; margin-bottom: .25rem; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,.18); color: #fff; }
        .content-card { border: 0; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0,0,0,.06); }
        .table td, .table th { vertical-align: middle; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <aside class="col-lg-2 sidebar p-3 position-fixed d-none d-lg-block">
            <h4 class="text-white fw-bold mb-4">Admin BCA</h4>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">Artikel/Berita</a>
            <a href="{{ route('admin.company.edit') }}" class="{{ request()->routeIs('admin.company.*') ? 'active' : '' }}">Profil Perusahaan</a>
            <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">Produk/Layanan</a>
            <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">Galeri</a>
            <a href="{{ route('admin.reports.products.pdf') }}" target="_blank">Cetak Report PDF</a>
            <hr class="border-light opacity-25">
            <a href="{{ route('home') }}" target="_blank">Lihat Website</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-2">
                @csrf
                <button class="btn btn-light text-primary fw-bold w-100 rounded-pill" type="submit">Logout</button>
            </form>
        </aside>

        <main class="col-lg-10 ms-auto p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-0">@yield('page-title', 'Dashboard')</h2>
                    <small class="text-muted">Login sebagai {{ session('admin_user_name') }}</small>
                </div>
                <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">Menu</button>
            </div>

            @include('admin.partials.alert')
            @yield('content')
        </main>
    </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Admin BCA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <a class="d-block mb-2" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="d-block mb-2" href="{{ route('admin.articles.index') }}">Artikel/Berita</a>
        <a class="d-block mb-2" href="{{ route('admin.company.edit') }}">Profil Perusahaan</a>
        <a class="d-block mb-2" href="{{ route('admin.products.index') }}">Produk/Layanan</a>
        <a class="d-block mb-2" href="{{ route('admin.galleries.index') }}">Galeri</a>
        <a class="d-block mb-2" href="{{ route('admin.reports.products.pdf') }}" target="_blank">Report PDF</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

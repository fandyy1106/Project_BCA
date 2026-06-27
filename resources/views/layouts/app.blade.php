<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website BCA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    
        body { 
            padding-top: 61px; 
            display: flex; 
            flex-direction: column; 
            min-height: 100vh; 
        }
        .navbar-bca { background-color: #005EAA; }
        .navbar-bca .nav-link { color: rgba(255,255,255,0.8) !important; transition: 0.3s; }
        .navbar-bca .nav-link:hover { color: #ffffff !important; }
        main { flex: 1; }
    </style>
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
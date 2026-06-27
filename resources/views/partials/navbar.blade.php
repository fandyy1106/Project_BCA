<nav class="navbar navbar-expand-lg navbar-bca fixed-top shadow-sm">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="Logo BCA" height="35" style="filter: brightness(0) invert(1);">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-semibold align-items-lg-center">
                <li class="nav-item"><a class="nav-link px-3" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="{{ route('product') }}">Product</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="{{ route('contact') }}">Contact</a></li>
                <li class="nav-item ms-lg-2">
                    @if(session()->has('admin_user_id'))
                        <a class="btn btn-light text-primary fw-bold px-4 rounded-pill" href="{{ route('admin.dashboard') }}">Admin</a>
                    @else
                        <a class="btn btn-light text-primary fw-bold px-4 rounded-pill" href="{{ route('login') }}">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

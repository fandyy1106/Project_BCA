@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-primary">Login Admin</h3>
                        <p class="text-muted">Masuk untuk mengelola website Company Profile</p>
                    </div>

                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{ old('email') }}" placeholder="admin@project.test" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Masukkan password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold">LOGIN</button>
                    </form>
                </div>
            </div>
            <div class="alert alert-info mt-4 border-0 shadow-sm text-center" style="font-size: .9rem;">
                Akun demo: <strong>admin@project.test</strong> | Password: <strong>password123</strong>
            </div>
        </div>
    </div>
</div>
@endsection

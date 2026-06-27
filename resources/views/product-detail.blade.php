@extends('layouts.app')

@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product') }}" class="text-decoration-none">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->nama }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm p-4 p-md-5">
                <h2 class="text-primary fw-bold mb-3">{{ $product->nama }}</h2>
                <hr class="mb-4">
                
                <p class="fs-5 text-secondary" style="line-height: 1.8;">
                    {{ $product->deskripsi_lengkap }}
                </p>
                
                <div class="bg-light p-4 rounded-3 mt-4">
                    <h5 class="fw-bold mb-3">Fitur & Keunggulan:</h5>
                    <ul class="mb-0">
                        @foreach($product->fitur as $fitur)
                            <li class="mb-2">{{ $fitur }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="mt-5 d-flex gap-3">
                    <a href="{{ route('product') }}" class="btn btn-light border px-4 rounded-pill">Kembali</a>
                    <a href="{{ route('contact') }}" class="btn btn-primary px-4 rounded-pill">Tanya CS Halo BCA</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
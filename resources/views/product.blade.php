@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Produk & Layanan BCA</h2>
        <p class="text-muted">Temukan solusi perbankan yang tepat untuk kebutuhan Anda.</p>
    </div>

    <div class="row">
        @foreach($products as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 overflow-hidden">
                

                @if($item->gambar)
                    <img src="{{ asset($item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height:200px;">Tidak ada gambar</div>
                @endif
                
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-dark">{{ $item->nama }}</h5>
                    <p class="card-text text-muted mb-4">{{ $item->deskripsi_singkat }}</p>
                    
                    <a href="{{ route('product.detail', $item->id) }}" class="btn btn-outline-primary mt-auto rounded-pill w-100">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
        @if($products->isEmpty())
            <div class="col-12 text-center text-muted py-5">Belum ada produk yang ditampilkan.</div>
        @endif
    </div>
</div>
@endsection
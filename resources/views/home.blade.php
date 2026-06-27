@extends('layouts.app')

@section('content')
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" class="d-block w-100" alt="Banner 1" style="height: 60vh; object-fit: cover; filter: brightness(0.6);">
            <div class="carousel-caption d-none d-md-block text-start" style="bottom: 30%;">
                <h1 class="display-4 fw-bold">Senantiasa di Sisi Anda</h1>
                <p class="fs-5">Solusi perbankan terpercaya untuk setiap langkah hidup Anda.</p>
                <a href="{{ route('product') }}" class="btn btn-primary btn-lg rounded-pill px-4 mt-3">Jelajahi Produk</a>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Promo & Berita Terbaru</h2>
        <p class="text-muted">Konten ini dapat dikelola melalui halaman administrator.</p>
    </div>

    <div class="row">
        @forelse($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    @if($article->image)
                        <img src="{{ asset($article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Berita" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">Berita</span>
                        <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                        <p class="card-text text-muted">{{ $article->excerpt }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Promo KPR" style="height: 200px; object-fit: cover;">
                    <div class="card-body"><span class="badge bg-warning text-dark mb-2">Spesial KPR</span><h5 class="card-title fw-bold">Bunga Spesial KPR</h5><p class="card-text text-muted">Kelola berita terbaru melalui menu Artikel di admin.</p></div>
                </div>
            </div>
        @endforelse
    </div>

    @if($galleries->count())
        <div class="text-center my-5">
            <h2 class="fw-bold text-primary">Galeri</h2>
            <p class="text-muted">Dokumentasi layanan dan kegiatan perusahaan.</p>
        </div>
        <div class="row g-3">
            @foreach($galleries as $gallery)
                <div class="col-md-4"><img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid rounded shadow-sm" style="height:210px;width:100%;object-fit:cover"></div>
            @endforeach
        </div>
    @endif
</div>
@endsection

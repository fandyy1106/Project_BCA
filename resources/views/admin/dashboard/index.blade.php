@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Admin')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3"><div class="card content-card"><div class="card-body"><p class="text-muted mb-1">Produk/Layanan</p><h3 class="fw-bold text-primary">{{ $productCount }}</h3></div></div></div>
    <div class="col-md-3"><div class="card content-card"><div class="card-body"><p class="text-muted mb-1">Artikel/Berita</p><h3 class="fw-bold text-success">{{ $articleCount }}</h3></div></div></div>
    <div class="col-md-3"><div class="card content-card"><div class="card-body"><p class="text-muted mb-1">Galeri</p><h3 class="fw-bold text-warning">{{ $galleryCount }}</h3></div></div></div>
    <div class="col-md-3"><div class="card content-card"><div class="card-body"><p class="text-muted mb-1">Profil Perusahaan</p><h3 class="fw-bold text-info">{{ $profileCount }}</h3></div></div></div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card content-card">
            <div class="card-header bg-white fw-bold">Menu Pengelolaan Sistem</div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-primary text-start">+ Tambah Artikel/Berita</a>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-outline-primary text-start">+ Tambah Produk/Layanan</a>
                    <a href="{{ route('admin.galleries.create') }}" class="btn btn-outline-primary text-start">+ Tambah Galeri</a>
                    <a href="{{ route('admin.company.edit') }}" class="btn btn-outline-primary text-start">Ubah Profil Perusahaan</a>
                    <a href="{{ route('admin.reports.products.pdf') }}" target="_blank" class="btn btn-primary text-start">Cetak Report PDF Produk</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card content-card">
            <div class="card-header bg-white fw-bold">Data Terbaru</div>
            <div class="card-body">
                <h6 class="fw-bold">Artikel Terbaru</h6>
                <ul class="list-group list-group-flush mb-3">
                    @forelse($latestArticles as $article)
                        <li class="list-group-item px-0">{{ $article->title }}</li>
                    @empty
                        <li class="list-group-item px-0 text-muted">Belum ada artikel.</li>
                    @endforelse
                </ul>
                <h6 class="fw-bold">Produk Terbaru</h6>
                <ul class="list-group list-group-flush">
                    @forelse($latestProducts as $product)
                        <li class="list-group-item px-0">{{ $product->nama }}</li>
                    @empty
                        <li class="list-group-item px-0 text-muted">Belum ada produk.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

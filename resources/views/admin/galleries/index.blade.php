@extends('admin.layouts.app')

@section('title', 'Galeri')
@section('page-title', 'Kelola Galeri')

@section('content')
<div class="card content-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <strong>Data Galeri</strong>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="row g-4">
            @forelse($galleries as $gallery)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ asset($gallery->image) }}" class="card-img-top" style="height:170px;object-fit:cover" alt="{{ $gallery->title }}">
                        <div class="card-body">
                            <h6 class="fw-bold">{{ $gallery->title }}</h6>
                            <p class="text-muted small">{{ \Illuminate\Support\Str::limit($gallery->description, 90) }}</p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-warning btn-sm">Ubah</a>
                                <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Hapus galeri ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">Belum ada data galeri.</div>
            @endforelse
        </div>
        <div class="mt-4">{{ $galleries->links() }}</div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Produk')
@section('page-title', 'Kelola Produk/Layanan')

@section('content')
<div class="card content-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <strong>Data Produk/Layanan</strong>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.reports.products.pdf') }}" target="_blank" class="btn btn-outline-danger btn-sm">Cetak PDF Real</a>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-hover align-middle">
            <thead><tr><th>No</th><th>Gambar</th><th>Nama</th><th>Deskripsi</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                        <td>@if($product->gambar)<img src="{{ asset($product->gambar) }}" style="width:72px;height:50px;object-fit:cover" class="rounded">@endif</td>
                        <td class="fw-semibold">{{ $product->nama }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($product->deskripsi_singkat, 80) }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">Ubah</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">Belum ada data produk.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
@endsection

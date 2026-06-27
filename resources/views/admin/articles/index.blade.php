@extends('admin.layouts.app')

@section('title', 'Artikel')
@section('page-title', 'Kelola Artikel/Berita')

@section('content')
<div class="card content-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <strong>Data Artikel/Berita</strong>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-hover align-middle">
            <thead><tr><th>No</th><th>Gambar</th><th>Judul</th><th>Status</th><th>Tanggal</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse($articles as $article)
                    <tr>
                        <td>{{ $loop->iteration + ($articles->currentPage() - 1) * $articles->perPage() }}</td>
                        <td>@if($article->image)<img src="{{ asset($article->image) }}" style="width:72px;height:50px;object-fit:cover" class="rounded">@endif</td>
                        <td><strong>{{ $article->title }}</strong><br><small class="text-muted">{{ \Illuminate\Support\Str::limit($article->excerpt, 70) }}</small></td>
                        <td><span class="badge {{ $article->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ $article->status }}</span></td>
                        <td>{{ optional($article->published_at)->format('d-m-Y H:i') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-warning btn-sm">Ubah</a>
                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted">Belum ada artikel.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $articles->links() }}
    </div>
</div>
@endsection

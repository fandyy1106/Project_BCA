@csrf
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label fw-semibold">Judul Artikel/Berita</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $article->title ?? '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Status</label>
        <select name="status" class="form-select" required>
            @foreach(['published' => 'Published', 'draft' => 'Draft'] as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $article->status ?? 'published') === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Tanggal Publikasi</label>
        <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', isset($article) && $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Gambar</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    @isset($article)
        @if($article->image)
            <div class="col-12"><img src="{{ asset($article->image) }}" alt="{{ $article->title }}" style="max-height:120px" class="rounded shadow-sm"></div>
        @endif
    @endisset
    <div class="col-12">
        <label class="form-label fw-semibold">Ringkasan</label>
        <textarea name="excerpt" class="form-control" rows="3" required>{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Isi Artikel</label>
        <textarea name="content" class="form-control" rows="8" required>{{ old('content', $article->content ?? '') }}</textarea>
    </div>
</div>
<div class="mt-4 d-flex gap-2">
    <button class="btn btn-primary px-4" type="submit">Simpan</button>
    <a href="{{ route('admin.articles.index') }}" class="btn btn-light border">Kembali</a>
</div>

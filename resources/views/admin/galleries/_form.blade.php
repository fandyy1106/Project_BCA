@csrf
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label fw-semibold">Judul Galeri</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title ?? '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Gambar</label>
        <input type="file" name="image" class="form-control" accept="image/*" {{ isset($gallery) ? '' : 'required' }}>
    </div>
    @isset($gallery)
        @if($gallery->image)
            <div class="col-12"><img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" style="max-height:120px" class="rounded shadow-sm"></div>
        @endif
    @endisset
    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description', $gallery->description ?? '') }}</textarea>
    </div>
</div>
<div class="mt-4 d-flex gap-2">
    <button class="btn btn-primary px-4" type="submit">Simpan</button>
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-light border">Kembali</a>
</div>

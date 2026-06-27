@csrf
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label fw-semibold">Nama Produk/Layanan</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $product->nama ?? '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Gambar</label>
        <input type="file" name="gambar" class="form-control" accept="image/*">
    </div>
    @isset($product)
        @if($product->gambar)
            <div class="col-12"><img src="{{ asset($product->gambar) }}" alt="{{ $product->nama }}" style="max-height:120px" class="rounded shadow-sm"></div>
        @endif
    @endisset
    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi Singkat</label>
        <textarea name="deskripsi_singkat" class="form-control" rows="3" required>{{ old('deskripsi_singkat', $product->deskripsi_singkat ?? '') }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi Lengkap</label>
        <textarea name="deskripsi_lengkap" class="form-control" rows="5" required>{{ old('deskripsi_lengkap', $product->deskripsi_lengkap ?? '') }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Fitur dan Keunggulan</label>
        <textarea name="fitur" class="form-control" rows="5" required>{{ old('fitur', isset($product) ? implode("\n", $product->fitur ?? []) : '') }}</textarea>
        <small class="text-muted">Tulis satu fitur per baris.</small>
    </div>
</div>
<div class="mt-4 d-flex gap-2">
    <button class="btn btn-primary px-4" type="submit">Simpan</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-light border">Kembali</a>
</div>

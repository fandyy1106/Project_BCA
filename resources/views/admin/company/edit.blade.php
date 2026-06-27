@extends('admin.layouts.app')

@section('title', 'Profil Perusahaan')
@section('page-title', 'Kelola Profil Perusahaan')

@section('content')
<div class="card content-card"><div class="card-body">
    <form action="{{ route('admin.company.update') }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" class="form-control" value="{{ old('nama_perusahaan', $profile->nama_perusahaan) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Tagline</label>
                <input type="text" name="tagline" class="form-control" value="{{ old('tagline', $profile->tagline) }}">
            </div>
            <div class="col-12">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $profile->deskripsi) }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Visi</label>
                <textarea name="visi" class="form-control" rows="4">{{ old('visi', $profile->visi) }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Misi</label>
                <textarea name="misi" class="form-control" rows="4">{{ old('misi', $profile->misi) }}</textarea>
                <small class="text-muted">Tulis satu misi per baris.</small>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $profile->alamat) }}</textarea>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-semibold">Telepon</label>
                <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $profile->telepon) }}">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $profile->email) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Logo</label>
                <input type="file" name="logo" class="form-control" accept="image/*">
            </div>
            @if($profile->logo)
                <div class="col-12"><img src="{{ asset($profile->logo) }}" style="max-height:90px" class="rounded shadow-sm" alt="Logo"></div>
            @endif
        </div>
        <div class="mt-4"><button class="btn btn-primary px-4">Simpan Profil</button></div>
    </form>
</div></div>
@endsection

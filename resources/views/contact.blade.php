@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4">Hubungi Kami</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-7 mb-4 mb-md-0">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label text-muted">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-muted">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" required>
                </div>
                <div class="mb-4">
                    <label for="pesan" class="form-label text-muted">Pesan</label>
                    <textarea name="pesan" class="form-control" id="pesan" rows="6" placeholder="Tulis pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary px-4 py-2">Kirim Pesan</button>
            </form>
        </div>
        <div class="col-md-5">
            <div class="card border-0 rounded-3" style="background-color: #f8f9fa;">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-primary mb-1">Halo BCA</h5>
                    <p class="fs-4 text-dark mb-4">{{ $profile->telepon ?? '1500888' }}</p>
                    <h5 class="fw-bold text-primary mb-1">Email</h5>
                    <p class="fs-5 text-dark mb-4">{{ $profile->email ?? 'halobca@bca.co.id' }}</p>
                    <h5 class="fw-bold text-primary mb-1">Alamat</h5>
                    <p class="text-dark mb-0">{{ $profile->alamat ?? 'Menara BCA, Grand Indonesia, Jakarta' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

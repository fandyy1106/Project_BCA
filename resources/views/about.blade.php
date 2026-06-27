@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-5 mb-5" style="background: linear-gradient(90deg, #005EAA 0%, #0077c8 100%);">
    <div class="container py-4">
        <h1 class="display-4 fw-bold">Tentang {{ $profile->nama_perusahaan ?? 'BCA' }}</h1>
        <p class="fs-4">{{ $profile->tagline ?? 'Senantiasa di Sisi Anda, Membangun Indonesia yang Lebih Baik.' }}</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-7 mb-4">
            <h3 class="text-primary fw-bold border-bottom pb-2 mb-3">Profil Perusahaan</h3>
            <p style="text-align: justify; line-height: 1.8; color: #555;">
                {{ $profile->deskripsi ?? 'PT Bank Central Asia Tbk (BCA) merupakan salah satu bank swasta terbesar di Indonesia yang menyediakan layanan perbankan serta solusi finansial bagi masyarakat.' }}
            </p>
        </div>
        <div class="col-md-5 mb-4">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body p-4">
                    <h4 class="fw-bold text-dark mb-3">Visi Kami</h4>
                    <p class="text-muted">{{ $profile->visi ?? 'Menjadi bank pilihan utama andalan masyarakat.' }}</p>
                    <h4 class="fw-bold text-dark mb-3 mt-4">Misi Kami</h4>
                    <ul class="text-muted ps-3">
                        @foreach(preg_split('/\r\n|\r|\n/', $profile->misi ?? 'Membangun institusi yang unggul di bidang solusi keuangan.\nMemahami kebutuhan nasabah dan memberikan layanan finansial yang tepat.\nMeningkatkan nilai stakeholder.') as $misi)
                            @if(trim($misi) !== '')
                                <li class="mb-2">{{ $misi }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-warning mt-4 border-start border-4 border-warning shadow-sm">
        <h5 class="alert-heading fw-bold">Catatan Akademik:</h5>
        <p class="mb-0">Website ini adalah proyek simulasi portofolio untuk pembelajaran framework <strong>Laravel</strong>.</p>
    </div>
</div>
@endsection

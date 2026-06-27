@extends('admin.layouts.app')

@section('title', 'Ubah Produk')
@section('page-title', 'Ubah Produk/Layanan')

@section('content')
<div class="card content-card"><div class="card-body">
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.products._form')
    </form>
</div></div>
@endsection

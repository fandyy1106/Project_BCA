@extends('admin.layouts.app')

@section('title', 'Tambah Galeri')
@section('page-title', 'Tambah Galeri')

@section('content')
<div class="card content-card"><div class="card-body">
    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.galleries._form')
    </form>
</div></div>
@endsection

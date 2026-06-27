@extends('admin.layouts.app')

@section('title', 'Ubah Galeri')
@section('page-title', 'Ubah Galeri')

@section('content')
<div class="card content-card"><div class="card-body">
    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.galleries._form')
    </form>
</div></div>
@endsection

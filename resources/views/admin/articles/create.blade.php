@extends('admin.layouts.app')

@section('title', 'Tambah Artikel')
@section('page-title', 'Tambah Artikel/Berita')

@section('content')
<div class="card content-card"><div class="card-body">
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.articles._form')
    </form>
</div></div>
@endsection

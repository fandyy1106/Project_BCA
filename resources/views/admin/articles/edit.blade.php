@extends('admin.layouts.app')

@section('title', 'Ubah Artikel')
@section('page-title', 'Ubah Artikel/Berita')

@section('content')
<div class="card content-card"><div class="card-body">
    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.articles._form')
    </form>
</div></div>
@endsection

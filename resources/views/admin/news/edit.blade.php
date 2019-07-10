@extends('layouts.auth')

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Liste des actualités</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $news->name }}</li>
        </ol>
    </nav>
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-user-plus fa-stack-1x text-light"></i>
        </span>
        Modifier une actualité
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous pouvez ici modifier une actualité de l'application.</p>
    <form action="{{ route('admin.news.update', $news->id) }}" method="post" class="pt-3">
        @csrf
        <div class="form-group">
            <label for="title" class="control-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="description" class="control-label">Description</label>
            <textarea name="description" id="description" class="form-control" required>{!! $news->description !!}</textarea>
        </div>
        <div class="form-group"><button class="btn btn-primary">Modifier</button></div>
    </form>
@endsection

@section('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        var quill = new Quill('#description', {
            theme: 'bubble'
        });
    </script>
@endsection
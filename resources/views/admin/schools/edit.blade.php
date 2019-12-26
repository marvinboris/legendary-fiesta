@extends('layouts.auth')

@section('styles')
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.schools.index') }}">Liste des écoles</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $school->name }}</li>
        </ol>
    </nav>
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-hand-o-up fa-stack-1x text-light"></i>
        </span>
        Modifier une école
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous pouvez ici modifier une école de l'application.</p>
    <form action="{{ route('admin.schools.update', $school->id) }}" method="post" class="pt-3">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name" class="control-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $school->name }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="summernote" class="control-label">Description</label>
            <textarea name="description" id="summernote" class="form-control" required>{!! $school->description !!}</textarea>
        </div>
        <div class="form-group"><button class="btn btn-primary">Modifier</button></div>
    </form>
@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js" defer></script>
    <script>
        // var description = new Jodit('#description');
        window.addEventListener('load', function () {
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        });
    </script>
@endsection
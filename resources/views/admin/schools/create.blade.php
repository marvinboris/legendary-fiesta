@extends('layouts.auth')

@section('styles')
    {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.92/jodit.min.css"> --}}
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter une école</li>
        </ol>
    </nav>
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-hand-o-up fa-stack-1x text-light"></i>
        </span>
        Ajouter une école
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous pouvez ici créer une école et l'ajouter à l'application.</p>
    <form action="{{ route('admin.schools.store') }}" method="post" class="pt-3">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="summernote" class="control-label">Description</label>
            <textarea name="description" id="summernote" rows="10"></textarea>
            {{-- <div id="summernote"></div> --}}
        </div>
        <div class="form-group"><button class="btn btn-primary">Ajouter</button></div>
    </form>
@endsection

@section('scripts')
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.92/jodit.min.js"></script> --}}
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
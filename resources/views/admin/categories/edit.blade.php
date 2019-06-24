@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Liste des catégories</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
        </ol>
    </nav>
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-minus-circle fa-stack-1x text-light"></i>
        </span>
        Modifier une catégorie
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous pouvez ici modifier une de l'application.</p>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="post" class="pt-3">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name" class="control-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="condition" class="control-label">Condition</label>
            <input type="text" name="condition" id="condition" class="form-control" value="{{ $category->condition }}" required>
        </div>
        <div class="form-group"><button class="btn btn-primary">Modifier</button></div>
    </form>
@endsection
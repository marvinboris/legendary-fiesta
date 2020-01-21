@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.learners.index') }}">Liste des apprenants</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $learner->name }}</li>
        </ol>
    </nav>
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-user-plus fa-stack-1x text-light"></i>
        </span>
        Modifier un apprenant
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous pouvez ici modifier un apprenant de l'application.</p>
    <form action="{{ route('admin.learners.update', $learner->id) }}" method="post" class="pt-3">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name" class="control-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $learner->name }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="summernote" class="control-label">Rang</label>
            <input type="number" name="rank" id="rank" class="form-control" value="{{ $learner->rank }}" required>
        </div>
        <div class="form-group"><button class="btn btn-primary">Modifier</button></div>
    </form>
@endsection

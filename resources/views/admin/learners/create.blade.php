@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter un apprenant</li>
        </ol>
    </nav>
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-user-plus fa-stack-1x text-light"></i>
        </span>
        Ajouter un apprenant
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous pouvez ici créer un apprenant et l'ajouter à l'application.</p>
    <form action="{{ route('admin.learners.store') }}" method="post" class="pt-3">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="summernote" class="control-label">Rang</label>
            <input type="number" name="rank" id="rank" class="form-control" required>
        </div>
        <div class="form-group"><button class="btn btn-primary">Ajouter</button></div>
    </form>
@endsection
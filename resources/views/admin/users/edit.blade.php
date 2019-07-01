@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Liste des utilisateurs</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
        </ol>
    </nav>
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-user-plus fa-stack-1x text-light"></i>
        </span>
        Modifier un utilisateur
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous pouvez ici modifier un utilisateur de l'application.</p>
    <form action="{{ route('admin.users.update', $user->id) }}" method="post" class="pt-3">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name" class="control-label">Nom(s) & prénom(s)</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="role_id" class="control-label">Rôle</label>
            <select name="role_id" id="role_id" class="form-control" required>
                <option>Sélectionner un rôle</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $role->id === $user->role->id ? 'selected' : null }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Adresse mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="categories" class="control-label">Attribuer des cours</label>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-12 pb-2">
                    <label for="category-{{ $category->id }}" class="control-label w-100 border-bottom">{{ $category->name }}</label>
                    <div class="row m-0">
                        @foreach ($category->trainings as $training)
                            <div class="col-6 col-md-4 col-lg-3 custom-control custom-checkbox">
                                <input type="checkbox" name="trainings[]" class="custom-control-input" {{ in_array($training->id, $user_trainings) ? 'checked' : '' }} id="training-{{ $training->id }}" value="{{ $training->id }}">
                                <label for="training-{{ $training->id }}" class="custom-control-label">{{ $training->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group"><button class="btn btn-primary">Modifier</button></div>
    </form>
@endsection
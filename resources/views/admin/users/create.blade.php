@extends('layouts.auth')

@section('content')
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-user-plus fa-stack-1x text-light"></i>
        </span>
        Ajouter un utilisateur
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous pouvez ici créer un utilisateur et l'ajouter à l'application.</p>
    <form action="{{ route('admin.users.store') }}" method="post" class="pt-3">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label">Nom(s) & prénom(s)</label>
            <input type="text" name="name" id="name" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="role_id" class="control-label">Rôle</label>
            <select name="role_id" id="role_id" class="form-control" required>
                <option>Sélectionner un rôle</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Adresse mail</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group"><button class="btn btn-primary">Ajouter</button></div>
    </form>
@endsection
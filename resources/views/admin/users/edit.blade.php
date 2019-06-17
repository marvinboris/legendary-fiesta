@extends('layouts.auth')

@section('content')
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
            <label for="password" class="control-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="is_active" class="control-label">Statut</label>
            <div class="custom-control custom-radio">
                <input type="radio" name="is_active" id="inactive" class="custom-control-input" {{ $user->is_active === 0 ? 'checked' : null }} value="0">
                <label for="inactive" class="custom-control-label">Inactif</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" name="is_active" id="active" class="custom-control-input" {{ $user->is_active === 1 ? 'checked' : null }} value="1">
                <label for="active" class="custom-control-label">Actif</label>
            </div>
        </div>
        <div class="form-group"><button class="btn btn-primary">Modifier</button></div>
    </form>
@endsection
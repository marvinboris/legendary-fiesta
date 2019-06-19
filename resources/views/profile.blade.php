@extends('layouts.auth')

@section('content')
    @if (Session::has('edited_profile'))
        <div class="alert alert-primary">{{ session('edited_profile') }}</div>
    @endif
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-user-circle fa-stack-1x text-light"></i>
        </span>
        Mon profil
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous trouverez ici les paramètres de votre compte dans l'application.</p>
    @include('includes.errors')
    <form action="{{ route('profile.store') }}" method="post" class="pt-3">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label">Nom(s) & prénom(s)</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Adresse mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group border-top"></div>
        <div class="form-group text-muted small">
            <p>Ne modifiez les paramètres ci-dessous que si vous souhaitez modifier votre mot de passe.</p>
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Mot de passe actuel</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="new_password" class="control-label">Nouveau mot de passe</label>
            <input type="password" name="new_password" id="new_password" class="form-control">
        </div>
        <div class="form-group">
            <label for="new_password_confirmation" class="control-label">Confirmation nouveau mot de passe</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
        </div>
        <div class="form-group"><button class="btn btn-primary">Modifier</button></div>
    </form>
@endsection
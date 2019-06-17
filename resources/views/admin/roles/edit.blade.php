@extends('layouts.auth')

@section('content')
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-minus-square fa-stack-1x text-light"></i>
        </span>
        Modifier un rôle
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous pouvez ici modifier un rôle de l'application.</p>
    <form action="{{ route('admin.roles.update', $role->id) }}" method="post" class="pt-3">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name" class="control-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required autofocus>
        </div>
        <div class="form-group"><button class="btn btn-primary">Modifier</button></div>
    </form>
@endsection
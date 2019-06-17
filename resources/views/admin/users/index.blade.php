@extends('layouts.auth')

@section('content')
    @if (Session::has('created_user'))
        <div class="alert alert-success">{{ session('created_user') }}</div>
    @endif
    @if (Session::has('updated_user'))
        <div class="alert alert-primary">{{ session('updated_user') }}</div>
    @endif
    @if (Session::has('deleted_user'))
        <div class="alert alert-danger">{{ session('deleted_user') }}</div>
    @endif
    @if (Session::has('deleted_users'))
        @foreach (session('deleted_users') as $user)
            <div class="alert alert-danger">L'utilisateur {{ $user->name }} a été supprimé.</div>
        @endforeach
    @endif
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-users fa-stack-1x text-light"></i>
        </span>
        Liste des utilisateurs
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous trouverez ici la liste complète des utilisateurs de l'application.</p>
    <form action="{{ route('admin.users.multi-delete') }}" method="post" class="pt-3">
        @csrf
        @method('delete')
        <div class="form-group"><button class="btn btn-danger">Supprimer</button></div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            <input type="checkbox" name="all" id="select-all">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Nom(s) & prénom(s)</th>
                        <th scope="col">Adresse mail</th>
                        <th scope="col">Rôle</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Créé</th>
                        <th scope="col">Modifié</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">
                                <input type="checkbox" name="checkboxArray[]" class="checkbox" value="{{ $user->id }}">
                            </th>
                            <th scope="row">{{ $user->id }}</th>
                            <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{!! $user->is_active ? '<span class=" font-weight-bold text-success">Actif</span>' : '<span class=" font-weight-bold text-danger">Inactif</span>' !!}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
@endsection

@section('scripts')
    @include('includes.multi-delete-script')
@endsection
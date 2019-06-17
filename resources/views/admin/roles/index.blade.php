@extends('layouts.auth')

@section('content')
    @if (Session::has('created_role'))
        <div class="alert alert-success">{{ session('created_role') }}</div>
    @endif
    @if (Session::has('updated_role'))
        <div class="alert alert-primary">{{ session('updated_role') }}</div>
    @endif
    @if (Session::has('deleted_role'))
        <div class="alert alert-danger">{{ session('deleted_role') }}</div>
    @endif
    @if (Session::has('deleted_roles'))
        @foreach (session('deleted_roles') as $role)
            <div class="alert alert-danger">Le rôle {{ $role->name }} a été supprimé.</div>
        @endforeach
    @endif
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-square fa-stack-1x text-light"></i>
        </span>
        Liste des rôles
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous trouverez ici la liste complète des rôles de l'application.</p>
    <form action="{{ route('admin.roles.multi-delete') }}" class="pt-3" method="post">
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
                        <th scope="col">Nom</th>
                        <th scope="col">Créé</th>
                        <th scope="col">Edité</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <th scope="row">
                                <input type="checkbox" name="checkboxArray[]" class="checkboxes" value="{{ $role->id }}">
                            </th>
                            <th scope="row">{{ $role->id }}</th>
                            <td><a href="{{ route('admin.roles.edit', $role->id) }}">{{ $role->name }}</a></td>
                            <td>{{ $role->created_at->diffForHumans() }}</td>
                            <td>{{ $role->updated_at->diffForHumans() }}</td>
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
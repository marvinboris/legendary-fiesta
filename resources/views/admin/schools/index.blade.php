@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des écoles</li>
        </ol>
    </nav>
    @if (Session::has('created_school'))
        <div class="alert alert-success">{{ session('created_school') }}</div>
    @endif
    @if (Session::has('updated_school'))
        <div class="alert alert-primary">{{ session('updated_school') }}</div>
    @endif
    @if (Session::has('deleted_school'))
        <div class="alert alert-danger">{{ session('deleted_school') }}</div>
    @endif
    @if (Session::has('deleted_schools'))
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach (session('deleted_schools') as $school)
                <li>L'école {{ $school->name }} a été supprimée.</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-handshake-o fa-stack-1x text-light"></i>
        </span>
        Liste des écoles
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous trouverez ici la liste complète des écoles de l'application.</p>
    <form action="{{ route('admin.schools.multi-delete') }}" method="post" class="pt-3">
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
                        <th scope="col">Description</th>
                        <th scope="col">Créé</th>
                        <th scope="col">Modifié</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schools as $school)
                        <tr>
                            <th scope="row">
                                <input type="checkbox" name="checkboxArray[]" class="checkbox" value="{{ $school->id }}">
                            </th>
                            <th scope="row">{{ $school->id }}</th>
                            <td><a href="{{ route('admin.schools.edit', $school->id) }}">{{ $school->name }}</a></td>
                            <td>{!! str_limit($school->description) !!}</td>
                            <td>{{ $school->created_at->diffForHumans() }}</td>
                            <td>{{ $school->updated_at->diffForHumans() }}</td>
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
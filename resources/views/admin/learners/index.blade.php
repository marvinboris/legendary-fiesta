@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des apprenants</li>
        </ol>
    </nav>
    @if (Session::has('created_learner'))
        <div class="alert alert-success">{{ session('created_learner') }}</div>
    @endif
    @if (Session::has('updated_learner'))
        <div class="alert alert-primary">{{ session('updated_learner') }}</div>
    @endif
    @if (Session::has('deleted_learner'))
        <div class="alert alert-danger">{{ session('deleted_learner') }}</div>
    @endif
    @if (Session::has('deleted_learners'))
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach (session('deleted_learners') as $learner)
                <li>L'apprenant {{ $learner->name }} a été supprimé.</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-handshake-o fa-stack-1x text-light"></i>
        </span>
        Liste des apprenants
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous trouverez ici la liste complète des apprenants de l'application.</p>
    <form action="{{ route('admin.learners.multi-delete') }}" method="post" class="pt-3">
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
                        <th scope="col">Rang</th>
                        <th scope="col">Créé</th>
                        <th scope="col">Modifié</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($learners as $learner)
                        <tr>
                            <th scope="row">
                                <input type="checkbox" name="checkboxArray[]" class="checkbox" value="{{ $learner->id }}">
                            </th>
                            <th scope="row">{{ $learner->id }}</th>
                            <td><a href="{{ route('admin.learners.edit', $learner->id) }}">{{ $learner->name }}</a></td>
                            <td>{{ $learner->rank }}</td>
                            <td>{{ $learner->created_at->diffForHumans() }}</td>
                            <td>{{ $learner->updated_at->diffForHumans() }}</td>
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
@extends('layouts.auth')

@section('content')
    @if (Session::has('created_training'))
    <div class="alert alert-success">{{ session('created_training') }}</div>
    @endif
    @if (Session::has('updated_training'))
    <div class="alert alert-primary">{{ session('updated_training') }}</div>
    @endif
    @if (Session::has('deleted_training'))
    <div class="alert alert-danger">{{ session('deleted_training') }}</div>
    @endif
    @if (Session::has('deleted_trainings'))
    @foreach (session('deleted_trainings') as $training)
        <div class="alert alert-danger">La catégorie {{ $training->name }} a été supprimée.</div>
    @endforeach
    @endif
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-shopping-cart fa-stack-1x text-light"></i>
        </span>
        Liste des formations
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous trouverez ici la liste complète des formations de l'application.</p>
    <form action="{{ route('admin.trainings.multi-delete') }}" method="post" class="pt-3">
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
                        <th scope="col">Categorie</th>
                        <th scope="col">Coût</th>
                        <th scope="col">Durée</th>
                        <th scope="col">Théorie</th>
                        <th scope="col">Pratique</th>
                        <th scope="col">Créé</th>
                        <th scope="col">Edité</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trainings as $training)
                        <tr>
                            <th scope="row">
                                <input type="checkbox" name="checkboxArray[]" class="checkbox" value="{{ $training->id }}">
                            </th>
                            <th scope="row">{{ $training->id }}</th>
                            <td><a href="{{ route('admin.trainings.edit', $training->id) }}">{{ $training->name }}</a></td>
                            <td>{{ $training->category->name }}</td>
                            <td>{{ $training->cost }}</td>
                            <td>{{ $training->duration }}</td>
                            <td>{{ $training->theory }}</td>
                            <td>{{ $training->practice }}</td>
                            <td>{{ $training->created_at->diffForHumans() }}</td>
                            <td>{{ $training->updated_at->diffForHumans() }}</td>
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
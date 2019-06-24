@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des catégories</li>
        </ol>
    </nav>
    @if (Session::has('created_category'))
        <div class="alert alert-success">{{ session('created_category') }}</div>
    @endif
    @if (Session::has('updated_category'))
        <div class="alert alert-primary">{{ session('updated_category') }}</div>
    @endif
    @if (Session::has('deleted_category'))
        <div class="alert alert-danger">{{ session('deleted_category') }}</div>
    @endif
    @if (Session::has('deleted_categories'))
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach (session('deleted_categories') as $category)
                    <li>La catégorie {{ $category->name }} a été supprimée.</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-circle fa-stack-1x text-light"></i>
        </span>
        Liste des catégories
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous trouverez ici la liste complète des catégories de l'application.</p>
    <form action="{{ route('admin.categories.multi-delete') }}" method="post" class="pt-3">
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
                        <th scope="col">Condition</th>
                        <th scope="col">Créé</th>
                        <th scope="col">Edité</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">
                                <input type="checkbox" name="checkboxArray[]" value="{{ $category->id }}">
                            </th>
                            <th scope="row">{{ $category->id }}</th>
                            <td><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                            <td>{{ $category->condition }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>
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
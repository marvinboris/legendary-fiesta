@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des actualités</li>
        </ol>
    </nav>
    @if (Session::has('created_new'))
        <div class="alert alert-success">{{ session('created_new') }}</div>
    @endif
    @if (Session::has('updated_new'))
        <div class="alert alert-primary">{{ session('updated_new') }}</div>
    @endif
    @if (Session::has('deleted_new'))
        <div class="alert alert-danger">{{ session('deleted_new') }}</div>
    @endif
    @if (Session::has('deleted_news'))
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach (session('deleted_news') as $new)
                <li>L'actualité {{ $new->title }} a été supprimée.</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-news fa-stack-1x text-light"></i>
        </span>
        Liste des actualités
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous trouverez ici la liste complète des actualités de l'application.</p>
    <form action="{{ route('admin.news.multi-delete') }}" method="post" class="pt-3">
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
                        <th scope="col">Titre</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Description</th>
                        <th scope="col">Créé</th>
                        <th scope="col">Modifié</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $new)
                        <tr>
                            <th scope="row">
                                <input type="checkbox" name="checkboxArray[]" class="checkbox" value="{{ $new->id }}">
                            </th>
                            <th scope="row">{{ $new->id }}</th>
                            <td><a href="{{ route('admin.news.edit', $new->id) }}">{{ $new->title }}</a></td>
                            <td>{{ $new->user->name }}</td>
                            <td>{!! str_limit($new->description) !!}</td>
                            <td>{{ $new->created_at->diffForHumans() }}</td>
                            <td>{{ $new->updated_at->diffForHumans() }}</td>
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
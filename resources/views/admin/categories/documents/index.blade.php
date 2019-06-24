@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des documents</li>
        </ol>
    </nav>
    @if (Session::has('created_document'))
        <div class="alert alert-success">{{ session('created_document') }}</div>
    @endif
    @if (Session::has('updated_document'))
        <div class="alert alert-primary">{{ session('updated_document') }}</div>
    @endif
    @if (Session::has('deleted_document'))
        <div class="alert alert-danger">{{ session('deleted_document') }}</div>
    @endif
    @if (Session::has('deleted_documents'))
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach (session('deleted_documents') as $document)
                <li>Le document {{ $document->name }} a été supprimé.</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-files-o fa-stack-1x text-light"></i>
        </span>
        Liste des documents
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous trouverez ici la liste complète des documents de l'application.</p>
    <form action="{{ route('admin.categories.documents.multi-delete') }}" method="post" class="pt-3">
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
                    @foreach ($documents as $document)
                        <tr>
                            <th scope="row">
                                <input type="checkbox" name="checkboxArray[]" class="checkbox" value="{{ $document->id }}">
                            </th>
                            <th scope="row">{{ $document->id }}</th>
                            <td><a href="{{ route('admin.categories.documents.edit', $document->id) }}">{{ $document->name }}</a></td>
                            <td>{{ $document->created_at->diffForHumans() }}</td>
                            <td>{{ $document->updated_at->diffForHumans() }}</td>
                            <td><a href="{{ url('/') . '/documents/' . $document->path }}" class="fa fa-download fa-2x"></a></td>
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
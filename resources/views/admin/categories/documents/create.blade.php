@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter un document</li>
        </ol>
    </nav>
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-file fa-stack-1x text-light"></i>
        </span>
        Ajouter un document
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous pouvez ici créer un document et l'ajouter à l'application.</p>
    <form action="{{ route('admin.categories.documents.store') }}" method="post" class="pt-3" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="path" class="control-label">Document</label>
            <div class="custom-file">
                <input type="file" name="path" id="path" class="custom-file-input" required>
                <label for="path" class="custom-file-label">Choisir le document</label>
            </div>
        </div>
        <div class="form-group">
            <label for="categories" class="control-label">Catégories de permis concernées</label>
            <div class="row m-0">
                @foreach ($categories as $category)
                    <div class="col-6 col-md-4 col-lg-3 custom-control custom-checkbox">
                        <input type="checkbox" name="categories[]" class="custom-control-input" id="category_{{ $category->id }}" value="{{ $category->id }}">
                        <label for="category_{{ $category->id }}" class="custom-control-label">{{ $category->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-group"><button class="btn btn-primary">Ajouter</button></div>
    </form>
@endsection
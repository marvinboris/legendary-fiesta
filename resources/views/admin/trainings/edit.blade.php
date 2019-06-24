@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.trainings.index') }}">Liste des formations</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $training->name }}</li>
        </ol>
    </nav>
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-cart-arrow-down fa-stack-1x text-light"></i>
        </span>
        Modifier une formation
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous pouvez ici modifier une formation de l'application.</p>
    <form action="{{ route('admin.trainings.update', $training->id) }}" method="post" class="pt-3">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name" class="control-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $training->name }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="category_id" class="control-label">Catégorie</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option>Sélectionner une catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $training->category->id === $category->id ? 'selected' : null }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cost" class="control-label">Coût</label>
            <input type="number" name="cost" id="cost" class="form-control" value="{{ $training->cost }}" required>
        </div>
        <div class="form-group">
            <label for="duration" class="control-label">Durée (en jours)</label>
            <input type="number" name="duration" id="duration" class="form-control" value="{{ $training->duration }}" required>
        </div>
        <div class="form-group">
            <label for="theory" class="control-label">Cours théorique (durée en min par séance)</label>
            <input type="number" name="theory" id="theory" class="form-control" value="{{ $training->theory }}" required>
        </div>
        <div class="form-group">
            <label for="practice" class="control-label">Cours pratique (durée en min par séance)</label>
            <input type="number" name="practice" id="practice" class="form-control" value="{{ $training->practice }}" required>
        </div>
        <div class="form-group"><button class="btn btn-primary">Modifier</button></div>
    </form>
@endsection
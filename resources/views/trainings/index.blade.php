@extends('layouts.auth')

@section('content')
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-caret-square-o-down fa-stack-1x text-light"></i>
        </span>
        Souscrire à une formation
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Voici la liste complète des formations proposées par l'application regroupées en catégories.</p>
    <div class="accordion mt-3" id="accordionExample">
        @foreach ($categories as $category)
            <div class="pb-3">
                <div class="mb-2" id="category-heading-{{ $category->id }}">
                    <div class="m-0 border-bottom">
                        <button class="btn btn-link p-0 btn-block text-left text-dark" type="button" data-toggle="collapse" data-target="#category-{{ $category->id }}" aria-expanded="true" aria-controls="category-{{ $category->id }}">
                            <h5 class="m-0 p-0">
                                <img src="{{ url('/') . '/images/' . $icons[$count] }}" alt="Véhicule"> {{ $category->name }}
                                <i class="fa fa-caret-down float-right"></i>
                            </h5>
                        </button>
                    </div>
                </div>
                @php
                    $count++;
                @endphp
            
                <div id="category-{{ $category->id }}" class="collapse {{ $category->id === 1 ? 'show' : null }}" aria-labelledby="category-heading-{{ $category->id }}" data-parent="#accordionExample">
                <div class="row">
                    @foreach ($category->trainings as $training)
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5><i class="fa fa-{{ $training->duration > 30 ? 'play text-primary' : 'forward text-purple' }}"></i> {{ $training->name }}</h5>
                                    <p>
                                        <strong><u>Durée :</u></strong> {{ $training->duration%30 === 0 ? $training->duration/30 . ' mois' : $training->duration . ' jours'  }}. <br>
                                        <strong><u>Prix :</u></strong> {{ $training->cost }} FCFA.
                                    </p>
                                    <a href="{{ route('trainings.show', $training->id) }}" class="{{ $training->duration > 30 ? null : 'text-purple' }}">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
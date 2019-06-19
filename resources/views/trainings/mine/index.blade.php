@extends('layouts.auth')

@section('content')
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-cart-arrow-down fa-stack-1x text-light"></i>
        </span>
        Mes formations
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Voici la liste complète des formations auxquelles vous avez souscrit.</p>
    <div class="row mt-3">
        @foreach ($user->trainings as $training)
            <div class="col-12 mb-2">
                <div class="card p-3">
                    <div class="media">
                        <img src="{{ url('/') . '/images/' . $images[$training->category->name] }}" width="64" class="mr-3" alt="Véhicule">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $training->name }}</h5>
                            <p>
                                <strong><u>Progression :</u></strong> <span class="font-weight-thick text-purple">{{ App\Training::progress($training->id) }}%<br></span>
                                <strong><u>Nombre de jours restants :</u></strong> <span class="font-weight-thick text-purple">{{ App\Training::remaining($training->id) }}</span>
                            </p>
                            <div class="progress mb-2">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ App\Training::progress($training->id) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ App\Training::progress($training->id) }}%"></div>
                            </div>
                            <a href="{{ route('trainings.mine.show', $training->id) }}">Plus de détails</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection 
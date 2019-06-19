@extends('layouts.auth')

@section('content')
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-cart-arrow-down fa-stack-1x text-light"></i>
        </span>
        <u>{{ $training->category->name }} :</u> {{ $training->name }}
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Voici la liste complète des documents auxquels cette formation vous donne accès.</p>
    <div class="row mt-3">
        <div class="col-12">
            <div class="progress mb-2">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ App\Training::progress($training->id) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ App\Training::progress($training->id) }}%"></div>
            </div>
            <p>
                <strong><u>Progression :</u></strong> <span class="font-weight-thick text-purple">{{ App\Training::progress($training->id) }}%<br></span>
                <strong><u>Nombre de jours restants :</u></strong> <span class="font-weight-thick text-purple">{{ App\Training::remaining($training->id) }}</span>
            </p>
        </div>
        <div class="col-12 col-md-5 col-lg-3 img-responsive">
            <img src="{{ url('/') . '/images/' . $images[$training->category->name] }}" alt="" class="img-fluid bg-white img-thumbnail">
        </div>
        <div class="col-12 col-md-7 col-lg-9">
            Pour cette formation, voici les documents que vous aurez à votre disposition pour vous former vous-même :
            <ol>
                @foreach ($training->category->documents as $document)
                    <li><a href="{{ url('/') . '/documents/' . $document->path }}" target="_blank">{{ $document->name }}</a></li>
                @endforeach
            </ol>
        </div>
    </div>
@endsection
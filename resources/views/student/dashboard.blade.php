@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tableau de bord</li>
        </ol>
    </nav>
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-dashboard fa-stack-1x text-light"></i>
        </span>
        Tableau de bord
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Vous trouverez ici un bref résumé des grands groupes d'éléments de l'application.</p>
    <div class="row">
        <div class="col-sm-6 col-lg-3 mt-3">
            <div class="h-100 bg-primary text-light p-2 shadow-sm rounded">
                <div class="d-flex justify-content-between">
                    <i class="fa fa-graduation-cap fa-3x"></i>
                    <p class="text-right">
                        <span class="small">Mes formations en cours</span><br>
                        <span class="h3">{{ $current }}</span>
                    </p>
                </div>
                <div class="border-top border-light small pt-1">
                    <i class="fa fa-calendar mr-1"></i>Les formations que je suis actuellement
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-3">
            <div class="h-100 bg-purple text-light p-2 shadow-sm rounded">
                <div class="d-flex justify-content-between">
                    <i class="fa fa-line-chart fa-3x"></i>
                    <p class="text-right">
                        <span class="small">Progression moyenne</span><br>
                        <span class="h3">{{ $current > 0 ? ($sumProgress / $current) : $current }}%</span>
                    </p>
                </div>
                <div class="border-top border-light small pt-1">
                    <i class="fa fa-calendar mr-1"></i>Moyenne des progressions
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-3">
            <div class="h-100 bg-success text-light p-2 shadow-sm rounded">
                <div class="d-flex justify-content-between">
                    <i class="fa fa-calendar-check-o fa-3x"></i>
                    <p class="text-right">
                        <span class="small">Nombre moyen de jours restants</span><br>
                        <span class="h3">{{ $current > 0 ?(round($sumRemaining / $current)) : $current }}</span>
                    </p>
                </div>
                <div class="border-top border-light small pt-1">
                    <i class="fa fa-calendar mr-1"></i>Moyenne des jours de formation restants
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-3">
            <div class="h-100 bg-danger text-light p-2 shadow-sm rounded">
                <div class="d-flex justify-content-between">
                    <i class="fa fa-book fa-3x"></i>
                    <p class="text-right">
                        <span class="small">Nombre de documents</span><br>
                        <span class="h3">{{ $documents }}</span>
                    </p>
                </div>
                <div class="border-top border-light small pt-1">
                    <i class="fa fa-calendar mr-1"></i>Tous les documents à ma disposition
                </div>
            </div>
        </div>
    </div>
    <div class="border-top my-3"></div>
@endsection
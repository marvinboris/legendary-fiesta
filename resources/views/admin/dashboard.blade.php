@extends('layouts.auth')

@section('content')
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
                    <i class="fa fa-users fa-3x"></i>
                    <p class="text-right">
                        <span class="small">Nombre d'étudiants inscrits</span><br>
                        <span class="h3">{{ count($students) }}</span>
                    </p>
                </div>
                <div class="border-top border-light small pt-1">
                    <i class="fa fa-calendar mr-1"></i>Tous les étudiants
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-3">
            <div class="h-100 bg-purple text-light p-2 shadow-sm rounded">
                <div class="d-flex justify-content-between">
                    <i class="fa fa-graduation-cap fa-3x"></i>
                    <p class="text-right">
                        <span class="small">Nombre d'enseignants</span><br>
                        <span class="h3">{{ count($teachers) }}</span>
                    </p>
                </div>
                <div class="border-top border-light small pt-1">
                    <i class="fa fa-calendar mr-1"></i>Tous les enseignants
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-3">
            <div class="h-100 bg-success text-light p-2 shadow-sm rounded">
                <div class="d-flex justify-content-between">
                    <i class="fa fa-shopping-cart fa-3x"></i>
                    <p class="text-right">
                        <span class="small">Nombre de formations</span><br>
                        <span class="h3">{{ count($trainings) }}</span>
                    </p>
                </div>
                <div class="border-top border-light small pt-1">
                    <i class="fa fa-calendar mr-1"></i>Toutes les formations
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-3">
            <div class="h-100 bg-danger text-light p-2 shadow-sm rounded">
                <div class="d-flex justify-content-between">
                    <i class="fa fa-book fa-3x"></i>
                    <p class="text-right">
                        <span class="small">Nombre de documents</span><br>
                        <span class="h3">{{ count($documents) }}</span>
                    </p>
                </div>
                <div class="border-top border-light small pt-1">
                    <i class="fa fa-calendar mr-1"></i>Tous les documents
                </div>
            </div>
        </div>
    </div>
    <div class="border-top my-3"></div>
@endsection

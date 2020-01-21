@extends('layouts.app')

@section('title')
    Apprenants | 
@endsection

@section('content')
    <div class="row text-dark m-0">
        <div class="col-12 bg-primary-purple text-center text-white py-5">
            <h1 class="display-4 text-uppercase font-weight-thick">Apprenants</h1>
            <p class="lead">Tous les apprenants de votre auto-école</p>
        </div>
        <div class="col-12 py-5 bg-white">
            <div class="container lead font-weight-normal">
            @foreach ($learners as $learner)
                <div>{{ $learner->rank }}. {{ $learner->name }}</div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
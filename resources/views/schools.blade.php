@extends('layouts.app')

@section('title')
    {{ $school->name }} - Universités | 
@endsection

@section('content')
    <div class="row text-dark m-0">
        <div class="col-12 bg-primary-purple text-center text-white py-5">
            <h1 class="display-4 text-uppercase font-weight-thick">Universités</h1>
            <p class="lead">{{ $school->name }}</p>
        </div>
        <div class="col-12 py-5 bg-white">
            <div class="container lead font-weight-normal">
                <div>
                    {!! $school->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection
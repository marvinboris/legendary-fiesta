@extends('layouts.app')

@section('title')
    Actualités | 
@endsection

@section('content')
    <div class="row text-dark m-0">
        <div class="col-12 bg-primary-purple text-center text-white py-5">
            <h1 class="display-4 text-uppercase font-weight-thick">Actualités</h1>
            <p class="lead">Toutes les dernières informations sur votre auto-école</p>
        </div>
        @foreach ($news as $new)
            <div class="col-12 py-5 @if ($index%2 === 0) bg-white @else bg-light @endif">
                <div class="container lead font-weight-normal">
                    <h1>{{ $new->title }}</h1>
                    <div>
                        {!! $new->description !!}
                    </div>
                </div>
            </div>
            @php
                $index++;
            @endphp
        @endforeach
    </div>
@endsection
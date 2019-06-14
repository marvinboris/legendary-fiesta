<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid bg-dark text-light d-none d-md-block" style="font-size: .8rem;">
        <div class="container d-flex justify-content-between">
            <div class="text-left d-flex justify-content-start">
                <div class="d-flex align-items-center mr-2"><i class="fa fa-phone"></i> (+237) 654-399-487</div>
                <div class="d-flex align-items-center mr-2"><a href="mailto:contact@autoecoleuniversite.com" class="text-light"><i class="fa fa-envelope"></i> contact@autoecoleuniversite.com</a></div>
                <div class="d-flex align-items-center mr-2"><a class="text-light" href="#"><i class="fa fa-facebook"></i></a></div>
                <div class="d-flex align-items-center mr-2"><a class="text-light" href="#"><i class="fa fa-twitter"></i></a></div>
                <div class="d-flex align-items-center"><a class="text-light" href="#"><i class="fa fa-google-plus"></i></a></div>
            </div>
            <div class="text-right d-flex justify-content-end">
                @guest
                    <div class="nav-item">
                        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                    </div>
                    @if (Route::has('register'))
                        <div class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                        </div>
                    @endif
                @else
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link text-light dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light text-uppercase bg-white shadow-sm position-sticky" style="top: 0; z-index: 1080;">
        <div class="container">
            <a class="navbar-brand img-responsive" href="{{ url('/') }}">
                <img src="{{ url('/') . '/images/LOGO AUTO ECOLE UNIVERSITE.png' }}" height="50" alt="Logo de l'auto école université">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto" style="font-family: Raleway;">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item font-weight-bold"><a href="{{ url('/') }}" class="nav-link {{ !Request::segment(1) ? 'active' : null }}"><i class="fa fa-lg mr-1 fa-home"></i>Accueil</a></li>
                        <li class="nav-item font-weight-bold"><a href="{{ route('training') }}" class="nav-link {{ Request::segment(1) === 'training' ? 'active' : null }}"><i class="fa fa-lg mr-1 fa-graduation-cap"></i>Formations</a></li>
                        <li class="nav-item font-weight-bold"><a href="{{ route('course') }}" class="nav-link {{ Request::segment(1) === 'course' ? 'active' : null }}"><i class="fa fa-lg mr-1 fa-book"></i>Cours en ligne</a></li>
                        {{-- <li class="nav-item font-weight-bold"><a href="{{ url('/') }}" class="nav-link {{ Request::segment(1) === 'news' ? 'active' : null }}"><i class="fa fa-lg mr-1 fa-newspaper-o"></i>Actualités</a></li> --}}
                        {{-- <li class="nav-item"><i class="fa fa-lg fa-search nav-link"></i></li> --}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div id="app">
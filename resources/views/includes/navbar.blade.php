<div class="container-fluid bg-dark text-light d-none d-md-block" style="font-size: .8rem;">
    <div class="container d-flex justify-content-between">
        <div class="text-left d-flex justify-content-start align-items-center">
            {{-- Bienvenue à l'<span class="text-primary mr-1">Auto-école Université</span> --}}
            <div class="d-flex align-items-center px-2 py-1"><i class="fa mr-1 fa-phone"></i>(+237) 655-88-84-68 | 693-50-97-56</div>
            <div class="d-flex align-items-center px-2 py-1"><a href="mailto:autoecoleuniversites@gmail.com" class="text-light"><i class="fa mr-1 fa-envelope"></i>autoecoleuniversites@gmail.com</a></div>
            <div class="d-flex align-items-center px-2 py-1"><a class="text-light" href="#"><i class="fa fa-facebook"></i></a></div>
            {{-- <div class="d-flex align-items-center px-2 py-1"><a class="text-light" href="#"><i class="fa fa-twitter"></i></a></div>
            <div class="d-flex align-items-center px-2 py-1"><a class="text-light" href="#"><i class="fa fa-google-plus"></i></a></div> --}}
        </div>
        <div class="text-right d-flex justify-content-end">
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm position-sticky" style="top: 0; z-index: 1080;">
    <div class="container">
        <a class="navbar-brand img-responsive" href="{{ url('/') }}">
            <img src="{{ url('/') . '/images/LOGO AUTO ECOLE UNIVERSITE.png' }}" height="50" alt="Logo de l'auto école université">
        </a>
        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button> --}}
        <button class="btn btn-primary bg-primary-purple text-light d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        {{-- <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> --}}
            {{-- <span class="navbar-toggler-icon"></span> --}}
            <i class="fa fa-navicon fa-lg"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto text-uppercase">
                <li class="nav-item font-weight-bold"><a href="{{ url('/') }}" class="nav-link {{ !Request::segment(1) ? 'active' : null }}"><i class="fa fa-lg mr-1 fa-home"></i>Accueil</a></li>
                <li class="nav-item font-weight-bold"><a href="{{ route('training') }}" class="nav-link {{ Request::segment(1) === 'training' ? 'active' : null }}"><i class="fa fa-lg mr-1 fa-graduation-cap"></i>Formations</a></li>
                <li class="nav-item font-weight-bold"><a href="{{ route('news') }}" class="nav-link {{ Request::segment(1) === 'news' ? 'active' : null }}"><i class="fa fa-lg mr-1 fa-newspaper-o"></i>Actualités</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item text-uppercase login">
                        <a class="nav-link {{ Request::segment(1) === 'login' ? 'active' : null }}" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item text-uppercase signup">
                            <a class="nav-link {{ Request::segment(1) === 'register' ? 'active' : null }}" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown user">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ strtoupper(Auth::user()->name) }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @php
                                $userRole = null;
                                switch(Auth::user()->role->name) {
                                    case 'Administrateur':
                                        $userRole = 'admin';
                                        break;
                                    case 'Etudiant':
                                        $userRole = 'student';
                                        break;
                                    case 'Enseignant':
                                        $userRole = 'teacher';
                                        break;
                                }
                            @endphp
                            <a href="{{ route($userRole . '.dashboard') }}" class="dropdown-item {{ Request::segment(2) === 'dashboard' ? 'active' : null }}"><i class="fa mr-2 fa-dashboard"></i>Dashboard</a>                            
                            <a href="{{ route('trainings.mine.index') }}" class="dropdown-item {{ Request::segment(1) === 'course' ? 'active' : null }}"><i class="fa mr-2 fa-book"></i>Mes formations</a>
                            <a href="{{ route('profile') }}" class="dropdown-item {{ Request::segment(1) === 'profile' ? 'active' : null }}"><i class="fa mr-2 fa-user"></i>Mon profil</a>
                            <a class="dropdown-item border-top" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off mr-2"></i> {{ __('Déconnexion') }}
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
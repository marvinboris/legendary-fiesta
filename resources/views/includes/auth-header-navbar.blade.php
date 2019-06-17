<header class="container-fluid auth-navbar shadow-sm position-fixed d-flex p-0">
    <div class="left bg-light border-right text-center py-2">
        <a href="{{ url('/') }}">
            <img src="{{ url('/') . '/images/LOGO AUTO ECOLE UNIVERSITE.png' }}" alt="Logo" class="logo">
        </a>
    </div>
    <div class="right bg-white">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto text-uppercase">
                    <li class="nav-item font-weight-bold"><a href="{{ url('/') }}" class="nav-link {{ !Request::segment(1) ? 'active' : null }}"><i class="fa fa-lg mr-1 fa-home"></i>Accueil</a></li>
                    <li class="nav-item font-weight-bold"><a href="{{ route('training') }}" class="nav-link {{ Request::segment(1) === 'training' ? 'active' : null }}"><i class="fa fa-lg mr-1 fa-graduation-cap"></i>Formations</a></li>
                    <li class="nav-item font-weight-bold"><a href="{{ url('/') }}" class="nav-link {{ Request::segment(1) === 'news' ? 'active' : null }}"><i class="fa fa-lg mr-1 fa-newspaper-o"></i>Actualités</a></li>
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
                                <a href="{{ route($userRole . '.dashboard') }}" class="dropdown-item {{ Request::segment(2) === 'dashboard' ? 'active' : null }}"><i class="fa mr-2 fa-dashboard"></i>Dashboard</a>                            
                                <a href="{{ route('course') }}" class="dropdown-item {{ Request::segment(1) === 'course' ? 'active' : null }}"><i class="fa mr-2 fa-book"></i>Cours en ligne</a>
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
        </nav>
    </div>
</header>
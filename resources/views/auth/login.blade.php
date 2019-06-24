@extends('layouts.empty')

@section('content')
<div class="container-fluid py-5 login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="shadow bg-white rounded px-4 py-4 lead">
                    <div class="text-center logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ url('/') . '/images/LOGO AUTO ECOLE UNIVERSITE.png' }}" alt="Logo">
                        </a>
                    </div>

                    <div class="text-center text-uppercase h2 font-weight-light m-0 p-0 mt-3">{{ __('Connexion') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="email" class="control-label col-form-label text-md-right"><i class="fa fa-envelope mr-2"></i>{{ __('Adresse mail') }}</label>
    
                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="password" class="control-label col-form-label text-md-right"><i class="fa fa-lock mr-2"></i>{{ __('Mot de passe') }}</label>
    
                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Se souvenir de moi') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary bg-primary-purple btn-block">
                                        {{ __('Se connecter') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié ?') }}
                                        </a>
                                    @endif
                                    <a class="text-purple" href="{{ route('register') }}">
                                        {{ __('Je n\'ai pas de compte') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
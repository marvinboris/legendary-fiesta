@extends('layouts.empty')

@section('content')
<div class="container-fluid py-5 signup-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="shadow bg-white rounded px-4 py-4 lead">
                    <div class="text-center logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ url('/') . '/images/LOGO AUTO ECOLE UNIVERSITE.png' }}" alt="Logo">
                        </a>
                    </div>
    
                    <div class="text-center text-uppercase h2 font-weight-light m-0 p-0 mt-3">{{ __('Inscription') }}</div>

                    <div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="name" class="control-label col-form-label text-md-right"><i class="fa fa-user"></i> {{ __('Nom(s) et prénom(s)') }}</label>
    
                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="email" class="control-label col-form-label text-md-right"><i class="fa fa-envelope"></i> {{ __('Adresse mail') }}</label>
    
                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="password" class="control-label col-form-label text-md-right"><i class="fa fa-lock"></i> {{ __('Mot de passe') }}</label>
    
                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="password-confirm" class="control-label col-form-label text-md-right"><i class="fa fa-lock"></i> {{ __('Confirmer le mot de passe') }}</label>
    
                                <div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary bg-primary-purple btn-block">
                                        {{ __('S\'inscrire') }}
                                    </button>
                                </div>

                                <a href="{{ route('login') }}">
                                    {{ __('J\'ai déjà un compte') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

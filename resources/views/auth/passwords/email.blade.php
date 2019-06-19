@extends('layouts.empty')

@section('content')
<div class="container-fluid py-5 email-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="shadow-sm bg-white rounded p-4 lead">
                    <div class="text-center logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ url('/') . '/images/LOGO AUTO ECOLE UNIVERSITE.png' }}" style="width: 200px;" alt="Logo">
                        </a>
                    </div>
                    
                    <div class="text-center text-uppercase h2 font-weight-light m-0 p-0 mt-3">{{ __('Réinitialiser le mot de passe') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="email" class="control-label col-form-label text-md-right">{{ __('Adresse mail') }}</label>
    
                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary btn-block bg-primary-purple">
                                        {{ __('Envoyer le lien de réinitialisation du mot de passe') }}
                                    </button>
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

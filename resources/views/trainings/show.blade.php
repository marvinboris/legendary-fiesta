@extends('layouts.auth')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('trainings.index') }}">Souscrire à une formation</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $training->category->name }} : {{ $training->name }}</li>
        </ol>
    </nav>
    <h2>
        <span class="fa-stack small">
            <i class="fa fa-square fa-stack-2x text-primary"></i>
            <i class="fa fa-caret-square-o-down fa-stack-1x text-light"></i>
        </span>
        <u>Souscrire à la formation :</u> {{ $training->name }}
    </h2>
    <p class="text-muted small pb-2 m-0 border-bottom">Voici les détails de la formation "{{ $training->name }}".</p>
    <div class="row pt-2">
        <div class="col-12 col-md-6 col-lg-5 img-responsive">
            <img src="{{ url('/') . '/images/' . $images[$training->category->name] }}" alt="" class="mw-100 shadow-sm bg-white img-fluid img-thumbnail">
        </div>
        <div class="col-12 col-md-6 col-lg-7">
            <h3 class="text-primary">{{ $training->category->name }}</h3>
            <h4 class="text-purple"><i class="fa fa-{{ $training->duration > 30 ? 'play' : 'forward' }} mr-2"></i>{{ $training->name }}</h4>
            <div class="lead">
                <ul class="fa-ul">
                    <li><i class="fa fa-li fa-clock-o"></i><strong><u>Condition :</u></strong> {{ $training->category->condition }}.</li>
                    <li><i class="fa fa-li fa-money"></i><strong><u>Coût :</u></strong> {{ $training->cost }} FCFA.</li>
                    <li><i class="fa fa-li fa-calendar"></i><strong><u>Durée :</u></strong> {{ $training->duration%30 === 0 ? $training->duration/30 . ' mois' : $training->duration . ' jours' }}.</li>
                    @if ($training->theory > 0)
                    <li><i class="fa fa-li fa-calendar-o"></i><strong><u>Durée d'une séance de cours théorique :</u></strong> {{ $training->theory/60 }}h.</li>
                    @endif
                    <li><i class="fa fa-li fa-calendar-times-o"></i><strong><u>Durée d'une séance de cours pratique :</u></strong> {{ $training->practice }}min.</li>
                </ul>
                <p>Souscrire à cette formation vous donne un accès total à des documents quelque soit votre localisation et à n'importe quelle heure du jour ou de la nuit.</p>
                <hr>
                <p>
                    <button class="btn btn-lg btn-primary bg-primary-purple" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-shopping-cart mr-2"></i>Souscrire à cette formation</button>
                </p>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sélectionnez une méthode de paiement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body lead">
                <div class="first-page">
                    <p>Voici la liste des méthodes de paiement disponibles :</p>
                    <ul class="list-unstyled">
                        <li>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="bitcoin" name="payment_method" value="bitcoin" class="custom-control-input">
                                <label class="custom-control-label" for="bitcoin">Bitcoin (-5%)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="limo" name="payment_method" value="limo" class="custom-control-input">
                                <label class="custom-control-label" for="limo">Liyeplimal Money (-20%)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="mobile_money" name="payment_method" value="mobile_money" class="custom-control-input">
                                <label class="custom-control-label" for="mobile_money">Mobile Money</label>
                            </div>
                        </li>
                        
                        <li>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="cash" name="payment_method" value="cash" class="custom-control-input">
                                <label class="custom-control-label" for="cash">Cash</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="second-page d-none">
                    <div class="bitcoin-case d-none">
                        Bitcoin
                    </div>
                    <div class="limo-case d-none">
                        Non disponible pour le moment.
                    </div>
                    <div class="mobile_money-case d-none">
                        <button type="button" id="MyWCUpaymentButton" class="btn btn-primary bg-primary-purple">
                            Procéder au paiement
                        </button>
                    </div>
                    <div class="cash-case d-none">
                        Veuillez vous rendre au siège de l'auto-école Université à Bali, Carrefour Kayo Eli.<br>Vous pouvez appeler le numéro suivant : <strong>(+237) 655-88-84-68</strong>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" id="previous" class="btn btn-info text-white d-none">Précédent</button>
                <button type="button" id="next" class="btn btn-primary">Suivant</button>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('includes.wecashup-pay-now')
    <script>
        const duration = 250;
        window.onload = function () {
            // $('#WCUpaymentButton').hide();
            // $('#MyWCUpaymentButton').click(function () {
            //     $('#WCUpaymentButton').trigger('click');
            // });
            $('.second-page').hide();
            $('.custom-control-input').click(function () {
                $('.custom-control-input').removeClass('checked');
                $(this).addClass('checked');
            });
            $('#next').click(function() {
                if ($('.checked').length) {
                    if (!$('.first-page').hasClass('d-none') && $('.second-page').hasClass('d-none')) {
                        const value = $('.custom-control-input.checked').val();
                        $('.modal-title').delay(duration).text('Passez à la caisse');
                        $('#previous').removeClass('d-none');
                        $('#next').addClass('d-none');
                        $('.first-page').addClass('d-none').fadeOut(duration);
                        $('.second-page').removeClass('d-none').fadeIn(duration).children('.' + value + '-case').removeClass('d-none').fadeIn(duration);
                    }
                }
            });
            $('#previous').click(function() {
                if ($('.first-page').hasClass('d-none') && !$('.second-page').hasClass('d-none')) {
                    $('.modal-title').delay(duration).text('Sélectionnez une méthode de paiement');
                    $('#previous').addClass('d-none');
                    $('#next').removeClass('d-none');
                    $('.second-page').fadeOut(duration).addClass('d-none').children().addClass('d-none');
                    $('.first-page').removeClass('d-none').fadeIn(duration);
                }
            });
        };
    </script>
@endsection
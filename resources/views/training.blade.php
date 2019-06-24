@extends('layouts.app')

@section('title')
    Formations | 
@endsection

@section('content')
    <div class="row m-0 training">
        <div class="col-12 p-0 bg-primary-purple text-light">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="text-uppercase">Obtenez votre permis en 2 mois</h1>
                        <p class="lead">
                            Le permis de conduire est un droit administratif de circuler donnant l'autorisation de conduire sur une route publique, un ou plusieurs véhicules tels qu'une automobile, une motocyclette, un cyclomoteur ou un autobus dans une zone géographique.
                        </p>
                    </div>
                    <div class="col-lg-6 img-responsive">
                        <img src="{{ url('/') . '/images/car-dealer-35.jpg' }}" alt="" class="mw-100 img-fluid img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-0 bg-white text-dark" id="permisA">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6">
                        <h1>Permis A</h1>
                        <ul class="fa-ul lead">
                            <li class="font-weight-bold"><i class="fa fa-li fa-clock-o"></i>Âge : 16 ans et plus</li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-money"></i>Formation normale : 100 000 FCFA
                                <ul class="font-weight-light">
                                    <li>Durée de 2 mois</li>
                                    <li>2h de théorie</li>
                                    <li>40min de pratique</li>
                                </ul></li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation accélérée : 100 000 FCFA
                                <ul class="font-weight-light">
                                    <li>Durée d'1 mois</li>
                                    <li>3h de théorie</li>
                                    <li>90min de pratique</li>
                                </ul>
                            </li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-calendar"></i>Période de formation : 8h - 10h | 11h - 13h | 15h - 17h | 17h - 19h</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ url('/') . '/images/moto-senke-sk12513-125cc-color-negro-D_NQ_NP_761470-MLU25657572659_062017-F.jpg' }}" alt="" class="mw-100 img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-0 bg-primary-purple big-border"></div>
        <div class="col-12 p-0 bg-light text-dark" id="permisB">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ url('/') . '/images/rav4.png' }}" alt="" class="mw-100 img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <h1>Permis B</h1>
                        <div class="custom-scrollbar" style="max-height: 300px; overflow-y: scroll;">
                            <ul class="fa-ul lead">
                                <li class="font-weight-bold"><i class="fa fa-li fa-clock-o"></i>Âge : 18 ans et plus</li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-money"></i>Formation normale : 250 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée de 2 mois</li>
                                        <li>2h de théorie</li>
                                        <li>45min de pratique</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation accélérée : 300 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée d'1 mois</li>
                                        <li>3h de théorie</li>
                                        <li>90min de pratique</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation spéciale weekend : 300 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée de 2 mois</li>
                                        <li>Samedi, Dimanche et jours fériés</li>
                                        <li>3h de théorie</li>
                                        <li>90min de pratique</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation prestige : 365 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée d'1 mois</li>
                                        <li>3h de théorie</li>
                                        <li>90min de pratique</li>
                                        <li>Selon l'endroit et l'heure souhaités</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation capacité : 130 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée d'1 mois</li>
                                        <li>2h de théorie</li>
                                        <li>45min de pratique</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation engin : 600 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée d'1 mois</li>
                                        <li>3h de théorie</li>
                                        <li>40min de pratique</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation conduite assistée : 15 000 FCFA/h <span class="font-weight-light">(pour se familiariser avec son propre véhicule)</span>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation conduite défensive : 200 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée de 7 jours</li>
                                        <li>2h de théorie</li>
                                        <li>40min de pratique</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation conduite de nuit : 150 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée de 10 jours</li>
                                        <li>40min de pratique</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-calendar"></i>Période de formation : 8h - 10h | 11h - 13h | 15h - 17h | 17h - 19h</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-0 bg-primary-purple big-border"></div>
        <div class="col-12 p-0 bg-white text-dark" id="permisC">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6">
                        <h1>Permis C</h1>
                        <ul class="fa-ul lead">
                            <li class="font-weight-bold"><i class="fa fa-li fa-clock-o"></i>Permis B : 2 ans et plus</li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-money"></i>Formation normale : 500 000 FCFA
                                <ul class="font-weight-light">
                                    <li>Durée de 2 mois</li>
                                    <li>2h de théorie</li>
                                    <li>40min de pratique</li>
                                </ul></li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Recyclage : 250 000 FCFA
                                <ul class="font-weight-light">
                                    <li>Durée de 15 jours</li>
                                    <li>40min de pratique</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ url('/') . '/images/mses1.jpg' }}" alt="" class="mw-100 img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-0 bg-primary-purple big-border"></div>
        <div class="col-12 p-0 bg-light text-dark" id="permisD">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ url('/') . '/images/bus-2.png' }}" alt="" class="mw-100 img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <h1>Permis D</h1>
                        <ul class="fa-ul lead">
                            <li class="font-weight-bold"><i class="fa fa-li fa-clock-o"></i>Permis C : 1 an et plus</li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-money"></i>Formation normale : 500 000 FCFA
                                <ul class="font-weight-light">
                                    <li>Durée de 2 mois</li>
                                    <li>2h de théorie</li>
                                    <li>40min de pratique</li>
                                </ul>
                            </li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Recyclage : 250 000 FCFA
                                <ul class="font-weight-light">
                                    <li>Durée de 15 jours</li>
                                    <li>40min de pratique</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-0 bg-primary-purple big-border"></div>
        <div class="col-12 p-0 bg-white text-dark" id="permisE">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6">
                        <h1>Permis E</h1>
                        <ul class="fa-ul lead">
                            <li class="font-weight-bold"><i class="fa fa-li fa-clock-o"></i>Permis C : 2 ans et plus</li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-money"></i>Formation normale : 500 000 FCFA
                                <ul class="font-weight-light">
                                    <li>Durée de 2 mois</li>
                                    <li>2h de théorie</li>
                                    <li>40min de pratique</li>
                                </ul></li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Recyclage : 250 000 FCFA
                                <ul class="font-weight-light">
                                    <li>Durée de 15 jours</li>
                                    <li>40min de pratique</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ url('/') . '/images/poids-lourd.png' }}" alt="" class="mw-100 img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-0 bg-primary-purple big-border"></div>
        <div class="col-12 p-0 bg-light text-dark" id="permisG">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ url('/') . '/images/tractor-002.png' }}" alt="" class="mw-100 img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <h1>Permis G</h1>
                        <ul class="fa-ul lead">
                            <li class="font-weight-bold"><i class="fa fa-li fa-clock-o"></i>Candidature sur présentation du permis B</li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-money"></i>Formation normale : 700 000 FCFA
                                <ul class="font-weight-light">
                                    <li>Durée de 2 mois</li>
                                    <li>2h de théorie</li>
                                    <li>40min de pratique</li>
                                </ul>
                            </li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Recyclage : 250 000 FCFA
                                <ul class="font-weight-light">
                                    <li>Durée de 15 jours</li>
                                    <li>40min de pratique</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
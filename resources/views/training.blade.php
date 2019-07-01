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
                                <li class="font-weight-bold"><i class="fa fa-li fa-clock-o"></i><u>NB :</u> Pour les samedis et les jours fériés, les cours s'arrêtent à 14h.</li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-money"></i>Formation normale : 120 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée de 2 mois</li>
                                        <li>2h de théorie</li>
                                        <li>45min de pratique</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation accélérée : 150 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée d'1 mois</li>
                                        <li>3h de théorie</li>
                                        <li>90min de pratique</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation pro (Weekend + Soir) : 180 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée de 2 mois</li>
                                        <li>2h de théorie (En soirée)</li>
                                        <li>60min de pratique (Samedi et Dimanche)</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation prestige : 200 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée de 10 jours</li>
                                        <li>3h de théorie (1 séance)</li>
                                        <li>90min de pratique (3 séances)</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Formation capacité (catégorie T) : 80 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée de 10 jours</li>
                                        <li>30min de pratique (10 séances)</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Conduite de nuit : 100 000 FCFA
                                    <ul class="font-weight-light">
                                        <li>Durée de 10 jours</li>
                                        <li>Tous les jours</li>
                                    </ul>
                                </li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Permis international : 150 000 FCFA</li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Conversion permis : 150 000 FCFA</li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-usd"></i>Extension (C, D, E, G) : 100 000 FCFA</li>
                                <li class="font-weight-bold"><i class="fa fa-li fa-calendar"></i>Période de formation : 9h - 12h | 12h - 14h | 16h - 18h | 18h - 20h</li>
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
        <div class="col-12 p-0 bg-primary-purple text-white">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Formalités d'inscription</h1>
                        <ul class="fa-ul lead">
                            <li class="font-weight-bold"><i class="fa fa-li fa-clock-o"></i><u>Inscription :</u> 10 000 FCFA</li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-book"></i><u>Documentation :</u> 10 000 FCFA</li>
                        </ul>
                    </div>
                    <div class="col-lg-12">
                        <h1>Formalités d'examen national</h1>
                        <ul class="fa-ul lead">
                            <li class="font-weight-bold"><i class="fa fa-li fa-square"></i>Carnet de suivi : 5 000 FCFA</li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-square"></i>Frais de dossier : 30 000 FCFA</li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-square"></i>Photocopie CNI</li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-square"></i>3 photos 4*4 couleur fond blanc</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-0 bg-white text-dark">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-uppercase text-center">PAIEMENT PAR CRYPTOMONNAIE OU LIMO</h1>
                        <p class="lead">
                            <u>Avantages :</u> Recevez des bonus chaque mois dans votre compte <a href="https://www.liyeplimal.net">Liyeplimal</a>.
                        </p>
                        <ul class="fa-ul lead">
                            <li class="font-weight-bold"><i class="fa fa-li fa-money"></i>Formation normale
                                <ul class="font-weight-light">
                                    <li>Coût : 150 000 FCFA</li>
                                    <li>Bonus : 7 200 FCFA chaque mois pendant 1 an.</li>
                                </ul>
                            </li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-money"></i>Formation accélérée
                                <ul class="font-weight-light">
                                    <li>Coût : 250 000 FCFA</li>
                                    <li>Bonus : 15 300 FCFA chaque mois pendant 1 an.</li>
                                </ul>
                            </li>
                            <li class="font-weight-bold"><i class="fa fa-li fa-money"></i>Formation pro + Dossier d'examen
                                <ul class="font-weight-light">
                                    <li>Coût : 290 000 FCFA</li>
                                    <li>Bonus : 15 300 FCFA chaque mois pendant 1 an.</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
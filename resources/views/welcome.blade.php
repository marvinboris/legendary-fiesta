@extends('layouts.app')

@section('content')
    <div class="row m-0 home-page">
        <div class="col-12 p-0">
            <div id="carousel-home-page" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-home-page" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-home-page" data-slide-to="1"></li>
                    <li data-target="#carousel-home-page" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner h-100">
                    <div class="carousel-item h-100 active">
                        <div class="text-center text-light h-100">
                            <div class="container d-flex flex-wrap justify-content-center align-items-center align-content-center h-100">
                                <h1 class="w-100 text-uppercase text-white d-md-none">Une nouvelle pédagogie de l'auto école</h1>
                                <h1 class="w-100 display-4 text-uppercase text-white d-none d-md-block">Une nouvelle pédagogie de l'auto école</h1>
                                <div class="lead w-100"><p>Apprenez à conduire avec les techniques de votre temps.</p></div>
                                <div class="w-100"><a class="btn btn-light btn-lg" href="{{ route('register') }}">INSCRIPTION</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item h-100">
                        <div class="text-center text-light h-100">
                            <div class="container d-flex flex-wrap justify-content-center align-items-center align-content-center h-100">
                                <h1 class="w-100 text-uppercase text-white d-md-none">Paiement accepté</h1>
                                <h1 class="w-100 display-4 text-uppercase text-white d-none d-md-block">Paiement accepté</h1>
                                <div class="lead w-100"><p>Des moyens de paiement révolutionnaires : Bitcoin, LIMO, Orange / MTN Mobile Money.</p></div>
                                <div class="w-100"><a class="btn btn-light btn-lg" href="{{ route('register') }}">INSCRIPTION</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item h-100">
                        <div class="text-center text-light h-100">
                            <div class="container d-flex flex-wrap justify-content-center align-items-center align-content-center h-100">
                                <h1 class="w-100 text-uppercase text-white d-md-none">Plateforme d'e-learning</h1>
                                <h1 class="w-100 display-4 text-uppercase text-white d-none d-md-block">Plateforme d'e-learning</h1>
                                <div class="lead w-100"><p>Une plateforme de cours en ligne avec différents thèmes sur la conduite automobile, le code de la route, des exercices corrigés, des questions-réponses avec d’autres intervenants et nos formateurs.</p></div>
                                <div class="w-100"><a class="btn btn-light btn-lg" href="{{ route('register') }}">INSCRIPTION</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <a class="carousel-control-prev" href="#carousel-home-page" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-home-page" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> --}}
            </div>
        </div>
        <div class="col-12 p-0 bg-white">
            <div class="container py-5">
                <h1 class="text-uppercase text-center">Comment ça <span class="">marche</span></h1>
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="icon text-center text-primary text-uppercase display-4"><i class="fa fa-edit"></i></div>
                        <div class="title text-center text-uppercase"><h4>Inscrivez-vous à nos formations</h4></div>
                        <div class="content">Vous disposerez de formations accélérées, normales et prestige selon votre besoin.</div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="icon text-center text-primary text-uppercase display-4"><i class="fa fa-book"></i></div>
                        <div class="title text-center text-uppercase"><h4>Accédez à la plateforme d'e-learning</h4></div>
                        <div class="content">Nous vous proposons une plateforme en ligne pour les apprenants désirant garder le contact avec leurs cours.</div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="icon text-center text-primary text-uppercase display-4"><i class="fa fa-graduation-cap"></i></div>
                        <div class="title text-center text-uppercase"><h4>Apprenez avec nos formateurs</h4></div>
                        <div class="content">Des experts certifiés et qualifiés vous suivent en ligne et dans nos salles de cours VIP.</div>
                    </div>
                    <div class="col-sm-6 col-md-4 offset-md-4 offset-lg-0 col-lg-3">
                        <div class="icon text-center text-primary text-uppercase display-4"><i class="fa fa-star"></i></div>
                        <div class="title text-center text-uppercase"><h4>Obtenez votre permis en 2 mois.</h4></div>
                        <div class="content">Nous vous garantissons une formation de qualité et la réussite à votre examen.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-0 bg-primary-purple big-border"></div>
        <div class="col-12 p-0 bg-light">
            <div class="container py-5">
                <h1 class="text-uppercase text-center">Catégories de <span class="">permis</span></h1>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card authorization-card">
                            <div class="card-body">
                                <h4><img src="{{ url('/').'/images/icons8-motorcycle-48.png' }}" alt=""></h4>
                                <h5 class="card-title">Permis A</h5>
                                <p class="card-text">
                                    <ul class="fa-ul lead">
                                        <li><i class="fa fa-li fa-train"></i>Véhicule motorisé à deux roues</li>
                                        <li><i class="fa fa-li fa-clock-o"></i>16 ans et plus</li>
                                        <li><i class="fa fa-li fa-money"></i>Formation normale : 100 000 FCFA</li>
                                        <li><i class="fa fa-li fa-usd"></i>Formation accélérée : 100 000 FCFA</li>
                                    </ul>
                                </p>
                                <a href="#" class="card-link">En savoir plus</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card authorization-card">
                            <div class="card-body">
                                <h4><img src="{{ url('/').'/images/icons8-car-501.png' }}" alt=""></h4>
                                <h5 class="card-title">Permis B</h5>
                                <p class="card-text">
                                    <ul class="fa-ul lead">
                                        <li><i class="fa fa-li fa-train"></i>Véhicule de tourisme</li>
                                        <li><i class="fa fa-li fa-clock-o"></i>18 ans et plus</li>
                                        <li><i class="fa fa-li fa-money"></i>Formation normale : 250 000 FCFA</li>
                                        <li><i class="fa fa-li fa-usd"></i>Formation accélérée : 300 000 FCFA</li>
                                    </ul>
                                </p>
                                <a href="#" class="card-link">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-4 mb-3">
                        <div class="card authorization-card">
                            <div class="card-body">
                                <h4><img src="{{ url('/').'/images/icons8-container-truck-48.png' }}" alt=""></h4>
                                <h5 class="card-title">Permis C</h5>
                                <p class="card-text">
                                    <ul class="fa-ul lead">
                                        <li><i class="fa fa-li fa-train"></i>Véhicule de transport de marchandises</li>
                                        <li><i class="fa fa-li fa-clock-o"></i>2 ans de Permis B et plus</li>
                                        <li><i class="fa fa-li fa-money"></i>Formation normale : 500 000 FCFA</li>
                                        <li><i class="fa fa-li fa-usd"></i>Recyclage : 250 000 FCFA</li>
                                    </ul>
                                </p>
                                <a href="#" class="card-link">En savoir plus</a>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-4 mb-3">
                        <div class="card authorization-card">
                            <div class="card-body">
                                <h4><img src="{{ url('/').'/images/icons8-bus-64.png' }}" alt=""></h4>
                                <h5 class="card-title">Permis D</h5>
                                <p class="card-text">
                                    <ul class="fa-ul lead">
                                        <li><i class="fa fa-li fa-train"></i>Véhicule de transport en commun</li>
                                        <li><i class="fa fa-li fa-clock-o"></i>2 ans de Permis C et plus</li>
                                        <li><i class="fa fa-li fa-money"></i>Formation normale : 500 000 FCFA</li>
                                        <li><i class="fa fa-li fa-usd"></i>Recyclage : 250 000 FCFA</li>
                                    </ul>
                                </p>
                                <a href="#" class="card-link">En savoir plus</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-md-4 mb-3">
                        <div class="card authorization-card">
                            <div class="card-body">
                                <h4><img src="{{ url('/').'/images/icons8-semi-truck-64.png' }}" alt=""></h4>
                                <h5 class="card-title">Permis E</h5>
                                <p class="card-text">
                                    <ul class="fa-ul lead">
                                        <li><i class="fa fa-li fa-train"></i>Poids lourd</li>
                                        <li><i class="fa fa-li fa-clock-o"></i>2 ans de Permis D et plus</li>
                                        <li><i class="fa fa-li fa-money"></i>Formation normale : 500 000 FCFA</li>
                                        <li><i class="fa fa-li fa-usd"></i>Recyclage : 250 000 FCFA</li>
                                    </ul>
                                </p>
                                <a href="#" class="card-link">En savoir plus</a>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4 mb-3">
                        <div class="card authorization-card">
                            <div class="card-body">
                                <h4><img src="{{ url('/').'/images/icons8-bulldozer-64.png' }}" alt=""></h4>
                                <h5 class="card-title">Permis G</h5>
                                <p class="card-text">
                                    <ul class="fa-ul lead">
                                        <li><i class="fa fa-li fa-train"></i>Véhicule hors-route (engin)</li>
                                        <li><i class="fa fa-li fa-clock-o"></i>Permis B valable</li>
                                        <li><i class="fa fa-li fa-money"></i>Formation normale : 700 000 FCFA</li>
                                        <li><i class="fa fa-li fa-usd"></i>Recyclage : 250 000 FCFA</li>
                                    </ul>
                                </p>
                                <a href="#" class="card-link">En savoir plus</a>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="col-12 p-0 bg-primary-purple big-border"></div>
        <div class="col-12 p-0 our-online-courses text-light">
            <div class="container py-5">
                <h1 class="text-uppercase text-center">Nos <span class="">cours</span> en ligne</h1>
                <div class="row">
                    <div class="col-lg-5">
                        <ul class="fa-ul lead">
                            <li><i class="fa fa-li fa-play"></i>Accédez à plus de 100 vidéos</li>
                            <li><i class="fa fa-li fa-file-pdf-o"></i>Téléchargez des documents PDF</li>
                            <li><i class="fa fa-li fa-desktop"></i>Utilisez notre simulateur de conduite</li>
                            <li><i class="fa fa-li fa-book"></i>Accédez à des exercices et à leur corrigé</li>
                        </ul>
                    </div>
                    <div class="col-lg-7">
                        <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/-jWWR3ZuDLs?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="fitvid0"></iframe></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-0 bg-primary-purple text-light">
            <div class="container py-5 text-center">
                <h1 class="text-uppercase">Expérience et ressources</h1>
                <div class="row">
                    <div class="col-lg-3">
                        <h2 class="display-4 font-weight-bolder">103</h2>
                        <p class="text-uppercase lead">Clients déjà formés</p>
                    </div>
                    <div class="col-lg-3">
                        <h2 class="display-4 font-weight-bolder">9</h2>
                        <p class="text-uppercase lead">Moniteurs</p>
                    </div>
                    <div class="col-lg-3">
                        <h2 class="display-4 font-weight-bolder">6</h2>
                        <p class="text-uppercase lead">Véhicules</p>
                    </div>
                    <div class="col-lg-3">
                        <h2 class="display-4 font-weight-bolder">16</h2>
                        <p class="text-uppercase lead">Personnels à l'écoute</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 maps">
            <div class="row">
                <iframe width="100%" height="440" src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=Douala%2C%20Cameroun+(Auto-%C3%A9cole%20universit%C3%A9)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <div>
                    <small>Powered by <a href="https://embedgooglemaps.com/de/">embedgooglemaps DE</a> & <a href="https://lasagradafamiliatickets.de/la-sagrada-familia-ticket/">hier buchen</a></small>
                </div>
            </div>
        </div>
        <div class="col-12 p-0 map-markers bg-light">
            <div class="container">
                <div class="row text-light py-5">
                    <div class="col-lg-3 col-md-6 mb-3 px-2">
                        <div class="col-12 bg-primary-purple py-3 rounded text-center shadow-sm">
                            <h4><i class="fa fa-map-marker fa-lg"></i> Centre 1</h4>
                            <div class="lead">
                                Yaoundé, Université de Ngoa<br>SOA, 50m de l'aire de jeu
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3 px-2">
                        <div class="col-12 bg-primary-purple py-3 rounded text-center shadow-sm">
                            <h4><i class="fa fa-map-marker fa-lg"></i> Centre 2</h4>
                            <div class="lead">
                                Yaoundé, Université de Ngoa<br>Ekelle, face boulangerie
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3 px-2">
                        <div class="col-12 bg-primary-purple py-3 rounded text-center shadow-sm">
                            <h4><i class="fa fa-map-marker fa-lg"></i> Centre 3</h4>
                            <div class="lead">
                                Douala, Université de Douala<br>Face entrée étudiant
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3 px-2">
                        <div class="col-12 bg-primary-purple py-3 rounded text-center shadow-sm">
                            <h4><i class="fa fa-map-marker fa-lg"></i> Centre 4</h4>
                            <div class="lead">
                                Maroua, Université de Maroua<br>Boulangerie
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
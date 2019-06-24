@extends('layouts.app')

@section('title')
    Cours en ligne |
@endsection

@section('content')
    <div class="row m-0">
        <div class="col-12 p-0 bg-primary-purple">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-8 text-light pb-3">
                        <h1 class="text-uppercase">Apprendre, Maîtriser, Conduire</h1>
                        <p class="lead">
                            Notre méthode d'enseignement a déjà fait ses preuves. D'un côté, vous recevez les cours dans nos salles VIP. De l'autre, vous vous connectez à la plateforme en ligne pour les supports de cours, les exercices et les corrigés. Enfin, vous passez à la pratique.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <video controls class="rounded mw-100 mx-auto" style="width: 300px;">
                            <source type="video/mp4" src="{{ url('/') . '/videos/WhatsApp-Video-2018-11-06-at-02.38.15.mp4' }}">
                        </video>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-0 bg-primary-purple big-border"></div>
        <div class="col-12 p-0 bg-light">
            <div class="container py-5">
                <h1 class="text-center">Quelle formation recherchez-vous ?</h1>
                <form action="" method="post" class="row">
                    <div class="form-group col-lg-10">
                        <input type="search" name="search" class="form-control" id="search" required />
                    </div>
                    <div class="form-group col-lg-2">
                        <button class="btn btn-primary btn-block">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 p-0 bg-primary-purple big-border"></div>
        <div class="col-12 p-0 bg-white">
            <div class="container py-5">
                <h1 class="text-center">Quelques notions</h1>
                <div class="row">
                    <div class="col-12 pb-3">Voici quelques notions que vous rencontrerez dans votre parcours, une fois inscrit.</div>
                    <div class="col-lg-6">
                        <div class="card bg-light">
                            <div class="embed-responsive embed-responsive-16by9 border-bottom card-img-top bg-white">
                                <div class="d-flex justify-content-center align-items-center overflow-hidden embed-responsive-item">
                                    <img src="{{ url('/') . '/images/CaptFu1re6.png' }}" class="" alt="...">
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Le véhicule automobile</h5>
                                <p class="card-text">Le chapitre sur la connaissance du véhicule est porté sur des axes clés de la conduite automobile et vous permet de connaître et de manipuler les différents éléments que comporte un véhicule. Pour cela, il est important de :</p>
                                <ul>
                                    <li>savoir ce qu'est l'entretien du véhicule</li>
                                    <li>connaître l'éclairage et la signalisation du véhicule</li>
                                    <li>connaître les vérifications à effectuer sur les véhicules</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card bg-light">
                            <div class="embed-responsive embed-responsive-16by9 border-bottom card-img-top bg-white">
                                <div class="d-flex justify-content-center align-items-center overflow-hidden embed-responsive-item">
                                    <img src="{{ url('/') . '/images/villeneuvepermisdeconduire__044562200_1404_11012018.jpg' }}" class="" alt="...">
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Le permis de conduire</h5>
                                <p class="card-text">Le permis de conduire est un droit administratif de circuler donnant l'autorisation de conduire sur une route publique, un ou plusieurs véhicules tels qu'une automobile, une motocyclette, un cyclomoteur ou un autobus dans une zone géographique.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-lg-6">
                        <div class="card bg-light">
                            <div class="embed-responsive embed-responsive-16by9 border-bottom card-img-top bg-white">
                                <img src="{{ url('/') . '/images/WhatsApp-Image-2018-10-29-at-00.52.09.jpeg' }}" class="embed-responsive-item" alt="...">
                            </div>
                            <div class="card-body">
                                <h5>Les règles de priorité</h5>
                                <p class="card-text">En règle générale, lorsqu’il n’y a pas un élément de signalisation à une intersection, c’est automatiquement la règle de priorité à droite qui s’applique. Mais lorsque durant un trajet le conducteur croise le losange jaune, cela indique qu’il roule sur une route prioritaire.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card bg-light">
                            <div class="embed-responsive embed-responsive-16by9 border-bottom card-img-top bg-white">
                                <div class="d-flex justify-content-center align-items-center overflow-hidden embed-responsive-item">
                                    <img src="{{ url('/') . '/images/code.png' }}" class="" alt="...">
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>La signalisation routière</h5>
                                <p class="card-text">La signalisation routière d’interdiction désigne l’ensemble des équipements de signalisation (panneaux, balises) qui ont pour objet de notifier aux usagers de la route les interdictions spéciales prescriptes par la règlementation locale. L’interdiction prend effet à la hauteur du panneau et prend fin à la prochaine intersection.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
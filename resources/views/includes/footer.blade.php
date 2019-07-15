<footer class="container-fluid bg-white">
    <div class="row big-border bg-primary-purple"></div>
    <div class="row big-border bg-primary-purple"></div>
    <div class="row big-border bg-primary-purple"></div>
    <div class="row big-border bg-primary-purple"></div>
    <div class="row big-border bg-primary-purple"></div>
    <div class="faq py-5">
        <div class="container">
            <h1 class="text-center">Foire aux <span class="text-purple">questions</span></h1>
            <div class="row">
                <div class="col-12">
                    <h4>Qui sommes-nous ?</h4>
                    <p class="text-muted lead">
                        L'Auto-Ecole Université (AEU) est une structure technique assurant la formation en conduite automobile à ses apprenants avec son matériel moderne et son personnel hautement qualifié.
                    </p>
                    <a href="#" class="btn btn-lg btn-purple text-uppercase">Contactez-nous</a>
                </div>
                <div class="col-12">
                    <hr>
                </div>
                <div class="col-md-6 col-lg-4 mt-3">
                    <div class="media">
                        <i class="fa fa-question-circle mr-3 text-primary" style="font-size: 3rem;"></i>
                        <div class="media-body">
                            <h5 class="mt-0">Comment souscrire ?</h5>
                            L'AEU met à votre disposition des formations en ligne et des formations à la carte. Il vous suffit de cliquer sur un des liens d'inscription ci-dessus.
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mt-3">
                    <div class="media">
                        <i class="fa fa-question-circle mr-3 text-primary" style="font-size: 3rem;"></i>
                        <div class="media-body">
                            <h5 class="mt-0">Fournissez-vous des attestations de fin de formation ?</h5>
                            L'AEU est une école de formation en conduite automobile qui garantit aux apprenants la réussite à leur examen de permis de conduite toutefois seul le service régional des transports a qualité pour délivrer des permis définitifs.
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mt-3">
                    <div class="media">
                        <i class="fa fa-question-circle mr-3 text-primary" style="font-size: 3rem;"></i>
                        <div class="media-body">
                            <h5 class="mt-0">Quels moyens de paiement acceptez-vous ?</h5>
                            Nous acceptons les espèces et les monnaies digitales comme le Bitcoin, LIMO (Liyeplimal Money), Orange Money et MTN Mobile Money.
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mt-3">
                    <div class="media">
                        <i class="fa fa-question-circle mr-3 text-primary" style="font-size: 3rem;"></i>
                        <div class="media-body">
                            <h5 class="mt-0">Où êtes-vous situé ?</h5>
                            Nous possédons 4 centres de formations dans tout le Cameroun et nous ne cessons de nous étendre.
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mt-3">
                    <div class="media">
                        <i class="fa fa-question-circle mr-3 text-primary" style="font-size: 3rem;"></i>
                        <div class="media-body">
                            <h5 class="mt-0">A quoi ai-je droit quand je m'inscris ?</h5>
                            L'apprenant inscrit a droit après validation de son inscription sur la plateforme d'e-learning pour les cours en ligne et aux cours audio-visuels dans nos salles VIP.
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mt-3">
                    <div class="media">
                        <i class="fa fa-question-circle mr-3 text-primary" style="font-size: 3rem;"></i>
                        <div class="media-body">
                            <h5 class="mt-0">Quelle est la durée d'une session ?</h5>
                            Une session normale dure 2 mois cependant vous pouvez souscrire au forfait accéleré d'un mois.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer py-5 bg-primary-purple text-light row">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <h4 class="text-uppercase">Nous contacter</h4>
                        <form action="{{ route('contact') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nom" required />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Adresse mail" required />
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" rows="3" class="form-control" placeholder="Message..."></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Envoyer</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <h4 class="text-uppercase">Informations de contact</h4>
                        <ul class="fa-ul lead">
                            <li><i class="fa fa-li fa-phone"></i>(+237) 655-88-84-68 | 693-50-97-56</li>
                            <li><i class="fa fa-li fa-map-marker"></i>1135, Rue Mandessi Bell | Bali, Carrefour Kayo</li>
                            <li><i class="fa fa-li fa-clock-o"></i>Lundi - Vendredi : 8h - 20h | Samedi : 8h - 14h | Dimanche : Cas spécial</li>
                            <li><i class="fa fa-li fa-envelope"></i>autoecoleuniversites@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 mb-3 partners">
                        <h4 class="text-uppercase">Nos partenaires</h4>
                        <div class="text-left">
                            <img src="{{ url('/').'/images/CaptFu1re9.png' }}" alt="Partenaires">
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <h4 class="text-uppercase">Nos Services</h4>
                        <ul class="list-unstyled lead">
                            <li>Formation en conduite automobile</li>
                            <li>Recyclage de Permis A et B</li>
                            <li>Conduite défensive</li>
                            <li>Conduite assistée</li>
                            <li>Capacité</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="end py-3 bg-dark text-light row">
        <div class="text-center col-12 lead mb-2">
            Copyright &copy; {{ Carbon\Carbon::now()->year }} | Designed by <a href="mailto:jaris.ultio.21@gmail.com">Brainer 21</a>.
        </div>
        <div class="text-center col-12">
            <a href="https://www.facebook.com/Auto-ecole-Universit%C3%A9-636710070146764/?modal=admin_todo_tour" class="fa-stack fa-lg">
                <i class="fa fa-circle text-primary fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x text-light"></i>
            </a>

            {{-- <a href="#" class="fa-stack fa-lg">
                <i class="fa fa-circle text-primary fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x text-light"></i>
            </a>

            <a href="#" class="fa-stack fa-lg">
                <i class="fa fa-circle text-primary fa-stack-2x"></i>
                <i class="fa fa-google-plus fa-stack-1x text-light"></i>
            </a> --}}
        </div>
    </div>
</footer>
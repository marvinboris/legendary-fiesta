<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    #logo {
        width: 100px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-start py-3">
                <img src="https://autoecoleuniversite.com/images/LOGO AUTO ECOLE UNIVERSITE.png" id="logo" alt="Logo de l'auto-école">
            </div>
        </div>
        <div class="col-12 bg-primary py-3 text-white">
            <h4 class="text-center">Contact</h4>
            <h6 class="text-center">Un nouveau message de visiteur</h6>
            <p>
                Les informations sont les suivantes :
            </p>
            <ul class="list-unstyled">
                <li><strong><u>Nom :</u></strong> {{ $name }}</li>
                <li><strong><u>Adresse mail :</u></strong> {{ $email }}</li>
                <li><strong><u>Message :</u></strong> {{ $message }}</li>
            </ul>
        </div>
        <div class="text-light text-center bg-dark">
            <div class="p-3">
                <p>
                    <a href="https://autoecoleuniversite.com" class="text-light">Auto-école Université</a>
                </p>
                <p>
                    Copyright &copy; 2019. Tous droits réservés.
                </p>
            </div>
        </div>
    </div>
</div>
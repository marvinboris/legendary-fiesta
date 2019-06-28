<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .container * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .container h1,
        .container h2,
        .container h3,
        .container h4,
        .container h5,
        .container h6 
        {
            margin: 0px !important;
        }

        .container ul {
            margin: 0px;
            padding-left: 15px;
        }

        .container u {
            text-decoration: none;
            padding-bottom: 2px;
            border-bottom: 1px solid #f8f9fa;
        }

        .container h1 {
            font-size: 2rem;
        }
        
        .container h2 {
            font-size: 1.8rem;
        }
        
        .container h3 {
            font-size: 1.6rem;
        }
        
        .container h4 {
            font-size: 1.4rem;
        }
        
        .container h5 {
            font-size: 1.2rem;
        }
        
        .container h6 {
            font-size: 1rem;
        }

        .row {
            margin-left: -15px !important;
            margin-right: -15px !important;
            flex-wrap: wrap !important;
        }

        .justify-content-start {
            justify-content: flex-start !important;
        }

        .col-12 {
            flex: 0 0 100% !important;
            width: 100% !important;
            padding-left: 15px !important;
            padding-right: 15px !important;
        }

        .py-3 {
            padding-top: 15px !important;
            padding-bottom: 15px !important;
        }

        .py-5 {
            padding-top: 50px !important;
            padding-bottom: 50px !important;
        }

        .px-5 {
            padding-left: 50px !important;
            padding-right: 50px !important;
        }

        .container {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 1rem;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin: auto !important;
            padding-left: 15px !important;
            padding-right: 15px !important;
        }

        .bg-primary {
            background-color: #3490dc !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-white {
            color: white !important;
        }

        .text-dark {
            color: #343a40 !important;
        }

        .bg-dark {
            background-color: #343a40 !important;
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }

        .text-light {
            color: #f8f9fa !important;
        }

        .p-3 {
            padding: 15px !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        .list-unstyled {
            list-style-type: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row text-dark">
            <div class="col-12 bg-light py-3 px-5">
                <div class="d-flex justify-content-start">
                    <h4 class="text-uppercase">Auto-école Université</h4>
                </div>
            </div>
            <div class="col-12 bg-primary py-5 px-5 text-light">
                <h4 class="text-center text-uppercase">Contact</h4>
                <h6 class="text-center">Un nouveau message de visiteur</h6>
                <p style="margin: 0px;">
                    Les informations sont les suivantes :
                </p>
                <ul class="list-unstyled">
                    <li><strong><u>Nom :</u></strong> {{ $name }}</li>
                    <li><strong><u>Adresse mail :</u></strong> <span style="font: inherit;">{{ $email }}</span></li>
                    <li><strong><u>Message :</u></strong> {{ $myMessage }}</li>
                </ul>
            </div>
            <div class="col-12 text-light text-center bg-dark py-5 px-5">
                <p>
                    <a href="https://autoecoleuniversite.com" style="font: inherit; text-decoration: none;" class="text-light">Auto-école Université</a>
                </p>
                <p>
                    Copyright &copy; 2019. Tous droits réservés.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
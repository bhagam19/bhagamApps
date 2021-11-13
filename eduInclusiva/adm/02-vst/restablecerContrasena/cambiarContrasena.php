<?php
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path1=$path."/negocioNormal/admin/";
    $_SESSION['path'] = $path1;
    if(isset($_SESSION['visited'])){

    }else{
        $_SESSION['mensaje']="";
    };
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Cambiar Contraseña</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">!Ahora Puede Cambiar su Contraseña!</h1>
                                    </div>
                                    <form action="../../3-control/restablecerContrasena/cambiarContrasena.php" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword1" placeholder="Escriba su nueva contraseña..." name="pass1" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword2" placeholder="Repita su nueva contraseña..." name="pass2" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Cambiar Contraseña</button>
                                            
                                        
                                        <hr>
                                        <div class="text-center">
                                            <h6 class="h6 text-red-900 mb-4">
                                                <?php
                                                    if(isset($_SESSION['mensaje'])){
                                                        echo $_SESSION['mensaje'];
                                                    }else{
                                                        echo '';
                                                    }
                                                ?>
                                            </h6>
                                        </div>
                                        <hr>
                                    </form>
                                    
                                    <div class="text-center">
                                        <a class="small" href="restablecerContrasena/forgot-password.php">¿Olvidó su contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="./crudUsuario/insertar.html">¡Crear una Cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
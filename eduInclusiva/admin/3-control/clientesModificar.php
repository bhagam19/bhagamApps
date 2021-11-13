<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Negocio - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
            session_start();
            include ($_SESSION['ruta'].'/2-vista/sideBar.php');
            include ($_SESSION['ruta'].'/2-vista/topBar.php');
            include ($_SESSION['ruta'].'/1-model/conex.php');
        ?>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Modificar Usuario</h1>
                                <br />
                            </div>
                            <form class="user" action="./crudUsuario/modificar.php" method="POST" enctype="multipart/form-data">
                            <?php
                                $mail=$_GET['mail'];
                                $consulta="SELECT * FROM usuarios WHERE mail='".$mail."'";
                                $query=$con->query($consulta);
                                $row=mysqli_fetch_row($query);
                                echo '
                                    <div class="row mb-4">
                                        <div class="col-lg-6 d-flex flex-column justify-content-center">
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                    <label for="nombres">Nombres</label>
                                                    <input type="text" name="nombres" class="form-control form-control-user" id="exampleFirstName" placeholder="Escriba sus Nombres (obligatorio)" value="'.$row[5].'">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                <label for="telefono">Teléfono</label>
                                                    <input type="text" name="telefono" class="form-control form-control-user" id="exampleFirstName" placeholder="Escriba su Teléfono (obligatorio)"  value="'.$row[4].'">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                    <label for=""></label>
                                                    <input type="text" name="user" class="form-control form-control-user" id="exampleFirstName" disabled="disabled" placeholder="Escriba un usuario (obligatorio)"  value="'.$row[1].'">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                    <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Escriba una contraseña  (obligatorio)">
                                                </div>
                                                <!--<div class="col-sm-6">
                                                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="col-sm-12 ">
                                                <div class=" d-flex justify-content-center ">
                                                    <div>
                                                        <p>Seleccione su foto de perfil</p>
                                                        <img class="img-profile rounded-circle mb-3" id="imagenPrevisualizacion" src="'.$row[6].'" width="240px" height="240px">
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="file" class="btn btn-primary btn-user btn-block" id="seleccionArchivos" accept="image/png, .jpeg, .jpg" name="foto">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script src="../../js/js.js"></script>
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" disabled="disabled" placeholder="Escriba su correo electrónico  (obligatorio)"  value="'.$row[3].'">
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="uploadBtn" value="Modificar" />
                                ';
                            ?>
                            </form>
                            <br />
                            <hr>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $path .= "/negocioNormal/admin/2-vista/logoutModal.php";
    include($path);
?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Custom scripts for register page-->
    <script src="../js/js.js"></script>

</body>

</html>
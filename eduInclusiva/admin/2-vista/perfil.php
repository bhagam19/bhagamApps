<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agregar un Nuevo Cliente</title>
    
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" class="text">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            session_start();
            include('./sideBar.php');
            include('./topBar.php');
            include('../1-model/conex.php');
        ?>
        
        
        <div class="container-lg">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <!-- Begin Page Content -->
                    <div class="row container-lg">
                    
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-blue-900 mb-4">Datos de tu Cuenta</h1>
                                    <br />
                                </div>
                                <form class="user" action="../3-control/registro.php" method="POST" enctype="multipart/form-data">
                                    <?php
                                        $consulta="SELECT * FROM usuarios
                                        INNER JOIN usuarioxperfil
                                        ON usuarios.idUsuario=usuarioxperfil.idUsuario
                                        INNER JOIN perfiles
                                        ON usuarioxperfil.idPerfil=perfiles.idPerfil
                                        WHERE usuarios.idUsuario=".$_SESSION['id'];
                                        $query=$con->query($consulta);
                                        $cont=mysqli_num_rows($query);
                                        echo '
                                            <div class="row mb-4">
                                                <div class="col-lg-6 d-flex flex-column justify-content-center">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <label class="p-3 font-size-1rem">Perfiles:<br />';
                                                                while($row2=mysqli_fetch_row($query)){
                                                                    echo $row2[11].', ';
                                                                }
                                        echo '
                                                            </label>
                                                        </div>
                                                    </div>
                                        ';
                                        $query=$con->query($consulta);
                                        $row=mysqli_fetch_row($query);
                                        echo '
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <label for="nombres">Nombres</label>
                                                            <input type="text" name="nombres" class="form-control form-control-user" id="exampleFirstName" placeholder="Escriba sus Nombres (obligatorio)" value="'.$row[5].'">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <label for="telefono">Teléfono</label>
                                                            <input type="text" name="telefono" class="form-control form-control-user" id="exampleFirstName" placeholder="Escriba sus Apellidos (obligatorio)" value="'.$row[4].'">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <label for="">Usuario</label>    
                                                            <input type="text" name="user" class="form-control form-control-user" disabled="disabled" id="exampleFirstName" placeholder="Escriba un usuario (obligatorio)" value="'.$row[1].'">
                                                        </div>
                                                    </div>
                                                    <!--<div class="form-group row">
                                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                                            <label>Contraseña</label>
                                                            <label>'.$row[2].'</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for=""></label>
                                                            <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" value="'.$row[2].'>
                                                        </div>
                                                    </div>-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="col-sm-12 ">
                                                        <div class=" d-flex justify-content-center ">
                                                            <div>
                                                                <p class="text-center">Foto de Perfil</p>
                                                                <img class="img-profile rounded-circle mb-3" id="imagenPrevisualizacion" src="'.$row[6].'" width="240px" height="240px">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <input type="file" class="btn btn-primary btn-user btn-block" id="seleccionArchivos" accept="image/png, .jpeg, .jpg" name="foto">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script src="js.js"></script>
                                            <div class="form-group col-lg-6">
                                                <label for="email">Correo</label>
                                                <input type="email" name="email" class="form-control form-control-user" disabled="disabled" id="exampleInputEmail" placeholder="Escriba su correo electrónico  (obligatorio)" value="'.$row[3].'">
                                            </div>
                                            <br />
                                            <hr>
                                            <div class="d-flex justify-content-center">
                                                <div class="col-lg-3">
                                                    <input type="submit" class="btn btn-info btn-user btn-block" name="uploadBtn" value="Aceptar" />
                                                </div>
                                            </div>
                                            <hr>
                                        ';
                                    ?>
                                </form>
                                <div class="text-center">
                                    <!--<a class="small" href="forgot-password.html">Forgot Password?</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Content -->
                </div>
            </div>
        </div>  
    </div>
    <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/negocioNormal/admin/2-vista/logoutModal.php";
        include($path);
    ?>
    <!-- Custom scripts for register page-->
    <script src="../js/js.js"></script>
</body>

</html>
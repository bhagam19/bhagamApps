<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Borrar Cliente</title>

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
            include('../2-vista/sideBar.php');
            include('../2-vista/topBar.php');
        ?>
        
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

<?php
    include ('../1-model/conex.php');
    $correo=$_GET['mail'];
    $borrarCliente="DELETE FROM usuarios WHERE mail='$correo'";
    if ($con->query($borrarCliente)===TRUE){
        echo "<br /><h2>Usuario borrado exitosamente!</h2>";
    }else{
        echo "Error al borrar el cliente.".$query."<br />".$con->error;
    }
    echo '<br /><br /><br />
        <a href="./clientesVer.php" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">
                Ver Clientes
            </span>
        </a>
    ';
    mysqli_close($con);
?>
</div>
</div>
<?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/negocioNormal/admin/2-vista/logoutModal.php";
        include($path);
    ?>
</body>
</html>
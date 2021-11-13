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

    <title>Insertar Cliente</title>

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
$naturaleza=$_POST['naturaleza'];
$clasificacion=$_POST['clasificacion'];
$regimen=$_POST['regimen'];
$tipo=$_POST['tipo'];
$documento=$_POST['documento'];
$dv=$_POST['dv'];
$razonSocial=$_POST['razonSocial'];
$primerNombre=$_POST['primerNombre'];
$segundoNombre=$_POST['segundoNombre'];
$primerApellido=$_POST['primerApellido'];
$segundoApellido=$_POST['segundoApellido'];
$direccion=$_POST['direccion'];
$ciudad=$_POST['ciudad'];
$telefono=$_POST['telefono'];
$mail=$_POST['mail'];
$observaciones=$_POST['observacion'];
$buscarCliente="SELECT * FROM cliente WHERE mail = '$mail'";
$result=$con->query($buscarCliente);
$count=mysqli_num_rows($result);
if ($count==1){
    echo "<br />El cliente ya ha sido creado.<br /><br />";
}
else{
    $query="INSERT INTO cliente (naturaleza, clasificacion, regimen, tipo, documento, dv, razonSocial, primerNombre, segundoNombre, primerApellido, segundoApellido, direccion, ciudad, telefono, mail, observacion) 
    VALUE ('".$naturaleza."', '".$clasificacion."', '".$regimen."', '".$tipo."', ".$documento.", ".$dv.", '".$razonSocial."', '".$primerNombre."', '".$segundoNombre."', '".$primerApellido."', '".$segundoApellido."', '".$direccion."', '".$ciudad."', ".$telefono.", '".$mail."', '".$observaciones."')";
    if ($con->query($query)===TRUE){
        echo "<br /><h2>Cliente creado exitosamente.<h2><br /><br />";
        echo "<h4>Bienvenido: $primerNombre $segundoNombre $primerApellido $segundoApellido<br /><br /><h2>";
    }
    else{
        echo "<br /><br /><br />Error al crear el cliente.<br /><br />".$query."<br /><br />".$con->error;
    }
}
mysqli_close($con);
?>
<br /><br /><br />
<a href="../3-control/clientesVer.php" class="btn btn-success btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-check"></i>
    </span>
    <span class="text">
        Insertar otro Cliente
    </span>
</a>
<a href="./clientesVer.php" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-flag"></i>
    </span>
    <span class="text">
        Ver Clientes
    </span>
</a>
<br />
<br />
</div>
</div>
<?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/htmlclassb/admin/2-vista/logoutModal.php";
        include($path);
    ?>
</body>
</html>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ver Usuarios</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
            include ($_SESSION['ruta'].'/2-vista/sideBar.php');
            include ($_SESSION['ruta'].'/2-vista/topBar.php');
            include ($_SESSION['ruta'].'/1-model/conex.php');
        ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>USUARIO</th>
                                <th>CONTRASEÑA</th>
                                <th>CORREO</th>
                                <th>TELÉFONO</th>
                                <th>NOMBRES</th>
                                <th>FOTO</th>
                                <th>PERFIL</th>
                                <th colspan='2'>EDITAR</th></tr>
                            </tr>
                        </thead>
                        <?php 
                            $j=0;
                            $path = $_SERVER['DOCUMENT_ROOT'];
                            include($path.'/negocioNormal/admin/1-model/conex.php');
                            $consulta="SELECT * FROM usuarios";
                            $query=$con->query($consulta);                                        
                            while($row=mysqli_fetch_row($query)){
                                echo "<tr>";
                                $j=$j+1;
                                echo "<td class='centrar'>$j</td>";
                                for ($i=1;$i<7;$i++){
                                    echo "<td>$row[$i]</td>";
                                }
                                echo '
                                    <td colspan="2" class="no">
                                        <div id="editar">
                                            <div>
                                                <a href="./clientesModificar.php?mail='.$row[3].'">
                                                    <img id="modificar" src="../img/modificar.png" width="20px" title="Modificar Registro" />
                                                </a>
                                            </div>
                                            <div>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#borrarModal'.$row[0].'">
                                                    <img id="borrar" src="../img/borrar.png" width="20px" title="Borrar Registro" />
                                                </a>
                                                <!--<a href="./clientesBorrar.php?mail=".$row[3]."">
                                                    <img id="borrar" src="../img/borrar.png" width="20px" title="Borrar Registro" />
                                                </a>-->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                ';
                            }
                            echo "</table></div>";
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-body">
            <a href="../2-vista/clienteForm.php" class="btn btn-google btn-block tam">
                <i class="fab fa-google fa-fw"></i>
                Insertar un Nuevo Cliente
            </a>
        </div>
    </div>
    <?php
        $path .= "/negocioNormal/admin/2-vista/logoutModal.php";
        include($path);
    ?>
    
</body>
</html>
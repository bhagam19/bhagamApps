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
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" class="text">
    <?php
        session_start();
    ?>
        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php
            $path1 = $_SERVER['DOCUMENT_ROOT'];
            $path1 .= "/negocioNormal/admin/";
            include($path1.'2-vista/sideBar.php');
            include($path1.'2-vista/topBar.php');
            $case="todos";
            include($path1.'3-control/crudUsuario/buscar.php');
        ?>


                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-1.5 d-none d-lg-block">
                                    <div class="p-1">
                                        <!-- Begin Page Content XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
                                        <form action="#mostrarPerfiles" method="post">
                                            <div class="col-lg-12">

                                                <select name="usuarioId">
                                                    <?php
                                                        include($path1.'3-control/crudUsuarioxPerfil/funciones.php');
                                                        while($row=mysqli_fetch_row($query)){
                                                            echo '
                                                                <option value="'.$row[0].'">'.$row[1].'</option>
                                                            ';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <button type="submit" name="mostrarPerfiles">Mostrar Perfiles</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-5" id="mostrarPerfiles">
                                            <?php
                                                if (isset($_POST['mostrarPerfiles'])){
                                                    unset($_SESSION['perfilId']);
                                                    $_SESSION['cantPerfilesEnBD']=0;
                                                    $_SESSION['idUsuario']=$_POST['usuarioId'];
                                                    $case="idPerfil";
                                                    include ($path1.'3-control/crudUsuarioxPerfil/buscar.php');
                                                    while ($rowPerfil=mysqli_fetch_row($query3)){
                                                                                                                        /*se guardan todos los perfiles hallados del usuario*/
                                                        $_SESSION['perfilId'][] = $rowPerfil[0];
                                                    }
                                                                                                                        /*se cuentan todos los perfiles hallados del usuario*/
                                                    $_SESSION['cantPerfilesEnBD']=$cont3;
                                                                                                                        /*for ($i=0;$i<$_SESSION['cantPerfilesEnBD'];$i++){
                                                                                                                            echo '<br>perfil de usuario seleccionado: '.$_SESSION['perfilId'][$i];
                                                                                                                        }*/
                                                                                                                            /*se cuentan todos los perfiles creados en la tabla perfiles*/
                                                    $case="todos";
                                                    include ($path1.'3-control/crudPerfiles/buscar.php');
                                                    $_SESSION['totalPerfiles']=$cont2;
                                                                                                                        /*se calcula el número de columnas necesarias para mostrar todos los perfiles en grupos de 10*/
                                                    $cantCols=floor($cont2/10);
                                                                                                                        /*echo '<br>'.$cantCols;*/
                                                    $cantSobrantes=$cont2%10;
                                                                                                                        /*echo '<br>'.$cantSobrantes;*/
                                                                                                                        /*se guarda en arrays todos los perfiles de la tabla perfiles*/
                                                    while($row2=mysqli_fetch_row($query)){
                                                        $idPerfiles[]=$row2[0];
                                                        $nomPerfil[]=$row2[1];
                                                    }
                                                                                                                        /*se pone a cero la variable que lleva el número de perfiles mostrados en el formulario*/
                                                    $_SESSION['f']=0;
                                                                                                                        /*Se hace el formulario mostrando las columnas con los grupos de perfiles*/
                                                    $idSelec=$_SESSION['idUsuario'];
                                                    $case="selecId";
                                                    include($path1.'3-control/crudUsuario/buscar.php');
                                                    while($row5=mysqli_fetch_row($query5)){
                                                        $_SESSION['usuarioSelec']=$row5[1];
                                                    }
                                                    echo '
                                                        <form action="#modificar" method="post">
                                                        <div class="row">
                                                            <div class=" p-2 bg-secondary">
                                                                <h2 class="text-light">Perfiles del <span class="text-warning">'.$_SESSION['usuarioSelec'].'</span></h2>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                    ';
                                                        
                                                        unset($_SESSION['seleccionadosPrevios']);
                                                        if ($cantSobrantes==0){
                                                            for($g=1;$g<=$cantCols;$g++){
                                                                echo '<div class="col-lg-2.5 p-2 bg-secondary">';
                                                                for ($l=1;$l<=10;$l++){
                                                                    hacerFila();
                                                                }
                                                                echo '</div>';
                                                            }
                                                        }else{
                                                            for($g=1;$g<=$cantCols;$g++){
                                                                echo '<div class="col-lg-2.5 p-2 bg-secondary">';
                                                                for ($l=1;$l<=10;$l++){
                                                                    hacerFila();
                                                                }
                                                                echo '</div>';
                                                            }
                                                            echo '<div class="col-lg-2.5 p-2 bg-secondary">';
                                                            for ($p=1;$p<=$cantSobrantes;$p++){
                                                                hacerFila();
                                                            }
                                                            echo '
                                                                </div>
                                                            ';
                                                        }
                                                    echo '
                                                            
                                                            </div>
                                                            <div class="row">
                                                                <div class="row">
                                                                    <button type="submit" name="modificar">Modificar</button>
                                                                </div class="col-lg-12">
                                                            </div>
                                                        </form>
                                                    ';
                                                }
                                            ?>
                                </div>
                                <!-- End Page Content XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modificar">
                    <?php
                        if (isset($_POST['modificar'])){
                            modificarPerfil();
                            header('Location:'.$path1.'2-vista/crudPerfilesxUsuario/modificar.php#mostrarPerfiles');
                        }
                    ?>
                </div>
                <?php
            include($path1.'2-vista/logoutModal.php');
        ?>
        </div>
</body>

</html>
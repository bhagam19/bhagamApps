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

<body class="bg-gradient-primary">
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
        ?>
        
        
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-body">
                        <!-- Begin Page Content -->
                        <?php
                            $checked_contador=0;
                            $case="perfiles";
                            include($path1.'3-control/crudPerfiles/insertar.php');
                            echo'
                                <form method="post" action="#borrar">
                                <div>
                                    <label class="azul">Perfiles creados hasta el momento:</label>
                                    <br />
                                    </div>
                            <div class="row">
                            ';
                                $numCols = $cont/10;
                                $numRest=$cont%10;
                                while($row=mysqli_fetch_row($query)){
                                    $idPerfil[]=$row[0];
                                    $nomPerfil[]=$row[1];
                                }
                                $i=0;
                                for ($h=0; $h<=$numCols-1;$h++){
                                    $j=$i;
                                    echo '
                                        <div class="col-lg-2">
                                        <div class="p-1">
                                    ';
                                    for ($i;$i<$j+10;$i++){
                                        echo '
                                            <label>
                                            <input type="checkbox" name="checkbox[]" value="'.$idPerfil[$i].'">
                                            '.$nomPerfil[$i].'</label>
                                            <br />
                                        ';
                                    }
                                    echo'
                                    </div>
                                        </div>
                                    ';
                                }
                            echo '
                                <div class="col-lg-2">
                                    <div class="p-1">
                            ';
                                $j=$i;
                                for ($i;$i<$j+$numRest;$i++){
                                    echo '
                                        <label>
                                                <input type="checkbox" name="checkbox[]" value="'.$idPerfil[$i].'">
                                        '.$nomPerfil[$i].'</label>
                                                <br />
                                    ';
                                }
                            echo'
                                    </div>
                                </div>
                            ';
                            echo '
                                </div>
                                <div>
                                <button type="submit" name="seleccionar">seleccionar</button>
                                </div>
                                </form>
                                <div class="" id="borrar">';
                                    if(isset($_POST['seleccionar'])){
                                        if(!empty($_POST['checkbox'])) {
                                            // Contando el numero de input seleccionados "checked" checkboxes.
                                            $checked_contador = count($_POST['checkbox']);

                                            echo '
                                                <p>Confirma que deseas borrar el(los) siguiente(s) '.$checked_contador.' perfil(es) seleccionado(s):</p> <br/>
                                                <div class="row">
                                            ';
                                            // Bucle para almacenar y visualizar valores activados checkbox.
                                            foreach($_POST['checkbox'] as $seleccion) {
                                                for ($i=0; $i<$cont; $i++){
                                                    if ($idPerfil[$i] == $seleccion){
                                                        $idBorrar[]=$idPerfil[$i];
                                                        echo '
                                                            <div class="col-lg-2">
                                                                <p>'.$nomPerfil[$i].'</p>
                                                            </div>
                                                        ';
                                                    }
                                                }
                                            }
                                        echo '
                                            <div>
                                                <form action="#borrar" method="post">
                                                    <input type="submit" name="borrar" />Borrar</button>
                                                </form>
                                            </div>
                                        ';
                                        }else{
                                            echo '<p><b>Por favor seleccione al menos una opción.</b></p>';
                                        }
                                    }
                            echo '
                                </div>
                                <div class="" id="borrar">';
                                echo $checked_contador;
                                    if(isset($_POST['borrar'])){
                                        // Bucle para almacenar y visualizar valores activados checkbox.
                                        $contBorrados=$checked_contador;
                                        
                                            for ($k=0; $k<$checked_contador; $k++){
                                                    echo $idBorrar[$k];
                                                    $case="borrar";
                                                    include($path1.'3-control/crudPerfiles/borrar.php');
                                                    $case="id";
                                                    include($path1.'3-control/crudPerfiles/buscar.php');
                                                    $contBorrados-=$cont2;
                                                
                                            }
                                        
                                        if ($contBorrados==0){
                                            echo '
                                                </div>
                                                <br/><b>Fueron borrados '.$k.' perfiles exitosamente.</span>
                                            ';
                                        }
                                    }
                            echo '
                                </div>
                            ';
                        ?>
                        <!-- End Page Content -->
                </div>
            </div>
        </div>  
    </div>
    <?php
        include($path1.'2-vista/logoutModal.php');
    ?>
</body>

</html>
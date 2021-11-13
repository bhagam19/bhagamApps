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
        ?>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <!-- Begin Page Content -->
                    <?php
                        $case="perfiles";
                        include($path1.'3-control/crudPerfiles/insertar.php');
                        echo'
                            <label class="azul">Perfiles creados hasta el momento:</label>
                            <br />
                        ';
                            while($row=mysqli_fetch_row($query)){
                                echo '
                                    <label>'.$row[1].', </label>
                                ';
                                $perfil[]=$row[1];
                            }
                    ?>
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="#" method="post">
                        <?php
                            echo'
                                <label class="azul">Escriba el perfil que desea crear: </label>
                                <input type="text" name="descripcion" value="" autofocus>
                                <button type="submit">Crear</button>
                                <br />
                                <br />
                                <br />
                                <br />
                            ';
                        ?>
                    </form>
                    <?php
                        if (isset($_POST['descripcion'])!=""){
                            $existe=0;
                            for ($i=0;$i<$cont;$i++){
                                if (strtolower($_POST['descripcion'])==strtolower($perfil[$i])){
                                    $existe++;
                                }
                            }
                            if ($existe!=0){
                                $mensaje='El perfil '.$_POST['descripcion'].' ya existe. Por favor escriba un nombre diferente para el nuevo perfil.';
                            }else{
                                $case="crear";
                                $descripcion=$_POST['descripcion'];
                                include($path1.'3-control/crudPerfiles/insertar.php');
                                /*Comprobar si se creo el nuevo perfilXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX*/
                                $path2=$path1.'3-control/crudPerfiles/insertar.php';
                                $case="perfiles";
                                include($path2);
                                $i=0;
                                while($row1=mysqli_fetch_row($query)){
                                    $perfil1[]=$row1[1];
                                    $i++;
                                }
                                for ($j=0;$j<=($cont-1);$j++){
                                    if ($_POST['descripcion']==$perfil1[$j]){
                                        $existe++;
                                    }
                                }
                                if ($existe!=0){$mensaje='El perfil '.$_POST['descripcion'].' Fue creado con éxito';
                                }else{
                                        $mensaje='No se pudo crear el perfil '.$_POST['descripcion'].' . Por favor inténtelo nuevamente, si el problema persiste comuníquese con el área técnica. Gracias.';
                                }
                            }
                        }else{
                                $mensaje='Debe escribir un nombre para el nuevo perfil';
                        }
                        
                        echo $mensaje;
                        $url=$path1.'2-vista/crudPerfiles/perfilesInsertar.php';
                        
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
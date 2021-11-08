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
                            <!-- Begin Page Content XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->

                            <!-- End Page Content XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
                        </div>
                    </div>
                </div>
        </div>
        <?php
        include($path1.'2-vista/logoutModal.php');
    ?>
</body>

</html>
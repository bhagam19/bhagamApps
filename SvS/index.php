<?php
    session_name("SvS");
    session_start();
	//### 1. Realizamos la conexion al servidor y a la base de datos a traves del archivo 'datosConexion.php'
	include('adm/01-mdl/cnx.php');
 	//Verificamos si existe la tabla "instalacion" y el campo "confirmacion" con valor "1"  
    $consulta=$cnx->query("SELECT * FROM instalacion WHERE confirmacion=1");
    if(!$consulta){//Si la consulta no se efectua, es porque no existe la tabla "instalacion", entonces se procede con la instalación de las tablas.
        echo "
            <html>
                <head>
                    <meta HTTP-equiv='REFRESH' content='0;url=adm/01-mdl/installBD.php'>
                </head>
            </html>";       
    }
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset='UTF-8'" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=0.6, maximun-scale=1.0, minimun-scale=0.2"/>
    <title>SINAI vs SIMAT</title>
    <link rel="shortcut icon" href="../appsArt/SvS.png"/>
    <link rel="stylesheet" media="screen" type="text/css" href="adm/css/index.css"/>
    <script type="text/javascript" src="adm/js/00-Ppal.js"></script>
</head>
<body >
    <div id="appsContenedorGlobal" >			
        <?php
            include('adm/02-vst/00-Ppal/00-EstPermisos.php');
        ?>
    </div>
</body>
</html>
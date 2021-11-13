<!doctype html>
<?php
  session_name("eduInclusiva");//Asignamos un nombre a la sesión para diferenciarlo de otras sesiones que puedan estar activas.
  session_start();
  //### 1. Realizamos la conexion al servidor y a la base de datos a traves del archivo 'datosConexion.php'
	include('adm/01-mdl/cnx.php');
 	//Verificamos si existe la tabla "instalacion" y el campo "confirmacion" con valor "1"  
    $consulta=mysqli_query($cnx,"SELECT * FROM instalacion WHERE confirmacion=1");
    if(!$consulta){//Si la consulta no se efectua, es porque no existe la tabla "instalacion", entonces se procede con la instalación de las tablas.
      echo "
        <html>
            <head>
                <meta HTTP-equiv='REFRESH' content='0;url=adm/01-mdl/bd.php'>
            </head>
        </html>
       ";       
    }
?>
<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset='UTF-8'" />
		<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=0.6, maximun-scale=1.0, minimun-scale=0.2"/>
		<title>EduInclusiva</title>
		<link rel="shortcut icon" href="../appsArt/DUA.png"/>
		<link rel="stylesheet" media="screen" type="text/css" href="adm/css/index.css"/>
		<script type="text/javascript" src="../jquery/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script type="text/javascript" src="adm/js/00-Ppal.js"></script>
  	<script>
			$(function(){
				//alert("La resolución de tu pantalla es: " + screen.width + " x " + screen.height);				
				document.getElementById("contenedor").style.width = (screen.width*0.97)+ "px";
				document.getElementById("contenedor").style.height = (screen.height*0.70) + "px";
				document.getElementById("menuNavegacion").style.height = (screen.height*0.715) + "px";
				//document.getElementById("contenedor").style.height = "100px";
				//document.getElementById("contenedor").style.width = "50px";
				$("#formEditDet").draggable();
			});
		</script>
	</head>
	<body >
		<div id="appsContenedorGlobal">			
			<?php
				include('adm/02-vst/00-crudPpal/00-estructuraPermisos.php');
			?>
		</div>
	</body>
</html>
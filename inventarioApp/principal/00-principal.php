<!doctype html>
<?php
    session_name("inventarioIEE");
    session_start();
?>

<html>
	<head>
	    <link rel="shortcut icon" href="../art/inventApp.png"/>
		<meta http-equiv="Content-Type" content="text/html; charset='UTF-8'" />
		<!--<meta http-equiv="refresh" content="10">-->

  		<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=0.6, maximun-scale=1.0, minimun-scale=0.2"/>﻿ 
		<title>Inventario IEE</title>
		
		<link rel="stylesheet" media="screen" type="text/css" href="00-principal.css"/>
		<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  		<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
		<!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>-->
		<script type="text/javascript" src="../jquery/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script type="text/javascript" src="00-principal.js"></script>
  		<script type="text/javascript" src="../bdAlmacenamiento/00-almacenamientos.js"></script>
  		<script type="text/javascript" src="../bdCategorias/00-categorias.js"></script>
  		<script type="text/javascript" src="../bdClasesBienes/00-clasesBienes.js"></script> 
  		<script type="text/javascript" src="../bdDependencias/00-dependencias.js"></script>
  		<script type="text/javascript" src="../bdEstadodelBien/00-estadodelBien.js"></script> 
  		<script type="text/javascript" src="../bdMantenimiento/00-mantenimiento.js"></script>
  		<script type="text/javascript" src="../bdUbicaciones/00-ubicaciones.js"></script> 	
  		<script type="text/javascript" src="../bdUsuarios/00-usuarios.js"></script> 
  		<script type="text/javascript" src="../bdBienes/00-bienes.js"></script>   
  		<script>
			$(function(){
				//alert("La resolución de tu pantalla es: " + screen.width + " x " + screen.height);				
				document.getElementById("contenedor").style.width = (screen.width*0.97)+ "px";
				document.getElementById("contenedor").style.height = (screen.height*0.70) + "px";
				document.getElementById("menuNavegacion").style.height = (screen.height*0.715) + "px";
				if(screen.width<800){
					document.getElementById("contenedor").style.width = (screen.width*1.6)+ "px";
					document.getElementById("contenedor").style.height = (screen.height*1.2) + "px";
				}
				//document.getElementById("contenedor").style.height = "100px";
				//document.getElementById("contenedor").style.width = "50px";
			$("#formEditDet").draggable();
			});

		</script>
		
	</head>
	
	<body >
		<div id="contenedorGlobal">			
			<?php
				//$paginaLogs="../principal/principal";//para escribir los Logs
				//$linkLogs="Principal";//para escribir los Logs
				//include('../bdLogs/01-bdEscribirLogs.php');
				include('01-estructuraPermisosPpal.php');
        
			?>
		</div>

		<!-- Load React. -->
		<!-- Note: when deploying, replace "development.js" with "production.min.js". -->
		<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
		<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>

		<!-- Load our React component. -->
		<script src="like_button.js"></script>
    
    
	</body>
</html>
<!doctype html>
<?php
    session_name("CTEApp");
    session_start();
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset='UTF-8'" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"/>﻿ 
		<title>Identificador de CE y NEE IET</title>
		
		<link rel="shortcut icon" href="inventario01.ico" />
		<link rel="stylesheet" media="screen" type="text/css" href="principal.css"/>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">	
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>		
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="../jquery/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  		<script type="text/javascript" src="principal.js"></script>
  		<script type="text/javascript" src="../bdAreas/00-areas.js"></script>  		
  		<script type="text/javascript" src="../bdAsignacionAcademica/00-asignacionAcademica.js"></script> 
  		<script type="text/javascript" src="../bdAsignaturas/00-asignaturas.js"></script>
  		<script type="text/javascript" src="../bdDocentes/00-docentes.js"></script> 
  		<script type="text/javascript" src="../bdGrupos/00-grupos.js"></script>
  		<script type="text/javascript" src="../bdAsinacionAcademica/00-asignacionAcademica.js"></script> 
  		<script type="text/javascript" src="../bdMantenimiento/00-mantenimiento.js"></script>
  		<script type="text/javascript" src="../bdUbicaciones/00-ubicaciones.js"></script> 	
  		<script type="text/javascript" src="../bdPermisos/00-permisos.js"></script> 
  		<script type="text/javascript" src="../bdBienes/00-bienes.js"></script>
  		<script type="text/javascript" src="../bdSugerencias/00-sugerencias.js"></script>
  		<script type="text/javascript" src="../bdNominaciones/00-nominaciones.js"></script>

		

  		<script>
			$(function(){
				//alert("La resolución de tu pantalla es: " + screen.width + " x " + screen.height + screen.height*0.5);
				document.getElementById("contenedor").style.width = screen.width*0.82 + "px";
				document.getElementById("contenedor").style.height = (screen.height*0.75) + "px";
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
				include('estructuraPermisosPpal.php');
			?>
		</div>
		<div id="mensajeEspera">
			<img src="../art/loading.gif" style="padding:5px;width:30px;height:30px">
			<span style="position:relative;top:-15px;font-weight:normal">Por favor, espera un momento...</span>
			<br>
			<span id="screen"> df</span>
		</div>

		<!-- Load React. -->
		<!-- Note: when deploying, replace "development.js" with "production.min.js". -->
		<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
		<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>

		<!-- Load our React component. -->
		<script src="like_button.js"></script>
	</body>
</html>
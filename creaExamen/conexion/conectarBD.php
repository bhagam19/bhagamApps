<html>
	<head>
		<link rel="stylesheet" text="text/css" href="conexion/conectarBD.css">
	</head>
	<body>
<?php
include('datosConexion.php');	
if(mysqli_select_db($conexion,$BD)){
	echo 	
		"<div>
			===== CONEXIÓN A BASE DE DATOS =====<br><br>
		</div>";
	echo
		"<div> 
			Base de datos <span>'".$BD."'</span> seleccionada.<br><br>
		</div>";
}else{
	echo 	
		"<div>
			===== CONEXIÓN A BASE DE DATOS =====<br><br>
		</div>";
	echo
		"<div> 
			La base de datos <span>'".$BD."'</span> no existe. Se procede a crearla.<br><br>
		</div>";		
				
	if(mysqli_query($conexion,'CREATE DATABASE '.$BD)){
		if(mysqli_select_db($conexion,$BD)){
			echo 	
				"<div>
					===== CREACIÓN DE BASE DE DATOS =====<br><br>
				</div>";
			echo
				"<div> 
					Se creó y se seleccionó la base de datos <span>'".$BD."'</span>.<br><br>
				</div>";				
		}else{
			echo
				"<div> 
					Se creó pero no se pudo seleccionar la base de datos. Razón: [ ".mysqli_error()."].<br><br>
				</div>";				
		}	
	}else{
		echo 
			"<div> 
					No se pudo crear la base de datos. Razón: [ ".mysqli_error()."].<br><br>
				</div>";
	}			
}
?>	
	</body>
</html>
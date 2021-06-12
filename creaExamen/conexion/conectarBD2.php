<?php
include('datosConexion.php'); //Llamada a archivo donde están los datos de la base de datos
//Se lanza la conexión con la base de datos. Si no se efectua se lanza el archivo de instalacion.php
if(!mysqli_select_db($conexion,$BD)){ 
	echo 
		"<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=instalacion.php'>
			</head>
		</html>";	
}
?>	
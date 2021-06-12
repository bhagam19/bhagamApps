<?php
include('conexion/conectarBD.php');//Llamada a archivo. Protocolo de conexión a Base de Datos.
//Se ejecuta llamada a la $tabla.
$tabla='docentes';
if(!mysqli_query($conexion,"SELECT * FROM ".$tabla)){
// Si no existe, se ejecuta el archivo "instalacion.php".
	echo 
		"<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=instalacion.php'>
			</head>
		</html>";
}else{
//Si existe la $tabla se ejecuta la aplicación normalmente.
//Es decir, se ejecuta el archivo "principal.php"	
		session_start();
		echo 
			"<html>
				<head>
					<meta HTTP-equiv='REFRESH' content='0;url=principal/principal.php'>
				</head>
			</html>";

}	
?>
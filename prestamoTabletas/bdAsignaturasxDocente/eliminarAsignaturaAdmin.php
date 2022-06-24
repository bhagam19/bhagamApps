
<?php
	session_name("presTablet");
	session_start();
	
	$asignatura=$_REQUEST['id'];
	
	include('../conexion/datosConexion.php');

	$tabla='asignaturasxDocente';
	$consulta=	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE asignaturaID=".$asignatura);

	mysqli_close($conexion);

?>
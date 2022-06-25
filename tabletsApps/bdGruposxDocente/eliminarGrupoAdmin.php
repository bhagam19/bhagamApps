
<?php
	session_name("presTablet");
	session_start();
	
	$grupo=$_REQUEST['id'];
	
	include('../conexion/datosConexion.php');

	$tabla='gruposxDocente';
	$consulta=	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE grupoID=".$grupo);

	mysqli_close($conexion);

?>
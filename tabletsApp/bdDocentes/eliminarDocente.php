<?php
	session_name("presTablet");
	session_start();

	$id=$_REQUEST['id'];
	
	include('../conexion/datosConexion.php');

	$tabla='docentes';
	$consulta=mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE docenteID=".$id);

	mysqli_close($conexion);

?>

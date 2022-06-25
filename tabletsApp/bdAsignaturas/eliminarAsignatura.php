<?php
	session_name("presTablet");
	session_start();

	$id=$_REQUEST['id'];
	
	include('../conexion/datosConexion.php');

	$tabla='asignaturas';
	$consulta=mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE asignaturaID=".$id);

	mysqli_close($conexion);

?>

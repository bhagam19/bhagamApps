<?php
	session_start();
	include('../conexion/datosConexion.php');
	
	//Obtener variables.
	$id=$_REQUEST['id'];
	$valor=$_REQUEST['valor'];
	$campo=$_REQUEST['campo'];
	
	$tabla='clasesDeBienes';
	$sql=mysqli_query($conexion,"UPDATE ".$tabla." SET ".$campo."='".$valor."' WHERE codClase=".$id);
	
	mysqli_close($conexion);
?>
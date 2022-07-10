<?php
	session_name("tabletsApp");
    session_start();
	include('../conexion/datosConexion.php');	
	//Obtener variables.
	$id=$_REQUEST['id'];
	$valor=$_REQUEST['valor'];
	$campo=$_REQUEST['campo'];	
	$tabla='asignaturas';
	$sql=mysqli_query($conexion,"UPDATE ".$tabla." SET ".$campo."='".$valor."' WHERE asignaturaID=".$id);
	
?>

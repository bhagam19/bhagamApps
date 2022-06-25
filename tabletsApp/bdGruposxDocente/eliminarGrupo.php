
<?php
	session_name("presTablet");
	session_start();
	
	$grupo=$_REQUEST['id'];
	
	include('../conexion/datosConexion.php');

	$tabla='gruposxDocente';
	$consulta=	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE docenteID=".$_SESSION['docenteID']." AND grupo=".$grupo);

	mysqli_close($conexion);

?>